<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PHPExcel_IOFactory;
use Exception;
use DB;
use Session;
use Mail;

class Khoa extends Model
{
    public static function importLecturerFromExcel($path) {
    	$message = null;

    	$objPHPExcel = PHPExcel_IOFactory::load($path);
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $nRows = $objWorksheet->getHighestRow();
  
        for ($row = 1; $row < $nRows; ++$row) {
        	$magiangvien = $objWorksheet->getCell("A" . $row)->getValue();
            $hoten = $objWorksheet->getCell("B" . $row)->getValue();
            $email = $objWorksheet->getCell("C" . $row)->getValue();

            $makhoa = Session::get('makhoa');

            $message = self::themGiangVien($magiangvien, $hoten, $email, $makhoa);
		}

        $objPHPExcel->disconnectWorksheets();
        unset($objPHPExcel);

        return $message;
    }

    // Thêm một giảng viên vào csdl
    public static function themGiangVien($magiangvien, $hoten, $email, $makhoa) {
        //    $password = str_random(8);
        $password = \Hash::make('hello');
        $account = [$magiangvien, $password, 'giangvien'];
        try {
            DB::insert('insert into taikhoan (username, password, quyen) values (?, ?, ?)', $account);
        } catch(Illuminate\Database\QueryException $e){
            echo $e->getMessage();
            return 'lôi thêm tài khoản';
        } catch(Exception $e) {
            return $e->getMessage();
        }
        
        $query = DB::select('select id from taikhoan where username = ?', [$magiangvien]);
        if (isset($query[0]))
            $account_id = $query[0]->id;
        else {
            return 'lỗi lấy id tài khoản';
        }

        $makhoa = Session::get('makhoa');
        $data = [$magiangvien, $hoten, $email, $makhoa, $account_id];
        try {
            DB::insert('insert into giangvien (magiangvien, hoten, email, makhoa, mataikhoan) values (?, ?, ?, ?, ?)', $data);
        } catch(Exception $e) {
            return 'lỗi thêm giảng viên';
        }
    }

    public static function sendEmailToLecturer($gv) {
    	$gv = DB::select('select * from giangvien limit 3');

		$data = array('email'=>$gv->email, 'hoten' => $gv->hoten);
	 	Mail::send('mails.taikhoangiangvien', $data, function($message) use ($data)
	 	{
            $message->to($data['email'], $data['hoten'])->subject('Kích hoạt tài khoản');
        });
    	

        if( count(Mail::failures()) > 0 ) {

           echo "There was one or more failures. They were: <br />";

           foreach(Mail::failures as $email_address) {
               echo " - $email_address <br />";
            }

        } else {
            echo "No errors, all sent successfully!";
        }
    }

}
