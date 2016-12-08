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

Route::get('admin', [ 'as' => 'admin', 'uses' => 'AdminController@show']);
Route::get('khoa', [ 'as' => 'khoa', 'uses' => 'KhoaController@show']);
Route::get('hocvien', [ 'as' => 'hocvien', 'uses' => 'HocVienController@show']);
Route::get('giangvien', [ 'as' => 'giangvien', 'uses' => 'GiangVienController@show']);


Route::get('logout', 'LoginController@getLogout');

Route::get('addGV', 'KhoaController@addGV');

Route::get('khoa/{tenkhoahoc}/themKhoaHoc', 'KhoaController@themKhoaHoc');
Route::get('khoa/{id}/xoaKhoaHoc', 'KhoaController@xoaKhoaHoc');
Route::get('khoa/{tennganh}/themNganh', 'KhoaController@themNganh');
Route::get('khoa/{id}/xoaNganh', 'KhoaController@xoaNganh');

Route::get('hocvien/{id}', 'HocVienController@showLinhVuc');

Route::get('upload', 'Controller1@getView');

Route::post('upload', ['as'=>'upload','uses'=>'Controller1@upload']);

// Route::controller([
// 	'auth' => 'Auth/LoginController'
// ]);
