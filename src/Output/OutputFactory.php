<?php
namespace HotelsProcess\Output;

use HotelsProcess\Output\XML;
use HotelsProcess\Output\SQL;

class OutputFactory 
{
	public static function getHandle($type) 
	{
		if ($type == 'xml') {
			return new XML();
		}
		elseif ($type == 'sql') {
			return new SQL();
		}		
	}
}