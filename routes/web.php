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
    return view('login');
});

Route::get('login', [ 'as' => 'login', 'uses' => 'LoginController@getLogin']);
Route::post('login', 'LoginController@postLogin');

Route::get('admin', [ 'as' => 'admin', 'uses' => function () {
    return view('admin');
}]);

Route::get('hocvien', [ 'as' => 'hocvien', 'uses' => function () {
    return view('hocvien');
}]);

Route::get('giangvien', [ 'as' => 'giangvien', 'uses' => function () {
    return view('giangvien');
}]);

Route::get('logout', 'LoginController@getLogout');


// Route::controller([
// 	'auth' => 'Auth/LoginController'
// ]);