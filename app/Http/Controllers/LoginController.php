<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class LoginController extends Controller
{
    //
    public function getLogin() {
        return view('login');
    }

    public function postLogin(Request $request) {
    	$username = $request->get('username');
        $password = $request->get('password');

        if (Auth::attempt(['username' => $username, 'password' => $password, 'quyen' => 'admin'])) {
        	return redirect()->route('admin');
        }
        else if (Auth::attempt(['username' => $username, 'password' => $password, 'quyen' => 'hv'])) {
        	return redirect()->route('hocvien');
        } 
        else if (Auth::attempt(['username' => $username, 'password' => $password, 'quyen' => 'gv'])) {
        	return redirect()->route('giangvien');
        }
        else {
        	return redirect()->back();
        }
    }

    public function getLogout() {
    	Auth::logout();
    	return redirect()->route('login');
    } 
}
