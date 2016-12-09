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

            $success = self::themGiangVien($magiangvien, $hoten, $email, $makhoa);
            
            if ($success) {
                $token = Giangvien::select('password')->where('username', $hoten)->first();
        //        sendEmailToLecturer($email, $hoten, $token);
            }
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
        } catch(Exception $e) {
            return false;
        }
        
        $query = DB::select('select id from taikhoan where username = ?', [$magiangvien]);
        if (isset($query[0]))
            $account_id = $query[0]->id;
        else {
            return false;
        }

        $makhoa = Session::get('makhoa');
        $data = [$magiangvien, $hoten, $email, $makhoa, $account_id];
        try {
            DB::insert('insert into giangvien (magiangvien, hoten, email, makhoa, mataikhoan) values (?, ?, ?, ?, ?)', $data);
        } catch(Exception $e) {
            return false;
        }

        return true;
    }

    public static function sendEmailToLecturer($email, $hoten, $token) {
    	
		$data = array('email'=>$email, 'hoten' => $hoten);
	 	Mail::send('mails.taikhoangiangvien', $data, function($message) use ($data)
	 	{
            $message->to($data['email'], $data['hoten'])->subject('Kích hoạt tài khoản');
        });

        return(count(Mail::failures()) == 0 );
    }


    public static function sendEmail() {

        $gv = DB::table('giangvien')->where('magiangvien', 'gv01')->first();
        $magiangvien = $gv->magiangvien;
        $query = DB::table('taikhoan')->where('username', $magiangvien)->first();
        $token = $query->password;
        $url = self::$domain . 'active?username='.$query->username.'&token='.$token;
        
        $data = array('email'=>$gv->email, 'hoten' => $gv->hoten, 'url' => $url);
        echo $url;
        Mail::send('mails.taikhoangiangvien', $data, function($message) use ($data)
        {
            $message->to($data['email'], $data['hoten'])->subject('Kích hoạt tài khoản');
        });

        return(count(Mail::failures()) == 0 );
    }


    static $domain = 'http://localhost:8000/';

}
