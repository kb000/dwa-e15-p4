<?php

use Illuminate\Database\Seeder;
use Kb0\Vectography\Graphic;
use Kb0\Vectography\GraphicContent;

class GraphicContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $graphic_id = Graphic::where('title','=','Blast')->pluck('id')->first();


        $graphicContent = new GraphicContent();
        $graphicContent->data = '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="256px" height="256px" version="1.1"><defs/><g transform="translate(0.5,0.5)"><path d="M 127 22 L 227 122 L 127 222 L 27 122 Z" fill="#000000" stroke="#000000" stroke-miterlimit="10" pointer-events="none"/><path d="M 127 32 L 222 127 L 127 222 L 32 127 Z" fill="#000000" stroke="#000000" stroke-miterlimit="10" transform="rotate(25,127,127)" pointer-events="none"/><path d="M 127 27 L 222 122 L 127 217 L 32 122 Z" fill="#000000" stroke="#000000" stroke-miterlimit="10" transform="rotate(-18,127,122)" pointer-events="none"/><path d="M 67 42 L 217 122 L 67 202 Z" fill="#000000" stroke="#000000" stroke-miterlimit="10" pointer-events="none"/></g></svg>';
        $graphicContent->rasterData = file_get_contents('database\seeds\data\blast.png');
        $graphicContent->graphic_id = $graphic_id;
        $graphicContent->save();
    }
}
