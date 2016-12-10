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

class Controller1 extends Controller
{

    

	public function getView() {
		return view('uploadexcel');
	}

    public function upload() {
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
                    echo 'exception ';
                    echo $e->getMessage();
                }
            }
        }
        else {
            $errorMessage = 'Bạn chưa chọn file';
            return;
        }
        $info = null;
        if ($message == null) {
            $info = 'Đã thêm thành công '.$message.' giảng viên';
        }
        else {
            $info = $errorMessage;
        }
        
        $giangvien = GiangVien::take(15)->get();
        echo $info;
    //    return view('khoa.danhsachgiangvien')->with(['giangvien'=>$giangvien,'info'=> $info]);
    }

    public function typeLecturer(Request $request) {
        $name = $request->get('name');
        $id = $request->get('id');
        $email = $request->get('email');
        if ($name == null || $id == null || $email == null
            || trim($name)=="" || trim($id) == "" || trim($email)=="") 
        {
            echo 'Nhập thiếu thông tin';
            return;
        }
        $name = trim($name);
        $id = trim($id);
        $email = trim($email);
        echo 'hello';
    //    Khoa::themGiangVien($id, $name)
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
        $js_array = json_encode(CreateTree::$list);
        echo $js_array;
    }

    public function getActive(Request $request)
    {
        $token = $request->get('token');
        if ($token == null || $token == '')
            return view('login');
        if (Taikhoan::where('password', '=', $token)->first() == null)
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

        Taikhoan::changeOldPassword($username, $token, $password);
    //    echo 'hello';
    //    return back();
    }

    public function upload0() {
        $path = null;

        if (isset($_FILES['excel']))
        {
            // Nếu file upload không bị lỗi,
            // Tức là thuộc tính error > 0
            if ($_FILES['excel']['error'] > 0)
            {
                echo 'File Upload Bị Lỗi';
            }
            else{
                // Upload file
                move_uploaded_file($_FILES['excel']['tmp_name'], './uploads'.$_FILES['excel']['name']);
                $path = './uploads'.$_FILES['excel']['name'];
                echo $path;
            }
        }
		else {
			echo 'Bạn chưa chọn file';
			return;
		}
		

        $objPHPExcel = PHPExcel_IOFactory::load($path);
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $nRows = $objWorksheet->getHighestRow();
  
        for ($row = 1; $row < $nRows; ++$row) {
        	$magiangvien = $objWorksheet->getCell("A" . $row)->getValue();
            $hoten = $objWorksheet->getCell("B" . $row)->getValue();
            $email = $objWorksheet->getCell("C" . $row)->getValue();

            $password = str_random(8);
            $account = [$magiangvien, $password, 'giangvien'];
            try {
				DB::insert('insert into taikhoan (username, password, quyen) values (?, ?, ?)', $account);
			} catch(Illuminate\Database\QueryException $e){
				echo 'vai cả exception';
				return;
            } catch(Exception $e) {
			//    echo $e . '<br />' . 'kệ tôi' . '<br />';
			}
			
			$query = DB::select('select id from taikhoan where username = ?', [$magiangvien]);
			if (isset($query[0]))
				$account_id = $query[0]->id;
			else {
				echo 'failed';
				return;
			}

            $data = [$magiangvien, $hoten, $email, 0, $account_id];
			try {
				DB::insert('insert into giangvien (magiangvien, hoten, email, makhoa, taikhoan	) values (?, ?, ?, ?, ?)', $data);
			} catch(Exception $e) {
				echo 'cannot insert into giangvien';
				echo $e->getMessage();
			}
		}
       	
       	echo "done";

        $objPHPExcel->disconnectWorksheets();
        unset($objPHPExcel);
    }
}
