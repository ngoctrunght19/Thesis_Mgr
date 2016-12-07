<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PHPExcel_IOFactory;
use Exception;
use DB;

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

            $password = str_random(8);
            $account = [$magiangvien, $password, 'giangvien'];
            try {
				DB::insert('insert into taikhoan (username, password, quyen) values (?, ?, ?)', $account);
			} catch(Illuminate\Database\QueryException $e){
				return 'Đã có lỗi xảy ra';
            } catch(Exception $e) {
				return 'Đã có lỗi xảy ra';
			}
			
			$query = DB::select('select id from taikhoan where username = ?', [$magiangvien]);
			if (isset($query[0]))
				$account_id = $query[0]->id;
			else {
				return 'Đã có lỗi xảy ra';
			}

            $data = [$magiangvien, $hoten, $email, 0, $account_id];
			try {
				DB::insert('insert into giangvien (magiangvien, hoten, email, makhoa, taikhoan	) values (?, ?, ?, ?, ?)', $data);
			} catch(Exception $e) {
				return 'Đã có lỗi xảy ra';
			}
		}

        $objPHPExcel->disconnectWorksheets();
        unset($objPHPExcel);

        return $message;
    }

}
