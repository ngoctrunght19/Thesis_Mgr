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

Route::group(['middleware' => 'auth'], function () {

	// ADMIN
	Route::group(['middleware' => 'isAdmin'], function () {
		Route::get('admin', [ 'as' => 'admin', 'uses' => 'AdminController@show']);
		Route::get('admin/linhvuc', [ 'as' => 'admin/linhvuc', 'uses' => 'AdminController@getLinhVuc']);
	});

	// KHOA
	Route::group(['middleware' => 'isKhoa'], function () {
		Route::get('khoa', [ 'as' => 'khoa', 'uses' => 'KhoaController@show']);

		Route::get('khoa/khoahoc', [ 'as' => 'khoa/khoahoc', 'uses' => 'KhoaController@getKhoaHoc']);
		Route::get('khoa/ctdt', [ 'as' => 'ctdt', 'uses' => 'KhoaController@getCTDT']);
		Route::get('khoa/qlgv', 'KhoaController@getQLGV');
		Route::get('khoa/qlhv', 'KhoaController@getQLHV');
		Route::get('khoa/detai', [ 'as' => 'khoa/detai', 'uses' => 'KhoaController@getDeTai']);
		Route::get('khoa/modongdk', 'KhoaController@getMoDongDK');
		Route::get('khoa/thongbao', 'KhoaController@getThongBao');
		Route::get('khoa/phanbienbaove', 'KhoaController@getPhanve');
		Route::get('addGV', 'KhoaController@addGV');
		Route::get('khoa/congvan', [ 'as' => 'khoa/congvan', 'uses' => 'KhoaController@getCongVan']);
		Route::get('khoa/congvan/exportdsdt', 'KhoaController@exportDSDT');
		Route::get('khoa/congvan/exportrdt', 'KhoaController@exportRDT');
		Route::get('khoa/congvan/exportsdt', 'KhoaController@exportSDT');
		Route::post('khoa/themkhoahoc', 'KhoaController@themKhoaHoc');
		Route::post('khoa/xoakhoahoc', 'KhoaController@xoaKhoaHoc');
		Route::post('khoa/themnganh', 'KhoaController@themNganh');
		Route::post('khoa/xoanganh', 'KhoaController@xoaNganh');
		Route::post('khoa/modongdk', 'KhoaController@postMoDongDK');
		Route::post('khoa/themthongbao', 'KhoaController@themThongBao');
		Route::post('khoa/xoathongbao', 'KhoaController@xoaThongBao');

		Route::post('khoa/qlgv/upload', ['as'=>'khoa/qlgv/upload','uses'=>'Controller1@uploadLecturer']);
		Route::post('khoa/qlgv/typelecturer', ['as'=>'khoa/qlgv/typelecturer','uses'=>'Controller1@typeLecturer']);

		Route::post('khoa/qlhv/upload', 'Controller1@uploadStudent');
		Route::post('khoa/qlhv/typestudent', ['as'=>'khoa/qlhv/typestudent','uses'=>'Controller1@typeStudent']);

		Route::post('khoa/detai/upload', 'Controller1@uploadStudentThesis');
		Route::post('khoa/detai/type', 'Controller1@typeStudentThesis');

		Route::get('khoa/dangkybaove', 'KhoaController@getDKBV');

		Route::post('khoa/dangkybaove/nophoso', 'KhoaController@nophoso');

		Route::post('khoa/guinhacnho', 'KhoaController@guinhacnho');

	});

	// HOC VIEN
	Route::group(['middleware' => 'isHocVien'], function () {
		Route::get('hocvien', [ 'as' => 'hocvien', 'uses' => 'HocVienController@show']);

		Route::get('hocvien/donvi', 'HocVienController@getDonVi');
		Route::get('hocvien/giangvien', 'HocVienController@getGiangVien');
		Route::get('hocvien/linhvuc', 'HocVienController@getLinhVuc');
		Route::get('hocvien/detaikhoaluan', [ 'as' => 'hocvien/detaikhoaluan', 'uses' => 'HocVienController@getDeTaiKhoaLuan']);
		Route::get('hocvien/suadetai', 'HocVienController@getSuaDeTai');
		Route::post('hocvien/dangkydetai', 'HocVienController@dangkydetai');
		Route::post('hocvien/suadetai', 'HocVienController@suadetai');
		Route::post('hocvien/rutdetai', 'HocVienController@rutdetai');
		Route::post('hocvien/linhvuc', 'Controller1@linhvuc');

	});

	// GIANG VIEN
	Route::group(['middleware' => 'isGiangVien'], function () {
		Route::get('giangvien', [ 'as' => 'giangvien', 'uses' => 'GiangVienController@show']);

		Route::get('giangvien/donvi', 'GiangVienController@getDonVi');
		Route::get('giangvien/giangvien', 'GiangVienController@getGiangVien');
		Route::get('giangvien/linhvuc', 'GiangVienController@getLinhVuc');
		Route::get('giangvien/taikhoan', 'GiangVienController@getTaiKhoan');
		Route::post('giangvien/taikhoan/edit', 'GiangVienController@editTaiKhoan');
		Route::get('giangvien/detaikhoaluan',
			[ 'as' => 'giangvien/detaikhoaluan', 'uses' => 'GiangVienController@getDeTaiKhoaLuan']);
		});
		Route::post('giangvien/detaikhoaluan/chapnhan', 'GiangVienController@acceptDeTai');
		Route::post('giangvien/detaikhoaluan/tuchoi', 'GiangVienController@rejectDeTai');
		Route::get('giangvien/chudenghiencuu', 'Controller1@getChudenghiencuu');
		Route::post('giangvien/chudenghiencuu/themchude', 'GiangVienController@themchude');
		Route::post('giangvien/chudenghiencuu/xoachude', 'GiangVienController@xoachude');

		Route::get('giangvien/linhvuc', 'Controller1@getCategory');
		Route::post('giangvien/linhvuc', 'Controller1@tickCategory');
	});

//chuyển trang khi đăng xuất
Route::get('logout', 'LoginController@getLogout');


Route::get('upload', 'Controller1@getView');


Route::get('sendemail', 'Controller1@sendEmailToLecturer');

Route::get('test', 'Controller1@gettest');

Route::post('test', 'Controller1@test');

Route::get('active', 'Controller1@getActive');

Route::post('active', 'Controller1@active');

Route::post('hocvien/dangkydetai', 'HocVienController@dangkydetai');

Route::get('danhsachgiangvien', 'Controller1@danhsachgiangvien');

Route::get('query', 'QueryController@getResult');

Route::get('search', 'QueryController@getResultSearch');
