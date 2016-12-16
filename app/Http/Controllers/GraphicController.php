<?php

namespace Kb0\Vectography\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Kb0\Vectography\Graphic;

class GraphicController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function show($graphic_id) {
        $graphic = Graphic::where('id','=',$graphic_id)->first();
        if(!$graphic) {
            abort(404); 
        }
        return view('graphic.view')->with('graphic', $graphic);
    }


    function edit($graphic_id) {
        $graphic = Graphic::where('id','=',$graphic_id)->first();
        if(!$graphic) {
            abort(404); 
        }
        // TODO: Check user id or auth cookie for editing this graphic.
        return view('graphic.edit')->with('graphic', $graphic);
    }

    function raw($graphic_id) {
        $graphic = Graphic::where('id','=',$graphic_id)->first();
        if(!$graphic) {
            abort(404); 
        }
        return $graphic->currentContent->first()->data;
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
}
