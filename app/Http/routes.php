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



/* Authentication */
Route::get('/','EmpController@index');
Route::get('employees','EmpController@index');
Route::get('departments', 'DeptController@index');
Route::get('login','LoginController@getLogin');
Route::get('logout','HomeController@getLogout');
Route::get('admin/changepass','HomeController@getChangepass');
Route::post('login','LoginController@postLogin');
Route::get('contact','HomeController@getContact');

/* Get image from Storage */
Route::get('getImage/{filename}', 'EmpController@getEmpImage');

/* Administrator*/
Route::group(['middleware' => 'admin'],function(){
	Route::group(['prefix' => 'admin'], function(){
		
		// Add other admin and change password
		Route::get('add','HomeController@getAdd');
		Route::post('add','HomeController@postAdd');
		Route::post('changepass','HomeController@postChangepass');

		//Manage employees
		Route::get('employees', 'EmpController@index');
		Route::post('employees/addEmployee', 'EmpController@addEmployee');
		Route::post('employees/editEmployee/{id}', 'EmpController@editEmployee');

		//Route::get('employees/{id}', 'EmpController@infoEmployee');

		//Manage department
		Route::get('departments', 'DeptController@index');
		Route::post('departments/addDepartment', 'DeptController@addDepartment');
		Route::post('departments/editDepartment/{id}', 'DeptController@editDepartment');
		Route::delete('departments/deleteDepartment/{id}', 'DeptController@deleteDepartment');
	});
});
//Route::get('employee');