<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
use Session;
use App\Models\Donvi;
use App\Khoa;
use App\LinhVuc;
use App\NganhHoc;
use App\KhoaHoc;
use App\ChuDeNghienCuu;
use App\GiangVien;
use App\DeTai;
use App\HocVien;
use App\Helpers\Pagination;
use App\Values\Value;
use URL;
use PHPWord;

class KhoaController extends Controller
{

    static $limit = 3;    // sô bản ghi trong một trang

    public function show() {
      $khoahoc = KhoaHoc::all();
      $nganhhoc = NganhHoc::all();
      $donvi = Donvi::all();
      return view('khoa')->with('khoahoc', $khoahoc)
                         ->with('nganhhoc', $nganhhoc)
                         ->with('donvi', $donvi);
    }

    public function themKhoaHoc(Request $request) {
        $tenkhoahoc = $request->input('khoahoc');
    	KhoaHoc::insert(['tenkhoahoc' => $tenkhoahoc]);
        $khoahoc = KhoaHoc::all();
        return view('khoa.danhsachkhoahoc')->with('khoahoc', $khoahoc);
    }

    public function themNganh(Request $request) {
    	$tennganh = $request->input('nganh');
        NganhHoc::insert(['tennganh' => $tennganh]);
        $nganhhoc = NganhHoc::all();
        return view('khoa.danhsachnganh ')->with('nganhhoc', $nganhhoc);
    }

    public function xoaKhoaHoc(Request $request) {
        $id = $request->input('id');
    	KhoaHoc::find($id)->delete();
    	$khoahoc = KhoaHoc::all();
        return view('khoa.danhsachkhoahoc')->with('khoahoc', $khoahoc);
    }

    public function xoaNganh(Request $request) {
        $id = $request->input('id');
    	NganhHoc::find($id)->delete();
    	$nganhhoc = NganhHoc::all();
        return view('khoa.danhsachnganh ')->with('nganhhoc', $nganhhoc);
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
        if (!$this->loggedin())
            return redirect()->route('login');

        $itemPerPage = Value::getItemPerPage();
        $giangvien = GiangVien::take($itemPerPage)->get();
   //     var_dump($giangvien[0]->magiangvien);
        $total = GiangVien::count();
        $current = 1;
        $preurl = URL::to('/');
        $preurl .= '/query?obj=giangvien';
        $paginationObj = new Pagination($current, $total, $itemPerPage, $preurl);
        $pagination = $paginationObj->getPagination();
        $donvi = Donvi::all();
        return view('khoa.qlgv')->with('giangvien', $giangvien)
                               ->with('donvi', $donvi)
                               ->with('pagination', $pagination);
    }

    public function getQLHV() {
        $itemPerPage = Value::getItemPerPage();

        $khoahoc = KhoaHoc::all();
        $nganhhoc = NganhHoc::all();
        $giangvien = GiangVien::all();
        $khoa = Khoa::all();
        $hocvien = HocVien::take($itemPerPage)->get();
        $total = HocVien::count();
        $current = 1;
        $preurl = URL::to('/');
        $preurl .= '/query?obj=hocvien';
        $paginationObj = new Pagination($current, $total, $itemPerPage, $preurl);
        $pagination = $paginationObj->getPagination();

        return view('khoa.qlhv')->with('khoahoc', $khoahoc)
                                ->with('nganhhoc', $nganhhoc)
                                ->with('giangvien', $giangvien)
                                ->with('khoa', $khoa)
                                ->with('hocvien', $hocvien)
                                ->with('pagination', $pagination);
    }

    public function getCongVan() {
        return view('khoa.congvan');
    }

    public function exportCongVan() {
        $detai = DeTai::select('giangvien.hoten as hoten_gv', 'hocvien.hoten as hoten_hv', 'detai.*')
                        ->join('giangvien', 'detai.giangvienhuongdan', '=', 'giangvien.magiangvien')
                        ->join('hocvien', 'detai.mahocvien', '=', 'hocvien.mahocvien')->get();
        $soLuongDeTai = $detai->count();
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('docTemplate/cong-van-template.docx');

        $templateProcessor->cloneRow('r1', $soLuongDeTai);

        for ($i =0; $i < $soLuongDeTai; $i++){
            $r1 = 'r1#'.($i+1);
            $r2 = 'r2#'.($i+1);
            $r3 = 'r3#'.($i+1);
            $templateProcessor->setValue($r1, $detai[$i]->tendetai);
            $templateProcessor->setValue($r2, $detai[$i]->hoten_hv);
            $templateProcessor->setValue($r3, $detai[$i]->hoten_gv);
        }
        // $templateProcessor->setValue('r1#2', $detai[1]->tendetai);
        // $templateProcessor->setValue($r2, $detai[1]->mahocvien);
        // $templateProcessor->setValue($r3, $detai[1]->giangvienhuongdan);
        $templateProcessor->saveAs('downloads/cong-van.docx');


        return redirect()->route('khoa/congvan');
    }

    public function loggedin() {
        return Auth::check() && Auth::user()->quyen == 'khoa';
    }

    public function getMoDongDK() {
        return view('khoa.modongdk');
    }

    public function getThongBao() {
        return view('khoa.thongbao');
    }
}
