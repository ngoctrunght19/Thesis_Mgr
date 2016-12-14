<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPExcel_IOFactory;
use DB;
use Exception;
use App\Models\Khoa;
use App\GiangVien;
use App\Models\Taikhoan;
use App\Helpers\CreateTree;
use Session;  
use App\Values\Value;  
use App\Models\Donvi;
use App\NganhHoc;
use App\KhoaHoc;
use App\Models\HocVienModel;
use App\HocVien;
use App\ChuDeNghienCuu;
use App\LinhVuc;
use App\GiangvienLinhvuc;
use Auth;

class Controller1 extends Controller
{

	public function getView() {
		return view('uploadexcel');
	}

    public function uploadLecturer() {
        $path = null;
        $success = true;
        $errorMessage = null;
        $message = null;

        if (isset($_FILES['excel']))
        {
            // Nếu file upload không bị lỗi,
            // Tức là thuộc tính error > 0
            if ($_FILES['excel']['error'] > 0)
            {
                $errorMessage = 'File Upload Bị Lỗi';
            }
            else{
                // Upload file
                move_uploaded_file($_FILES['excel']['tmp_name'], './uploads/'.$_FILES['excel']['name']);
                $path = './uploads/'.$_FILES['excel']['name'];
                try {
                    $message = Khoa::importLecturerFromExcel($path);
                } catch(Exception $e) {
                    $errorMessage = "Đã xảy ra lỗi";
                    $errorMessage = $e->getMessage();
                    echo $e->getMessage();
                }
            }
        }
        else {
            $errorMessage = 'Bạn chưa chọn file';
            return;
        }
        $info = null;
        if ($errorMessage == null) {
            $info = 'Đã thêm thành công '.$message.' giảng viên';
        }
        else {
            $info = $errorMessage;
        }
        
        echo $info;
    //    return view('khoa.danhsachgiangvien')->with(['giangvien'=>$giangvien,'info'=> $info]);
    }

    public function typeLecturer(Request $request) {
        $name = $request->get('name');
        $id = $request->get('id');
        $email = $request->get('email');
        $madonvi = $request->get('donvi');
        
        $donvi = Donvi::where('id', '=', $madonvi)->first();
        if ($donvi == null) {
            echo 'Không thể thêm giảng viên';
            return;
        }
        else {
            $donvi = $donvi->tendonvi;
        }

        $name = trim($name);
        $id = trim($id);
        $email = trim($email);
    
        $makhoa = Session::get('makhoa');
        $success = Khoa::themGiangVien($id, $name, $email, $donvi, $makhoa);
        if ($success) {
            $query = Taikhoan::select('password')->where('username','=',$id)->first();
            $token = $query->password;
            $success = Khoa::sendEmailToLecturer($email, $id, $name, $token);
            echo 'Đã thêm giảng viên';
        }
        else {
            echo 'Giảng viên đã tồn tại, không thể thêm vào nữa.';
        }
    }

    public function uploadStudent(Request $request) {
        $path = null;
        $success = true;
        $errorMessage = null;
        $message = null;

        $file = $request->file('excel');

        if ($file == null) {
            echo 'Lỗi tải file';
            return;
        }

        $file->move('./uploads/', $file->getClientOriginalName());
        $path = './uploads/' . $file->getClientOriginalName();

        $message = Khoa::importStudentFromExcel($path);
         
        $info = null;
        if ($errorMessage == null) {
            $info = 'Đã thêm thành công '.$message.' học viên';
        }
        else {
            $info = $errorMessage;
        }
        
    //    $giangvien = GiangVien::take(15)->get();
        echo $info;
    //    return view('khoa.danhsachgiangvien')->with(['giangvien'=>$giangvien,'info'=> $info]);
    }

    public function typeStudent(Request $request) {
        $name = $request->get('name');
        $id = $request->get('id');
        $email = $request->get('email');
        $manganh = $request->get('nganhhoc');
        $makhoahoc = $request->get('khoahoc');    
        $nganh = NganhHoc::where('id', '=', $manganh)->first();
        $nganh = $nganh->tennganh;
        $khoahoc = KhoaHoc::where('id', '=', $makhoahoc)->first();
        $khoahoc = $khoahoc->tenkhoahoc;

        $name = trim($name);
        $id = trim($id);
        $email = trim($email);
    
        $makhoa = Session::get('makhoa');
        $success = Khoa::addStudent($id, $name, $khoahoc, 
                                    $nganh, $email, $makhoa);
        if ($success) {
            $query = Taikhoan::select('password')->where('username','=',$id)->first();
            $token = $query->password;
            $success = Khoa::sendEmailToLecturer($email, $id, $name, $token);
            echo 'Đã thêm học viên';
        }
        else {
            echo 'Không thể thêm học viên';
        }
    }

    public function uploadStudentThesis(Request $request) {
        $path = null;
        $success = true;
        $errorMessage = null;
        $message = null;

        $file = $request->file('excel');

        if ($file == null) {
            echo 'Lỗi tải file';
            return;
        }

        $file->move('./uploads/', $file->getClientOriginalName());
        $path = './uploads/' . $file->getClientOriginalName();

        $count = HocVienModel::importHVDuocDangKy($path);

        $info = null;
        if ($errorMessage == null) {
            $info = 'Đã cập nhât thành công '.$count.' học viên';
        }
        else {
            $info = $errorMessage;
        }
        echo $info;
    }

    public function typeStudentThesis(Request $request) {
        $mahocvien = $request->mahv;
    
        if ($mahocvien == null) {
            echo 'Đã xảy ra lỗi';
            return;
        }

        $query = HocVien::where('mahocvien', '=', $mahocvien)->first();
        $success = HocVien::where('mahocvien', '=', $mahocvien)
                ->update(['duocdangky' => '1']);
        // nếu thanh công hoặc ko thành công nhưng học viên có tồn tại (đã chuyển trạng thái rồi)
        if ($success || (!$success && $query != null)) {
            $name = HocVien::where('mahocvien', '=', $mahocvien)->first()->hoten;
            echo 'Đã chuyển trang thái được đăng ký cho sinh viên '. $name . ' mã học viên ' . $mahocvien;
        }
        else {   
            echo 'Mã học viên không đúng';
        }
    }



    public function sendEmailToLecturer() {
        echo 'hello';
        echo Khoa::sendEmailToLecturer(GiangVien::all()[0]);
    }

    public function gettest() {
//        Khoa::sendEmail();
//        $tree = CreateTree::create_list(CreateTree::$list);

//        echo $tree;
        return view('vendor.test');
    }

    public function test() {
//        Khoa::sendEmail();
//        $tree = CreateTree::create_list(CreateTree::$list);

//        echo $tree;
//        return CreateTree::$list;
        $list = LinhVuc::all();
        $js_array = json_encode($list);
        echo $js_array;
    }

    public function getActive(Request $request)
    {
        $token = $request->get('token');
        $username = $request->get('username');
        if (Taikhoan::where([['password', '=', $token],
                             ['username', '=', $username],
                             ['actived', '=', 0]])
                            ->first() == null)
            return view('errors.404');
        return view('general.active');
    }

    public function active(Request $request)
    {
        $username = $request->get('username');
        $token = $request->get('token');
        $password = $request->get('password');
        if ($password == null) {
            echo 'error';
            return;
        }
   
        $actived = Taikhoan::active($username, $token, $password);
        if ($actived) {
            echo 'Đã kích hoạt thành công';
        }
        else {
            echo 'Không thể kích hoạt tài khoản của bạn';
        }     
    }

    public function danhsachgiangvien(Request $request) {
        $page = $request->get('page');
        echo Value::$nItemInList;
    }

    public function getChudenghiencuu() {
        $chudenghiencuu = ChuDeNghienCuu::all();
        $magiangvien = Auth::user()->username;

        $linhvuc = GiangvienLinhvuc::join('linhvuc', function($join) {
                        $join->on('linhvuc_gv.malinhvuc', '=', 'linhvuc.id');
                    })
                    ->where('magiangvien', $magiangvien)->get();
        return view('giangvien.chudenghiencuu')
                   ->with('chudenghiencuu', $chudenghiencuu)
                   ->with('linhvuc', $linhvuc);
    }

    public function getCategory() {
        $list = LinhVuc::all();
        // $list = LinhVuc::leftJoin('linhvuc_gv', function($join) {
        //             $join->on('linhvuc_gv.malinhvuc', '=', 'linhvuc.id');
        //         })
        //         ->get([
        //             'linhvuc.id',
        //             'linhvuc.tenlinhvuc',
        //             'linhvuc.parent_id',
        //             'linhvuc_gv.magiangvien']);
        $js_array = json_encode($list);
        echo $js_array;
    }

    public function tickCategory(Request $request) {
        $magiangvien = Auth::user()->username;
        GiangvienLinhvuc::where('magiangvien', $magiangvien)->delete();
        $linhvuc = $request->linhvuc;
        foreach ($linhvuc as $value) {
            $data = ['magiangvien'=>$magiangvien, 'malinhvuc'=>$value];
            GiangvienLinhvuc::insert($data);
        }

        $linhvuc = GiangvienLinhvuc::join('linhvuc', function($join) {
                        $join->on('linhvuc_gv.malinhvuc', '=', 'linhvuc.id');
                    })
                    ->where('magiangvien', $magiangvien)->get();

        return view('giangvien.danhsachlinhvuc')
                    ->with('linhvuc', $linhvuc);
    }
}
