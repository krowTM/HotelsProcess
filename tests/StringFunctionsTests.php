<?php
use PHPUnit\Framework;
use HotelsProcess\Utils\StringFunctions;

class StringFunctionsTest extends PHPUnit_Framework_TestCase
{
	public function testIsValidUtf8()
	{
		$t = 'Å';
		$test = StringFunctions::isValidUtf8($t);
		$this->assertFalse($test);
		
		$t = 'x';
		$test = StringFunctions::isValidUtf8($t);
		$this->assertTrue($test);
	}
	
	public function testIsValidUrl()
	{
		$t = 'http://www.google.com';
		$test = StringFunctions::isValidUrl($t);
		$this->assertTrue($test);
		
		$t = 'http:/www.google.com';
		$test = StringFunctions::isValidUrl($t);
		$this->assertFalse($test);
	}
}