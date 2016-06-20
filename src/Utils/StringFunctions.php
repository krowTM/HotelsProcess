<?php
namespace HotelsProcess\Utils;

class StringFunctions
{
	public static function isValidUtf8($t)
	{
		return mb_check_encoding($t, 'UTF-8');
	}
	
	public static function isValidUrl($t) {
		if (filter_var($t, FILTER_VALIDATE_URL) !== false) {
			return true;
		}
		
		return false;
	}
}