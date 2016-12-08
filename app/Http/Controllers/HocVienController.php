<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhoaHoc;
use App\Khoa;
use App\NganhHoc;
use App\LinhVuc;
use App\GiangVien;
use App\ChuDeNghienCuu;

class HocVienController extends Controller
{

  public function show() {
    $khoa = Khoa::all();
    $linhvuc = LinhVuc::all();
    $cdnc = ChuDeNghienCuu::all();
    $giangvien = GiangVien::all();
    return view('hocvien')->with('khoa', $khoa)
                          ->with('linhvuc', $linhvuc)
                          ->with('cdnc', $cdnc)
                          ->with('giangvien', $giangvien);
  }

  public function showLinhVuc ($id){
    $view = View::make('hocvien.linhvuc-giangvien');
    return $view->renderSections()['body'];
    // return view('hocvien.linhvuc-giangvien')->renderSections()['body'];
  }
}
