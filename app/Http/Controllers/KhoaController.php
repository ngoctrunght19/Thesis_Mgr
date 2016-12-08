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

class KhoaController extends Controller
{
    //
    public function addGV() {
    	echo "string";
    	// s
    }

    public function themKhoaHoc($tenkhoahoc) {
    	$khoahoc = new KhoaHoc();
    	$khoahoc->insert(['tenkhoahoc' => $tenkhoahoc]);
    	return redirect()->route('khoa');
    }

    public function themNganh($tennganh) {
    	$nganh = new NganhHoc();
    	$nganh->insert(['tennganh' => $tennganh]);
    	return redirect()->route('khoa');
    }

    public function xoaKhoaHoc($id) {
    	KhoaHoc::find($id)->delete();
    	return redirect()->route('khoa');
    }

    public function xoaNganh($id) {
    	NganhHoc::find($id)->delete();
    	return redirect()->route('khoa');
    }

    public function getKhoaHoc() {
        $khoahoc = KhoaHoc::all();
        return view('khoa.khoahoc')->with('khoahoc', $khoahoc);
    }

    public function getCTDT() {
        $nganhhoc = NganhHoc::all();
        return view('khoa.ctdt')->with('nganhhoc', $nganhhoc);
    }

    public function getQLGV() {
        $giangvien = GiangVien::all();
        return view('khoa.qlgv')->with('giangvien', $giangvien);
    }

    public function getQLHV() {
        $nganhhoc = NganhHoc::all();
        return view('khoa.qlhv')->with('nganhhoc', $nganhhoc);
    }
}
