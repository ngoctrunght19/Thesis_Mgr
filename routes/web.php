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

Route::get('/', 'LoginController@home');

Route::get('login', [ 'as' => 'login', 'uses' => 'LoginController@getLogin']);
Route::post('login', 'LoginController@postLogin');

Route::get('admin', [ 'as' => 'admin', 'uses' => 'LoginController@redirectPage']);
Route::get('khoa', [ 'as' => 'khoa', 'uses' => 'LoginController@redirectPage']);
Route::get('hocvien', [ 'as' => 'hocvien', 'uses' => 'LoginController@redirectPage']);
Route::get('giangvien', [ 'as' => 'giangvien', 'uses' => 'LoginController@redirectPage']);


Route::get('logout', 'LoginController@getLogout');

Route::get('addGV', 'KhoaController@addGV');

Route::get('khoa/{tenkhoahoc}/themKhoaHoc', 'KhoaController@themKhoaHoc');
Route::get('khoa/{id}/xoaKhoaHoc', 'KhoaController@xoaKhoaHoc');
Route::get('khoa/{tennganh}/themNganh', 'KhoaController@themNganh');
Route::get('khoa/{id}/xoaNganh', 'KhoaController@xoaNganh');

Route::get('upload', 'Controller1@getView');

Route::post('upload', ['as'=>'upload','uses'=>'Controller1@upload']);

// Route::controller([
// 	'auth' => 'Auth/LoginController'
// ]);