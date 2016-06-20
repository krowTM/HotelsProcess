<?php
namespace HotelsProcess\Input;

use HotelsProcess\Input\CSV;

class InputFactory 
{
	public static function getHandle($type) 
	{
		if ($type == 'csv') {
			return new CSV();
		}		
	}
}