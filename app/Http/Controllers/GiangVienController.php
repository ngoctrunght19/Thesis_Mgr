<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
use Session;


class GiangVienController extends Controller
{
  public function show() {
    return view('giangvien');
  }

}
