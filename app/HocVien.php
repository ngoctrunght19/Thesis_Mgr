<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocVien extends Model
{
    //
    protected $table = 'hocvien';

    public $timestamps = false;


    // lấy $n giảng viên từ vị trí pos trong bảng hocvien
    public static function get($pos, $n) {
    	try {
            $query = HocVien::limit($n)->offset($pos)->get();
    	} catch (Exception $e) {
    		$query = array();
    	}

    	return $query;
    }

    // lấy trang học viên
    public static function getPage($pageNumber, $itemPerPage) {
        $pos = $itemPerPage * ($pageNumber-1);
        $query = HocVien::limit($itemPerPage)->offset($pos)->get();
        if (count($query)==0) {
            $query = HocVien::limit($itemPerPage)->get();
        }

        return $query;
    }

    public static function chuanop() {
        $list = HocVien::where([['danophoso', 0],['duocdangky', 1]])->get();
        return $list;
    }

    public static function dudieukien() {
        $list = HocVien::where('danophoso', 1)->get();
        return $list;
    }

    public static function tongquan() {
        $list = HocVien::select('hocvien.mahocvien', 'hocvien.duocdangky' ,'hocvien.hoten as tenhocvien', 'detai.tendetai', 'giangvien.hoten as tengiangvien', 'detai.trangthai')
                    ->leftJoin('detai','hocvien.mahocvien', '=', 'detai.mahocvien')
                    ->leftJoin('giangvien','detai.giangvienhuongdan', '=', 'giangvien.magiangvien')
                    ->distinct('mahocvie')
                    ->get();

        return $list;
    }
}
