<?php

namespace Kb0\Vectography\Http\Controllers;

use Kb0\Vectography\Graphic;
use Kb0\Vectography\GraphicContent;
use enshrined\svgSanitize\Sanitizer;
use JangoBrick\SVG\SVGImage;
use \Session;
use \Validator;
use \Request;

class GraphicController extends Controller
{
    function index() {
        $graphics = Graphic::all();
        return view('graphic.index')->with('graphics', $graphics);
    }

    function show($graphic_id) {
        $graphic = Graphic::where('id','=',$graphic_id)->first();
        if(!$graphic) {
            abort(404); 
        }
        return view('graphic.view')->with('graphic', $graphic);
    }


    function editNew() {
        
        $validator = Validator::make(Request::instance()->all(), [
                'dup' => 'Integer|min:0',
            ]);

        $validator->validate();
        
        if (Request::has('dup')) {
            $graphic_id = Request::input('dup');
            
            $graphic = Graphic::id($graphic_id)->first();
            $ownershipController = new OwnershipController();
            $ownershipController->store($graphic);
            $this->flashGraphicAsOld($graphic);
        }
        return view('graphic.edit');
    }

    function flashGraphicAsOld(Graphic $graphic) {
        Session::flash('title', $graphic->title);
        Session::flash('description', $graphic->description);
        Session::flash('svgText', $graphic->currentContent()->data);
    }

    function edit($graphic_id) {
        if ($graphic_id == 0) {
            return $this->editNew();
        }

        $graphic = Graphic::id($graphic_id)->first();
        if(!$graphic) {
            abort(404); 
        }
        // TODO: Check user id or auth cookie for editing this graphic.
        $this->flashGraphicAsOld($graphic);
        return view('graphic.edit')->with('graphic_id', $graphic_id);
    }

    function raw($graphic_id) {
        $graphic = Graphic::where('id','=',$graphic_id)->first();
        if(!$graphic) {
            abort(404); 
        }
        return $graphic->currentContent()->data;
    }

    function raw_with_version($graphic_id, $version_id) {
        // TODO: Verify graphic id and version id are integers.
        $graphic = Graphic::where('id','=',$graphic_id)->first();
        if(!$graphic) {
            abort(404); 
        }
        $content = $graphic->contents()->where('id','=',$version_id)->first();
        if(!$content) {
            abort(404); 
        }
        return $content->data;
    }

    
    function store() {
        $validator = Validator::make(
            Request::instance()->all(), [
                'title' => 'Required',
                'svgText' => 'Required',
            ]);

        $validator->validate();

        if (Request::has('svgText')) {
            // Create a new sanitizer instance
            $sanitizer = new Sanitizer();

            // Load the dirty svg
            $dirtySVG = Request::input('svgText');
        
            // Pass it to the sanitizer and get it back clean
            $cleanSVG = $sanitizer->sanitize($dirtySVG);

            if (!$cleanSVG) {
                return back()->withInput()
                             ->withErrors(['Invalid SVG input.']);
            }
            
            $graphic = new Graphic();
            $graphic->title = Request::input('title');
            $graphic->description = Request::input('description','');
            $graphic->authKey = Graphic::makeAuthKey($graphic);
            $graphic->save();

            $svgImage = SVGImage::fromString($cleanSVG);
            $raster_default_height = 256;
            $raster_default_width = 256;
            $rasterResource = $svgImage->toRasterImage($raster_default_height, $raster_default_width);
            ob_start();
            imagepng($rasterResource);
            $rasterData = ob_get_contents();
            ob_end_clean();
            $graphicContent = new GraphicContent();
            $graphicContent->data = $cleanSVG;
            $graphicContent->rasterData = $rasterData;
            $graphicContent->graphic_id = $graphic->id;
            $graphicContent->save();

            return redirect()->route('graphics.show',['graphic_id'=>$graphic->id]);
        }
    }

        
    function destroy($graphic_id) {
        $validator = Validator::make(
            Request::instance()->all(), [
                'graphic_id' => 'Required|integer|in:'.$graphic_id,
            ]);

        $validator->validate();

        $graphic = Graphic::id($graphic_id)->first();
        if(!$graphic) {
            abort(403); 
        }

        $contents = $graphic->contents();

        $contents->delete();
        $graphic->tags()->detach();
        $graphic->delete();

        Session::flash('messages',['Deleted graphic with id ['.$graphic->id.']']);
        return redirect()->route('graphics.index');
    }
}
