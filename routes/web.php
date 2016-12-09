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
//bắt đầu truy cập
Route::get('/', 'LoginController@home');
Route::get('login', [ 'as' => 'login', 'uses' => 'LoginController@getLogin']);
Route::post('login', 'LoginController@postLogin');

//chuyển trang khi đăng nhập
Route::get('admin', [ 'as' => 'admin', 'uses' => 'LoginController@redirectPage']);
Route::get('khoa', [ 'as' => 'khoa', 'uses' => 'LoginController@redirectPage']);
Route::get('hocvien', [ 'as' => 'hocvien', 'uses' => 'LoginController@redirectPage']);
Route::get('giangvien', [ 'as' => 'giangvien', 'uses' => 'LoginController@redirectPage']);

//chuyển trang khi đăng xuất
Route::get('logout', 'LoginController@getLogout');

//routes trang khoa
Route::get('khoa/khoahoc', [ 'as' => 'khoa/khoahoc', 'uses' => 'KhoaController@getKhoaHoc']);
Route::get('khoa/ctdt', [ 'as' => 'khoa/ctdt', 'uses' => 'KhoaController@getCTDT']);
Route::get('khoa/qlgv', 'KhoaController@getQLGV');
Route::get('khoa/qlhv', 'KhoaController@getQLHV');
Route::get('addGV', 'KhoaController@addGV');
Route::post('khoa/themkhoahoc', 'KhoaController@themKhoaHoc');
Route::get('khoa/{id}/xoaKhoaHoc', 'KhoaController@xoaKhoaHoc');
Route::post('khoa/themnganh', 'KhoaController@themNganh');
Route::get('khoa/{id}/xoaNganh', 'KhoaController@xoaNganh');

//routes trang hocvien + giang vien
Route::get('hocvien/donvi', 'HocVienController@getDonVi');
Route::get('hocvien/giangvien', 'HocVienController@getGiangVien');
Route::get('hocvien/linhvuc', 'HocVienController@getLinhVuc');
Route::get('hocvien/detaikhoaluan', 'HocVienController@getDeTaiKhoaLuan');

Route::get('upload', 'Controller1@getView');

Route::post('upload', ['as'=>'upload','uses'=>'Controller1@upload']);

// Route::controller([
// 	'auth' => 'Auth/LoginController'
// ]);