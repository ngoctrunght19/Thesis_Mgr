<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PHPExcel_IOFactory;
use Exception;
use DB;
use Session;
use Mail;
use Hash;

class Taikhoan extends Model
{
	protected $table = 'taikhoan';

	// thay đổi mật khẩu của người dùng có $username
	// trả về true nếu thành công
	// ngược lại trả về false: tên đăng nhập hoặc mật khẩu không đúng
	public static function changeOldPassword($username, $oldPassword, $newPassword) {
		$oldPassword = Hash::make($oldPassword);
		$newPassword = Hash::make($newPassword);
		return Taikhoan::where([['username', '=', $username],
							['password','=',$oldPassword]])
							->update(['password' => $newPassword]);
	}

	public static function changePassword($username, $newPassword) {
		Taikhoan::where('username', '=', $username)
					->update(['password' => $newPassword]);
	}

	// kích hoạt tài khoản
	public static function active($username, $token, $password) {
		$password = Hash::make($password);
		return Taikhoan::where([['username', '=',$username],
								['password', '=', $token]])
							->update(['password'=>$password, 'actived'=>'1']);
	}

}