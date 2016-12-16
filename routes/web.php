<?php

use Kb0\Vectography\GraphicController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('graphic.view')->with('graphic', Graphic::with('contents')->first());
});

Route::get('/graphic/{graphic_id}', 'GraphicController@show')->name('graphics.show');

Route::get('/graphic/edit/{graphic_id}', 'GraphicController@edit')->name('graphics.edit');

Route::get('/graphic/raw/{graphic_id}.svg', 'GraphicController@raw')->name('graphics.raw');

Route::get('/graphic/raw/{graphic_id}/{version_id}.svg', 'GraphicController@raw_with_version')->name('graphics.raw_with_version');

Route::get('card', function () {
    return view('card')->with('graphic', Graphic::first());
});
