<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Exception;

class GiangVien extends Model
{
    //
    protected $table = 'giangvien';

    // lấy $n giảng viên từ vị trí pos trong bảng giangvien
    public static function get($pos, $n) {
    	try {
    		$query = DB::select('select * from giangvien limit ?, ?', [$pos, $n]);
    	} catch (Exception $e) {
    		$query = array();
    	}

    	return $query;
    }
}
