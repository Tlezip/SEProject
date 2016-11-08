<?php

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
    return view('welcome');
});

Route::get('/home', function(){
	return view('home');
});

Route::get('/showItem', function(){
	return view('showItem');
});
Route::get('/login', function(){
	return view('login');
});

Route::post('/addItem','itemController@store');

Route::get('/allItem','itemController@show');

Route::post('/delItem','itemController@destroy');

Route::get('/search','itemController@search');

Route::get('/cal','itemController@calcat');

Route::get('/edit','itemController@edit');