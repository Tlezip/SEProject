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
    return redirect()->route('login');
});

/*Route::get('/home', function(){
	return view('home');
});
*/

Route::get('/showItem', function(){
	return view('showItem');
})->middleware('auth');


Route::get('/changepassword', 'ChangePasswordController@index')->middleware('auth');

Route::post('/changepassworded', 'ChangePasswordController@store')->middleware('auth');

Route::get('/profile', function(){
	return view('profile');
})->middleware('auth');

Auth::routes();

Route::post('image-upload','HomeController@imageUploadPost');

Route::get('image-delete','HomeController@imageDelete');

Route::get('/home', 'HomeController@dashStatus');

Route::post('/editItem','itemController@edit');

Route::get('/search','itemController@search');

Route::post('/addItem','itemController@store')->middleware('auth');

Route::get('/allItem','itemController@show')->middleware('auth');

Route::post('/delItem/','itemController@destroy')->middleware('auth');

Route::get('/check','itemController@check')->middleware('auth');