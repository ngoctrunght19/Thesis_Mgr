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

class HocVienController extends Controller
{
  public function show() {
    $khoa      = Khoa::all();
    $linhvuc   = LinhVuc::all();
    $cdnc      = ChuDeNghienCuu::all();
    $giangvien = GiangVien::all();

    return view('hocvien')->with('khoa', $khoa)
                          ->with('linhvuc', $linhvuc)
                          ->with('cdnc', $cdnc)
                          ->with('giangvien', $giangvien);
  }
  public function getDonVi() {
  	$khoa = Khoa::all();
    return view('hocvien.donvi')->with('khoa', $khoa);
  }
  public function getGiangVien() {
  	$giangvien = GiangVien::all();
    return view('hocvien.giangvien')->with('giangvien', $giangvien);
  }
  public function getLinhVuc() {
  	$linhvuc = LinhVuc::all();
  	$cdnc = ChuDeNghienCuu::all();
    return view('hocvien.linhvuc')->with('linhvuc', $linhvuc)
    							->with('cdnc', $cdnc);
  }
  public function getDeTaiKhoaLuan() {
  	$khoa = Khoa::all();
    return view('hocvien.detaikhoaluan')->with('khoa', $khoa);
  }
}
