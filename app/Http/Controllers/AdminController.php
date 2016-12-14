<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
use Session;


class AdminController extends Controller
{
  public function show() {
    return view('admin');
  }

  public function getLinhVuc() {
  	return view('admin.linhvuc');
  }

}
