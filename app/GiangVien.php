<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Exception;
use App\Values\Value;

class GiangVien extends Model
{
    //
    protected $table = 'giangvien';

    // lấy $n giảng viên từ vị trí pos trong bảng giangvien
    public static function get($pos, $n) {
    	try {
            $query = GiangVien::limit($n)->offset($pos)->get();
    	} catch (Exception $e) {
    		$query = array();
    	}

    	return $query;
    }

    public static function getPage($pageNumber, $itemPerPage) {
        $pos = $itemPerPage * ($pageNumber-1);
        $query = GiangVien::limit($itemPerPage)->offset($pos)->get();
        if (count($query)==0) {
            $query = GiangVien::limit($itemPerPage)->get();
        }

        return $query;
    }
}
