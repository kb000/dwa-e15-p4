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

Route::get('/', 'GraphicController@index')->name('graphics.index');

Route::post('/graphics/', 'GraphicController@store')->name('graphics.store');

Route::put('/graphics/', 'GraphicController@update')->name('graphics.update');

Route::delete('/graphics/{graphic_id}', 'GraphicController@destroy')->name('graphics.destroy');

Route::get('/graphics/edit/{graphic_id}', 'GraphicController@edit')->name('graphics.edit');

Route::get('/graphics/edit/', 'GraphicController@editNew')->name('graphics.editNew');

Route::get('/graphics/{graphic_id}', 'GraphicController@show')->name('graphics.show');

Route::get('/g/{graphic_id}.svg', 'GraphicController@raw')->name('graphics.download');

Route::get('/g/{graphic_id}/{version_id}.svg', 'GraphicController@raw_with_version')->name('graphics.raw_with_version');

Route::get('/graphics/chown/{graphic_id}', 'OwnershipController@storeById')->name('ownership.storeById');

Route::post('/login', "Auth\LoginController@login")->name('login.login');

Route::post('/logout', "Auth\LoginController@logout")->name('login.logout');

Route::get('card', function () {
    return view('card')->with('graphic', Graphic::first());
});

Auth::routes();

Route::get('/home', 'HomeController@index');
