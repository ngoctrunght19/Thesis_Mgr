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
use App\MoDangKy;
use App\Canbokhoa;
use App\ThongBao;
use URL;
use PHPWord;
use Exception;


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

    public function exportDSDT() {
        $detai = DeTai::select('giangvien.hoten as hoten_gv', 'hocvien.hoten as hoten_hv', 'detai.*')
                        ->join('giangvien', 'detai.giangvienhuongdan', '=', 'giangvien.magiangvien')
                        ->join('hocvien', 'detai.mahocvien', '=', 'hocvien.mahocvien')
                        ->where('detai.trangthai', 'chapnhan')->get();
        $soLuongDeTai = $detai->count();

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('docTemplate/ds-detai-template.docx');
        $templateProcessor->cloneRow('r1', $soLuongDeTai);

        for ($i =0; $i < $soLuongDeTai; $i++){
            $r1 = 'r1#'.($i+1);
            $r2 = 'r2#'.($i+1);
            $r3 = 'r3#'.($i+1);
            $templateProcessor->setValue($r1, $detai[$i]->tendetai);
            $templateProcessor->setValue($r2, $detai[$i]->hoten_hv);
            $templateProcessor->setValue($r3, $detai[$i]->hoten_gv);
        }
        $templateProcessor->saveAs('downloads/ds-detai.docx');
        return redirect()->route('khoa/detai');
    }

    public function exportRDT() {
        $detai = DeTai::select('giangvien.hoten as hoten_gv', 'hocvien.hoten as hoten_hv', 'detai.*')
                        ->join('giangvien', 'detai.giangvienhuongdan', '=', 'giangvien.magiangvien')
                        ->join('hocvien', 'detai.mahocvien', '=', 'hocvien.mahocvien')
                        ->where('detai.trangthai', 'chapnhan')
                        ->where('detai.thaydoi', 'rut')->get();
        $soLuongDeTai = $detai->count();

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('docTemplate/rut-detai-template.docx');
        $templateProcessor->cloneRow('r1', $soLuongDeTai);

        for ($i =0; $i < $soLuongDeTai; $i++){
            $r1 = 'r1#'.($i+1);
            $r2 = 'r2#'.($i+1);
            $r3 = 'r3#'.($i+1);
            $templateProcessor->setValue($r1, $detai[$i]->tendetai);
            $templateProcessor->setValue($r2, $detai[$i]->hoten_hv);
            $templateProcessor->setValue($r3, $detai[$i]->hoten_gv);
        }
        $templateProcessor->saveAs('downloads/rut-detai.docx');
        return redirect()->route('khoa/detai');
    }

    public function exportSDT() {
        $detai = DeTai::select('giangvien.hoten as hoten_gv', 'hocvien.hoten as hoten_hv', 'detai.*')
                        ->join('giangvien', 'detai.giangvienhuongdan', '=', 'giangvien.magiangvien')
                        ->join('hocvien', 'detai.mahocvien', '=', 'hocvien.mahocvien')
                        ->where('detai.trangthai', 'chapnhan')
                        ->where('detai.thaydoi', 'sua')->get();
        $soLuongDeTai = $detai->count();

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('docTemplate/sua-detai-template.docx');
        $templateProcessor->cloneRow('r1', $soLuongDeTai);

        for ($i =0; $i < $soLuongDeTai; $i++){
            $r1 = 'r1#'.($i+1);
            $r2 = 'r2#'.($i+1);
            $r3 = 'r3#'.($i+1);
            $templateProcessor->setValue($r1, $detai[$i]->tendetai);
            $templateProcessor->setValue($r2, $detai[$i]->hoten_hv);
            $templateProcessor->setValue($r3, $detai[$i]->hoten_gv);
        }
        $templateProcessor->saveAs('downloads/sua-detai.docx');
        return redirect()->route('khoa/detai');
    }

    public function getDeTai() {
        $detai = DeTai::all();
        foreach ($detai as $dt) {
            $hocvien = HocVien::where('mahocvien',$dt->mahocvien)->first();
            $dt->hocvien = $hocvien->hoten;
            $giangvien = GiangVien::where('magiangvien',$dt->giangvienhuongdan)->first();
            $dt->giangvien = $giangvien->hoten;
        }
        return view('khoa.detai')->with('detai', $detai);
    }

    public function loggedin() {
        return Auth::check() && Auth::user()->quyen == 'khoa';
    }

    public function getMoDongDK() {
        $canbokhoa = Canbokhoa::where('mataikhoan', Auth::user()->id)->first();
        $modangky = MoDangKy::where('makhoa', $canbokhoa->makhoa)->first();
        $hanhdong = 'Đóng đăng ký';
        if($modangky->trangthai == 'dong') {
            $hanhdong = 'Mở đăng ký';
        }
        return view('khoa.modongdk')->with('hanhdong', $hanhdong);
    }

    public function postMoDongDK(Request $request) {
        $canbokhoa = Canbokhoa::where('mataikhoan', Auth::user()->id)->first();
        $modangky = MoDangKy::where('makhoa', $canbokhoa->makhoa)->first();
        $hanhdong = 'Đóng đăng ký';
        if($modangky->trangthai == 'dong') {
            $modangky->trangthai = 'mo';
            $modangky->save();
            $hanhdong = 'Đóng đăng ký';
        }
        else {
            $modangky->trangthai = 'dong';
            $modangky->save();
            $hanhdong = 'Mở đăng ký';
        }

        return $hanhdong;
    }

    public function getThongBao() {
        $canbokhoa = Canbokhoa::where('mataikhoan', Auth::user()->id)->first();
        $thongbao = ThongBao::where('makhoa', $canbokhoa->makhoa)->get();
        return view('khoa.thongbao')->with('thongbao', $thongbao);
    }

    public function themThongBao(Request $request) {
        $canbokhoa = Canbokhoa::where('mataikhoan', Auth::user()->id)->first();
        $tenthongbao = $request->input('thongbao');
        ThongBao::insert(['thongbao' => $tenthongbao, 'makhoa' => $canbokhoa->makhoa]);
        $thongbao = ThongBao::all();
        return view('khoa.danhsachthongbao')->with('thongbao', $thongbao);
    }

    public function xoaThongBao(Request $request) {
        $mathongbao = $request->input('mathongbao');
        ThongBao::where('id', $mathongbao)->delete();
        $thongbao = ThongBao::all();
        return view('khoa.danhsachthongbao')->with('thongbao', $thongbao);
    }

    public function getDKBV() {

        return view('khoa.dkbv');
    }

    public function nophoso(Request $request) {
        $mahocvien = $request->id;

        if ($mahocvien == null || trim($mahocvien) == "") {
            echo "Học viên không tồn tại";
            return;
        }

        $mahocvien = trim($mahocvien);
        $makhoa = Session::get('makhoa');
        $hocvien = HocVien::where('mahocvien', $mahocvien)->first();
        if ($hocvien == null) {
            echo "Học viên không tồn tại";
            return;
        }

        $khoacuahocvien = $hocvien->makhoa;
        // kiểm tra xem học viên có cung khoa vơi cán bộ khoa không
        if ($khoacuahocvien != $makhoa) {
            echo "Học viên không cùng khoa";
            return;
        }
        try {
        
            $hoten = $hocvien->hoten;
            $success = HocVien::where('mahocvien', '=', $mahocvien)
                ->update(['danophoso' => '1']);
            echo "Đã đánh dấu học viên " . $hoten . " mã học viên " . $mahocvien
                    . " đã nộp hồ sơ bảo vệ";
        }
        catch (Exception $e) {
            echo $e->getMessage();
            echo "Đã xảy ra lỗi.";
        }
    }
}
