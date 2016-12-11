<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GiangVien;
use App\Values\Value;
use App\Helpers\Pagination;
use URL;

class QueryController extends Controller
{
    public function getResult(Request $request) {
    	$obj = $request->get('obj');
    	$page = $request->get('page');
    	if ($obj == null || $page == null) {
    		return;
    	}
    	$page = intval($page);
    	$itemPerPage = Value::getItemPerPage();
    	if ($obj == 'giangvien') {
    		$giangvien = GiangVien::getPage($page, $itemPerPage);
    		$total = GiangVien::count();
    		$preurl = URL::to('/');
	        $preurl .= '/query?obj=giangvien';
	        $paginationObj = new Pagination($page, $total, $itemPerPage, $preurl);
	        $pagination = $paginationObj->getPagination();
    		
    		return View('khoa.danhsachgiangvien')
    							->with('giangvien', $giangvien)
                                ->with('pagination', $pagination);

    	} 
    }

    public function getResultSearch(Request $request) {
    	$obj = $request->get('obj');
    	$page = $request->get('page');
    	if ($obj == null || $page == null) {
    		return;
    	}
    	$page = intval($page);
    	$itemPerPage = Value::getItemPerPage();
    	if ($obj == 'giangvien') {
    		var_dump($page);
    		$list = GiangVien::getPage(10, $itemPerPage);
    	} 
    }
}
