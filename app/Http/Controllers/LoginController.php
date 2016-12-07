<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class LoginController extends Controller
{
    //
    public function home() {
        return redirect()->route('login');
    }

    public function getLogin() {
        if (isset(Auth::user()->quyen) ) {
            if(Auth::user()->quyen=='admin') {
                return redirect()->route('admin');
            }
            else if (Auth::user()->quyen=='khoa') {
                return redirect()->route('khoa');
            }
            else if (Auth::user()->quyen=='hocvien') {
                return redirect()->route('hocvien');
            }
            else if (Auth::user()->quyen=='giangvien') {
                return redirect()->route('giangvien');
            }
        }
        else {
            return view('login');
        }
    }

    public function postLogin(Request $request) {
    	$username = $request->get('username');
        $password = $request->get('password');

        if (Auth::attempt(['username' => $username, 'password' => $password, 'quyen' => 'admin'])) {
        	return redirect()->route('admin');
        }
        else if (Auth::attempt(['username' => $username, 'password' => $password, 'quyen' => 'khoa'])) {
            return redirect()->route('khoa');
        }
        else if (Auth::attempt(['username' => $username, 'password' => $password, 'quyen' => 'hocvien'])) {
        	return redirect()->route('hocvien');
        }
        else if (Auth::attempt(['username' => $username, 'password' => $password, 'quyen' => 'giangvien'])) {
        	return redirect()->route('giangvien');
        }
        else {
        	return redirect()->route('login');
        }
    }

    public function redirectPage() {
        if (isset(Auth::user()->quyen) ) {
            if(Auth::user()->quyen=='admin') {
                return view('admin');
            }
            else if (Auth::user()->quyen=='khoa') {
                $khoahoc = \DB::table('khoahoc')->get();
                $nganhhoc = \DB::table('nganhhoc')->get();
                return view('khoa', compact('khoahoc'), compact('nganhhoc'));
            }
            else if (Auth::user()->quyen=='hocvien') {
                $khoa = \DB::table('khoa')->get();
                $linhvuc = \DB::table('linhvuc')->get();
                return view('hocvien', compact('khoa'), compact('linhvuc'));
            }
            else if (Auth::user()->quyen=='giangvien') {
                return view('giangvien');
            }
        }
        else {
            return redirect()->route('login');
        }
    }

    public function getLogout() {
    	Auth::logout();
    	return redirect()->route('login');
    }
}
