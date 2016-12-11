<?php 

namespace App\Values;

class Value {
	public static $itemPerPage = 1;

	public static function getItemPerPage() {
		return self::$itemPerPage;
	}
}