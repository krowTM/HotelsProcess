<?php
use PHPUnit\Framework;
use HotelsProcess\Utils\StringFunctions;
use HotelsProcess\Output\OutputFactory;
use HotelsProcess\Model\Hotel;
use HotelsProcess\Utils\Storage;

class SortingTest extends PHPUnit_Framework_TestCase
{
	protected $test_file = 'test_sort.xml';
	
	public function testSort()
	{
		$output = OutputFactory::getHandle('xml');
		$processed_data = array();
		
		$hotel = new Hotel();
		$hotel->address = 'address';
		$hotel->contact = 'contact';
		$hotel->name = 'name';
		$hotel->phone = 'phone';
		$hotel->stars = '2';
		$hotel->uri = 'http://test.com';
		$processed_data[] = $hotel;
		
		$hotel = new Hotel();
		$hotel->address = 'address3';
		$hotel->contact = 'contact3';
		$hotel->name = 'name3';
		$hotel->phone = 'phone3';
		$hotel->stars = '4';
		$hotel->uri = 'http://test.com3';
		$processed_data[] = $hotel;
		
		$hotel = new Hotel();
		$hotel->address = 'address2';
		$hotel->contact = 'contact2';
		$hotel->name = 'name2';
		$hotel->phone = 'phone2';
		$hotel->stars = '3';
		$hotel->uri = 'http://test.com2';
		$processed_data[] = $hotel;		
		
		$output->setData($processed_data);
		$output->setTarget($this->test_file);
		$output->sort('name');
		$output->save();
		
		$file_contents = Storage::readFileToArray($this->test_file);
		$actual = trim($file_contents[1]);
		$expected = '<hotel><name>name</name><address>address</address><stars>2</stars><contact>contact</contact><phone>phone</phone><uri>http://test.com</uri></hotel>';
		$this->assertEquals($expected, $actual);
		
		$actual = trim($file_contents[2]);
		$expected = '<hotel><name>name2</name><address>address2</address><stars>3</stars><contact>contact2</contact><phone>phone2</phone><uri>http://test.com2</uri></hotel>';
		$this->assertEquals($expected, $actual);
		
		$actual = trim($file_contents[3]);
		$expected = '<hotel><name>name3</name><address>address3</address><stars>4</stars><contact>contact3</contact><phone>phone3</phone><uri>http://test.com3</uri></hotel>';
		$this->assertEquals($expected, $actual);
	}
	
	protected function tearDown()
	{
		Storage::deleteFile($this->test_file);
	}
}