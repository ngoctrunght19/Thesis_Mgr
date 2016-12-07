<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhoaHoc;
use App\NganhHoc;

class KhoaController extends Controller
{
    //
    public function addGV() {
    	echo "string";
    	// s
    
    }

    public function themKhoaHoc($tenkhoahoc) {
    	$khoahoc = new KhoaHoc();
    	$khoahoc->insert(['tenkhoahoc' => $tenkhoahoc]);
    	return redirect()->route('khoa');
    }

    public function themNganh($tennganh) {
    	$nganh = new NganhHoc();
    	$nganh->insert(['tennganh' => $tennganh]);
    	return redirect()->route('khoa');
    }

    public function xoaKhoaHoc($id) {
    	KhoaHoc::find($id)->delete();
    	return redirect()->route('khoa');
    }

    public function xoaNganh($id) {
    	NganhHoc::find($id)->delete();
    	return redirect()->route('khoa');
    }
}
