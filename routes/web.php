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

Auth::routes();

Route::get('/home', 'HomeController@index');


	Route::get('/ubah-password',[
	'middleware' => ['auth'],
	'as' => 'users.ubah_password',
	'uses' => 'UbahPasswordController@ubah_password'
	]);

	Route::put('/proses-ubah-password/{id}',[
	'middleware' => ['auth'],
	'as' => 'users.proses_ubah_password',
	'uses' => 'UbahPasswordController@proses_ubah_password'
	]);
	
Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function () {

	Route::resource('master_users', 'MasterUserController'); 

	Route::get('master_users/konfirmasi/{id}',[
	'middleware' => ['auth','role:admin'],
	'as' => 'master_users.konfirmasi',
	'uses' => 'MasterUserController@konfirmasi'
	]);

	Route::get('master_users/reset/{id}',[
	'middleware' => ['auth','role:admin'],
	'as' => 'master_users.reset',
	'uses' => 'MasterUserController@reset'
	]);

	Route::get('master_users/no_konfirmasi/{id}',[
	'middleware' => ['auth'],
	'as' => 'master_users.no_konfirmasi',
	'uses' => 'MasterUserController@no_konfirmasi'
	]);	

});