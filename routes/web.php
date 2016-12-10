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
Route::get('admin', [ 'as' => 'admin', 'uses' => 'AdminController@show']);
Route::get('khoa', [ 'as' => 'khoa', 'uses' => 'KhoaController@show']);
Route::get('hocvien', [ 'as' => 'hocvien', 'uses' => 'HocVienController@show']);
Route::get('giangvien', [ 'as' => 'giangvien', 'uses' => 'GiangVienController@show']);

//chuyển trang khi đăng xuất
Route::get('logout', 'LoginController@getLogout');

//routes trang khoa
Route::get('khoa/khoahoc', [ 'as' => 'khoa/khoahoc', 'uses' => 'KhoaController@getKhoaHoc']);
Route::get('khoa/ctdt', [ 'as' => 'khoa/ctdt', 'uses' => 'KhoaController@getCTDT']);
Route::get('khoa/qlgv', 'KhoaController@getQLGV');
Route::get('khoa/qlhv', 'KhoaController@getQLHV');
Route::get('khoa/detai', 'KhoaController@getDeTai');
Route::get('addGV', 'KhoaController@addGV');
Route::post('khoa/themkhoahoc', 'KhoaController@themKhoaHoc');
Route::post('khoa/xoakhoahoc', 'KhoaController@xoaKhoaHoc');
Route::post('khoa/themnganh', 'KhoaController@themNganh');
Route::post('khoa/xoanganh', 'KhoaController@xoaNganh');

//routes trang hocvien
Route::get('hocvien/donvi', 'HocVienController@getDonVi');
Route::get('hocvien/giangvien', 'HocVienController@getGiangVien');
Route::get('hocvien/linhvuc', 'HocVienController@getLinhVuc');
Route::get('hocvien/detaikhoaluan', [ 'as' => 'hocvien/detaikhoaluan', 'uses' => 'HocVienController@getDeTaiKhoaLuan']);
//routes trang giangvien
Route::get('giangvien/donvi', 'GiangVienController@getDonVi');
Route::get('giangvien/giangvien', 'GiangVienController@getGiangVien');
Route::get('giangvien/linhvuc', 'GiangVienController@getLinhVuc');
Route::get('giangvien/detaikhoaluan', 
	[ 'as' => 'giangvien/detaikhoaluan', 'uses' => 'GiangVienController@getDeTaiKhoaLuan']);

Route::get('upload', 'Controller1@getView');

Route::post('khoa/qlgv/upload', ['as'=>'khoa/qlgv/upload','uses'=>'Controller1@upload']);
Route::post('khoa/qlgv/typelecturer', ['as'=>'khoa/qlgv/typelecturer','uses'=>'Controller1@typeLecturer']);

// Route::controller([
// 	'auth' => 'Auth/LoginController'
// ]);

Route::get('sendemail', 'Controller1@sendEmailToLecturer');

Route::get('test', 'Controller1@gettest');

Route::post('test', 'Controller1@test');

Route::get('active', 'Controller1@getActive');

Route::post('active', 'Controller1@active');

Route::post('hocvien/dangkydetai', 'HocVienController@dangkydetai');

Route::get('danhsachgiangvien', 'Controller1@danhsachgiangvien');

