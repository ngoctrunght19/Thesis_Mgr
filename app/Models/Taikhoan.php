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

	public static function changeOldPassword($username, $oldPassword, $newPassword) {
		echo 'username: ' . $username . '  password: ' . $newPassword . '<br>';
		echo 'username: ' . $username . '  old password: ' . $oldPassword . '<br>';
		$newPassword = Hash::make($newPassword);
		echo Taikhoan::where([['username', '=', $username],
							['password','=',$oldPassword]])
							->update(['password' => $newPassword]);
	}

	public static function changePassword($username, $newPassword) {
		echo 'username: ' . $username . '  password: ' . $newPassword . '<br>';
		echo Taikhoan::where('username', '=', $username)
					->update(['password' => $newPassword]);
	}

}