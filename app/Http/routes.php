<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', "Main@index");
Route::post('/', "Main@store");
Route::get('/image', function(){
	$img = Image::canvas(800,600,'#ff0000');
	return $img->response();
});
Route::get('/test',function() {
    return "Hello World";
});

// Authentication routes...
Route::get('home', [
    'middleware' => 'auth',
    'uses' => 'Home@index'
]);
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::controllers([
   'password' => 'Auth\PasswordController',
]);
Route::resource('image', 'imageManage');
