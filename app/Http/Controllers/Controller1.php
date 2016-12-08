<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPExcel_IOFactory;
use DB;
use Exception;
use App\Models\Khoa;

class Controller1 extends Controller
{

	public function getView() {
		return view('uploadexcel');
	}

    public function upload() {
        $path = null;
        $success = true;
        $errorMessage = null;

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
                move_uploaded_file($_FILES['excel']['tmp_name'], './uploads'.$_FILES['excel']['name']);
                $path = './uploads'.$_FILES['excel']['name'];
                try {
                    $errorMessage = Khoa::importLecturerFromExcel($path);
                } catch(Exception $e) {
                    
                }
            }
        }
        else {
            $errorMessage = 'Bạn chưa chọn file';
            return;
        }
        $info = null;
        if ($errorMessage == null) {
            $info = "Đã thêm giảng viên";
        }
        else {
            $info = $errorMessage;
        }
        
        return view('khoa.danhsachgiangvien')->with(['info'=> $info]);
    }

    public function sendEmailToLecturer() {
        Khoa::sendEmailToLecturer();
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
