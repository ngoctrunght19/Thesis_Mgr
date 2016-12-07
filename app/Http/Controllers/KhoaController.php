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

    public function addKhoaHoc(Request $request) {
    	$tenkhoahoc = $request->get('khoahoc');
    	$khoahoc = new KhoaHoc();
    	$khoahoc->insert(['tenkhoahoc' => $tenkhoahoc]);
    }

    public function addNganh(Request $request) {
    	$tennganh = $request->get('nganh');
    	$nganhhoc = new NganhHoc();
    	$nganhhoc->insert(['tennganh' => $tennganh]);
    }
}
