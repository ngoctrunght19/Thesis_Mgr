<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocVien extends Model
{
    //
    protected $table = 'hocvien';


    // lấy $n giảng viên từ vị trí pos trong bảng hocvien
    public static function get($pos, $n) {
    	try {
            $query = HocVien::limit($n)->offset($pos)->get();
    	} catch (Exception $e) {
    		$query = array();
    	}

    	return $query;
    }

    public static function getPage($pageNumber, $itemPerPage) {
        $pos = $itemPerPage * ($pageNumber-1);
        $query = HocVien::limit($itemPerPage)->offset($pos)->get();
        if (count($query)==0) {
            $query = HocVien::limit($itemPerPage)->get();
        }

        return $query;
    }
}
