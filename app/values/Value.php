<?php 

namespace App\Values;

class Value {
	public static $itemPerPage = 3;

	public static function getItemPerPage() {
		return self::$itemPerPage;
	}
}