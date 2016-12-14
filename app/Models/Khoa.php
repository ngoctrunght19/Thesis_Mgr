<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PHPExcel_IOFactory;
use Exception;
use DB;
use Session;
use Mail;
use App\Models\Donvi;
use App\HocVien;

class Khoa extends Model
{

    public static function importLecturerFromExcel($path) {
    	$message = null;

    	$objPHPExcel = PHPExcel_IOFactory::load($path);
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $nRows = $objWorksheet->getHighestRow();

        // đếm số giảng viên đã thêm thành công
        $count = 0;

        for ($row = 1; $row < $nRows; ++$row) {
        	$magiangvien = $objWorksheet->getCell("A" . $row)->getValue();
            $hoten = $objWorksheet->getCell("B" . $row)->getValue();
            $email = $objWorksheet->getCell("C" . $row)->getValue();
            $donvi = $objWorksheet->getCell("D" . $row)->getValue();

            $makhoa = Session::get('makhoa');

            echo $magiangvien.'<br>';
            $success = self::themGiangVien($magiangvien, $hoten, $email, $donvi, $makhoa);
            
            if ($success) {
                $query = Taikhoan::select('password')->where('username','=',$magiangvien)->first();
                $token = $query->password;
//                Khoa::sendEmailToLecturer($email, $magiangvien, $hoten, $token);
                $count++;
            }
		}

        $objPHPExcel->disconnectWorksheets();
        unset($objPHPExcel);
     
        return $count;
    }

    // Thêm một giảng viên vào csdl
    public static function themGiangVien($magiangvien, $hoten, $email, $donvi, $makhoa) {
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
        $data = [$magiangvien, $hoten, $email, $makhoa, $account_id, $donvi];
        try {
            DB::insert('insert into giangvien (magiangvien, hoten, email, makhoa,mataikhoan, donvi) values (?, ?, ?, ?, ?, ?)', $data);
        } catch(Exception $e) {
            return false;
        }

        return true;
    }

    public static function sendEmailToLecturer($email, $id, $hoten, $token) {
    	
        $url = self::$domain.$id.'&token='.$token;
		$data = array('url'=>$url, 'email'=>$email, 'hoten' => $hoten);
	 	Mail::send('mails.taikhoangiangvien', $data, function($message) use ($data)
	 	{
            $message->to($data['email'], $data['hoten'])->subject('Kích hoạt tài khoản');
        });

        return(count(Mail::failures()) == 0 );
    }

    public static function importStudentFromExcel($path) {
        $message = null;

        $objPHPExcel = PHPExcel_IOFactory::load($path);
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $nRows = $objWorksheet->getHighestRow();

        // đếm số học viên đã thêm thành công
        $count = 0;

        for ($row = 1; $row < $nRows; ++$row) {
            $mahocvien = $objWorksheet->getCell("A" . $row)->getValue();
            $hoten = $objWorksheet->getCell("B" . $row)->getValue();
            $khoahoc = $objWorksheet->getCell("C" . $row)->getValue();
            $chuongtrinhdaotao = $objWorksheet->getCell("D" . $row)->getValue();
            $email = $objWorksheet->getCell("E" . $row)->getValue();

            $makhoa = Session::get('makhoa');

            $success = self::addStudent($mahocvien, $hoten, $khoahoc, 
                                            $chuongtrinhdaotao, $email, $makhoa);
            
            if ($success) {
                $query = Taikhoan::select('password')->where('username','=',$mahocvien)->first();
                $token = $query->password;
                Khoa::sendEmailToLecturer($email, $mahocvien, $hoten, $token);
                $count++;
            }
        }

        $objPHPExcel->disconnectWorksheets();
        unset($objPHPExcel);
     
        return $count;
    }

    // Thêm một giảng viên vào csdl
    public static function addStudent($mahocvien, $hoten, $khoahoc, 
                                    $chuongtrinhdaotao, $email, $makhoa) {
        //    $password = str_random(8);
        $password = \Hash::make('hello');
        $account = ['username'=>$mahocvien, 'password'=>$password, 'quyen'=>'hocvien'];
        try {
            Taikhoan::insert($account);
        } catch(Exception $e) {
            return false;
        }
    
        $query = Taikhoan::where('username', '=', $mahocvien)->first();
        if ($query != null)
            $account_id = $query->id;
        else {
            return false;
        }
        $makhoa = Session::get('makhoa');
        $data = ['mahocvien'=>$mahocvien, 'hoten'=>$hoten, 'email'=>$email, 'makhoa'=>$makhoa, 
                'mataikhoan'=>$account_id, 'khoahoc'=>$khoahoc, 'nganhhoc'=>$chuongtrinhdaotao];
        try {
            Hocvien::insert($data);
        } catch(Exception $e) {
            return false;
        }

        return true;
    }


    public static function sendEmail() {

        $gv = DB::table('giangvien')->where('magiangvien', 'gv01')->first();
        $magiangvien = $gv->magiangvien;
        $query = DB::table('taikhoan')->where('username', $magiangvien)->first();
        $token = $query->password;
        $url = self::$domain.$query->username.'&token='.$token;
        
        $data = array('email'=>$gv->email, 'hoten' => $gv->hoten, 'url' => $url);
        echo $url;
        Mail::send('mails.taikhoangiangvien', $data, function($message) use ($data)
        {
            $message->to($data['email'], $data['hoten'])->subject('Kích hoạt tài khoản');
        });

        return(count(Mail::failures()) == 0 );
    }


    static $domain = 'http://localhost:8000/active?username=';

}
