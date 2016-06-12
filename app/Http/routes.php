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

Route::get('/', function () {
    return view('welcome');
});
/* Route get */
Route::get('login','LoginController@getLogin');
Route::get('admin','HomeController@getIndex');
Route::get('logout','HomeController@getLogout');
Route::get('admin/changepass','HomeController@getChangepass');
/* Route post */
Route::post('login','LoginController@postLogin');
Route::post('admin/add','HomeController@postAdd');
Route::post('admin/changepass','HomeController@postChangepass');
