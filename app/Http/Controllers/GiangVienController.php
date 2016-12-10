<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Exception;
use DB;
use Session;
use App\Khoa;
use App\LinhVuc;
use App\NganhHoc;
use App\KhoaHoc;
use App\ChuDeNghienCuu;
use App\GiangVien;
use App\HocVien;
use App\DeTai;


class GiangVienController extends Controller
{
  	public function show() {
    $khoa      = Khoa::all();
    $linhvuc   = LinhVuc::all();
    $cdnc      = ChuDeNghienCuu::all();
    $giangvien = GiangVien::all();

    return view('giangvien')->with('khoa', $khoa)
                          ->with('linhvuc', $linhvuc)
                          ->with('cdnc', $cdnc)
                          ->with('giangvien', $giangvien);
  	}

	public function getDonVi() {
	$khoa = Khoa::all();
	return view('giangvien.donvi')->with('khoa', $khoa);
  	}

  	public function getGiangVien() {
  	$giangvien = GiangVien::all();
    return view('giangvien.giangvien')->with('giangvien', $giangvien);
  	}

  	public function getLinhVuc() {
  	$linhvuc = LinhVuc::all();
  	$cdnc = ChuDeNghienCuu::all();
    return view('giangvien.linhvuc')->with('linhvuc', $linhvuc)
    							->with('cdnc', $cdnc);
  	}

  	public function getDeTaiKhoaLuan() {
    return view('giangvien.detaikhoaluan');
  	}
}
