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
use App\Models\Donvi;

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
    $donvi = Donvi::all();
    return view('hocvien.donvi')->with('khoa', $khoa)
                                ->with('donvi', $donvi);
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
    $giangvien = GiangVien::all();
    $student = HocVien::where('mataikhoan', Auth::user()->id)->first();
    $detai = DeTai::join('giangvien', 'giangvien.magiangvien', '=', 'detai.giangvienhuongdan')
                  ->where('mahocvien', $student->mahocvien)->first();
    return view('hocvien.detaikhoaluan')->with('khoa', $khoa)
                                        ->with('student', $student)
                                        ->with('giangvien', $giangvien)
                                        ->with('detai', $detai);
  }

  public function dangkydetai(Request $request) {
    $tendetai = $request->input('tendetai');
    $giangvien = $request->input('giangvien');
    $motadetai = $request->input('motadetai');
    $mahocvien = HocVien::where('mataikhoan', Auth::user()->id)
                        ->pluck('mahocvien')
                        ->first();
    DeTai::insert(['tendetai' => $tendetai,
                    'mahocvien' => $mahocvien,
                    'giangvienhuongdan' => $giangvien,
                    'trangthai' => 'cho']);
    return "Đăng ký thành công, chờ phê duyệt";
  }

  public function getSuaDeTai() {
    $modangky = false;
    $khoa = Khoa::all();
    $giangvien = GiangVien::all();
    $student = HocVien::where('mataikhoan', Auth::user()->id)->first();
    $detai = DeTai::join('giangvien', 'giangvien.magiangvien', '=', 'detai.giangvienhuongdan')
                  ->where('mahocvien', $student->mahocvien)->first();
    return view('hocvien.suadetai')->with('modangky', $modangky)
                                        ->with('khoa', $khoa)
                                        ->with('student', $student)
                                        ->with('giangvien', $giangvien)
                                        ->with('detai', $detai);
  }

}
