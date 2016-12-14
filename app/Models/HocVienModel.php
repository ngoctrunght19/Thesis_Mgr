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

class HocVienModel extends Model
{
    // import các học viên đủ điều kiện đăng ký đề tài từ file excel
    // hàm trả về số lượng học viên đã được import
    public static function importHVDuocDangKy($path) {

        $objPHPExcel = PHPExcel_IOFactory::load($path);
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $nRows = $objWorksheet->getHighestRow();
        
        // đếm số học viên đã thay thành công
        $count = 0;
        $success = null;

        for ($row = 1; $row <= $nRows; ++$row) {
            $mahocvien = $objWorksheet->getCell("A" . $row)->getValue();

            $success = HocVien::where('mahocvien', '=', $mahocvien)
                ->update(['duocdangky' => '1']);
            if ($success) {
                $count++;
            }
        }

        $objPHPExcel->disconnectWorksheets();
        unset($objPHPExcel);
     
        return $count;
    }

}
