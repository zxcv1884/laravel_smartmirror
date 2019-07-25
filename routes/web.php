<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});
Route::get('/demo', function () {
    return view('demo');
});
Route::get('custom-register','CustomController@showRegisterForm');
Route::get('home', ['uses'=>'ImageUploadController@home']);
Route::post('home', ['as'=>'croppie.upload-image','uses'=>'ImageUploadController@ImageUploadPost']);
Route::post('googleCalendar','googleCalendarController@googleCalendar');