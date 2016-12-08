<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhoaHoc;
use App\Khoa;
use App\NganhHoc;
use App\LinhVuc;
use App\GiangVien;
use App\ChuDeNghienCuu;

class KhoaController extends Controller
{
    //
    public function show() {
      $khoahoc = KhoaHoc::all();
      $nganhhoc = NganhHoc::all();
      $giangvien = GiangVien::all();
      return view('khoa')->with('khoahoc', $khoahoc)
                         ->with('nganhhoc', $nganhhoc)
                         ->with('giangvien', $giangvien);
    }

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
}
