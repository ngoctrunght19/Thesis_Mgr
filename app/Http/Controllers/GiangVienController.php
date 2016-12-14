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
      $donvi = Donvi::all();
    	return view('giangvien.donvi')->with('khoa', $khoa)
                                    ->with('donvi', $donvi);
  	}

  	public function getGiangVien() {
    	$giangvien = GiangVien::all();
    foreach ($giangvien as $gv) {
      $khoa = Khoa::where('makhoa', $gv->makhoa)->first();
      $gv->khoa = $khoa->tenkhoa;
      $chude = ChuDeNghienCuu::where('magiangvien', $gv->magiangvien)->get();
      $gv->chude = $chude;
      $linhvuc = LinhVuc::join('linhvuc_gv', 'linhvuc.id', '=', 'linhvuc_gv.malinhvuc')
                          ->where('magiangvien', $gv->magiangvien)->get();
      $gv->linhvuc = $linhvuc;

    }
      return view('giangvien.giangvien')->with('giangvien', $giangvien);
  	}

  	public function getLinhVuc() {
    	$linhvuc = LinhVuc::all();
    	$cdnc = ChuDeNghienCuu::all();
      return view('giangvien.linhvuc')->with('linhvuc', $linhvuc)
      							->with('cdnc', $cdnc);
  	}

  	public function getDeTaiKhoaLuan() {
    	$pending = GiangVien::join('detai', 'giangvien.magiangvien', '=', 'detai.giangvienhuongdan')
                            ->join('hocvien', 'detai.mahocvien', '=', 'hocvien.mahocvien')
                            ->where('trangthai', 'cho')->get();
    	$accepted = GiangVien::join('detai', 'giangvien.magiangvien', '=', 'detai.giangvienhuongdan')
                            ->join('hocvien', 'detai.mahocvien', '=', 'hocvien.mahocvien')
                            ->where('trangthai', 'chapnhan')->get();
      return view('giangvien.detaikhoaluan')->with('pending', $pending)
      										->with('accepted', $accepted);
  	}

    public function getTaiKhoan() {
      $id      = Auth::user()->id;
      $accInfo = GiangVien::where('mataikhoan', $id)->first();
      return view('giangvien.taikhoan')->with('accInfo', $accInfo);
  	}

    public function editTaiKhoan(Request $request) {
      // Tim du lieu cua tai khoan
      $id      = Auth::user()->id;
      $accInfo = GiangVien::where('mataikhoan', $id)->first();

      // // Update tai khoan
       $hoten = $request->input('name');
       $email = $request->input('email');
       $donvi = $request->input('donvi');

      $accInfo->update(['hoten' => $hoten,'email' => $email,'donvi' => $donvi]);
      //return view('giangvien.taikhoan')->with('accInfo', $accInfo);
    }

    public function acceptDeTai(Request $request) {
      $id = $request->id;
      $detai = DeTai::where('id', $id)->first();
      $detai ->trangthai ="chapnhan";
      $detai -> save();
      $pending = GiangVien::join('detai', 'giangvien.magiangvien', '=', 'detai.giangvienhuongdan')
                            ->join('hocvien', 'detai.mahocvien', '=', 'hocvien.mahocvien')
                            ->where('trangthai', 'cho')->get();
      $accepted = GiangVien::join('detai', 'giangvien.magiangvien', '=', 'detai.giangvienhuongdan')
                            ->join('hocvien', 'detai.mahocvien', '=', 'hocvien.mahocvien')
                            ->where('trangthai', 'chapnhan')->get();
      return view('giangvien.detaikhoaluan-content')->with('pending', $pending)
                          ->with('accepted', $accepted);
    }

    public function rejectDeTai(Request $request) {
      $id = $request->id;
      DeTai::where('id', $id)->delete();
      $pending = GiangVien::join('detai', 'giangvien.magiangvien', '=', 'detai.giangvienhuongdan')
                            ->join('hocvien', 'detai.mahocvien', '=', 'hocvien.mahocvien')
                            ->where('trangthai', 'cho')->get();
      $accepted = GiangVien::join('detai', 'giangvien.magiangvien', '=', 'detai.giangvienhuongdan')
                            ->join('hocvien', 'detai.mahocvien', '=', 'hocvien.mahocvien')
                            ->where('trangthai', 'chapnhan')->get();
      return view('giangvien.detaikhoaluan-content')->with('pending', $pending)
                          ->with('accepted', $accepted);
    }

    public function themchude(Request $request) {
        $chude = $request->chude;
        if ($chude == null || trim($chude) == "")
           echo 'Không có chủ đề';

        $chude = trim($chude);
        $magiangvien = Auth::user()->username;
        $success = ChuDeNghienCuu::insert(['tenchude'=>$chude, 'magiangvien'=>$magiangvien]);
        if (!$success) {
            echo 'Không thê thêm chủ đề'; 
        }
        else {
            echo 'ok';
        }
    }
}
