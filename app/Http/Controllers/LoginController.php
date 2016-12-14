<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
use Session;
use App\Khoa;
use App\LinhVuc;
use App\NganhHoc;
use App\KhoaHoc;
use App\ChuDeNghienCuu;
use App\GiangVien;
use App\Canbokhoa;
use App\Models\ThongBao;

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
            $thongbao = ThongBao::join('khoa', 'thongbao.id', '=', 'khoa.makhoa')
                                ->get();
            return view('login')->with('thongbao', $thongbao);
        }
    }

    public function postLogin(Request $request) {
    	$username = $request->get('username');
        $password = $request->get('password');

        if (Auth::attempt(['username' => $username, 'password' => $password, 'quyen' => 'admin'])) {
        	return redirect()->route('admin');
        }
        else if (Auth::attempt(['username' => $username, 'password' => $password, 'quyen' => 'khoa'])) {
            $query = Canbokhoa::where('mataikhoan','=',Auth::user()->id)->first();
            $makhoa = $query->makhoa;
            Session::put('makhoa', $makhoa);
        //    echo 'makhoa: ' . Session::get('makhoa');
            return redirect()->route('khoa');
        }
        else if (Auth::attempt(['username' => $username, 'password' => $password, 'quyen' => 'hocvien', 'actived'=>'1'])) {
        	return redirect()->route('hocvien');
        }
        else if (Auth::attempt(['username' => $username, 'password' => $password, 'quyen' => 'giangvien',
            'actived'=>'1'])) {
        	return redirect()->route('giangvien');
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
