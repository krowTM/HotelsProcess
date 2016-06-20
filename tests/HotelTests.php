<?php
use PHPUnit\Framework;
use HotelsProcess\Model\Hotel;

class HotelTest extends PHPUnit_Framework_TestCase
{
	public function testIsValid()
	{
		$hotel = new Hotel();
		$hotel->address = 'address';
		$hotel->contact = 'contact';
		$hotel->name = 'name';
		$hotel->phone = 'phone';
		$hotel->stars = '2';
		$hotel->uri = 'http://test.com';
		$test = $hotel->isValid();
		$this->assertTrue($test);
		
		$hotel->name = 'Å';
		$test = $hotel->isValid();
		$this->assertFalse($test);
		
		$hotel->name = 'name';
		$hotel->uri = 'http//test.com';
		$test = $hotel->isValid();
		$this->assertFalse($test);
		
		$hotel->uri = 'http://test.com';
		$hotel->stars = -5;
		$test = $hotel->isValid();
		$this->assertFalse($test);
	}
}