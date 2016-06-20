<?php
use PHPUnit\Framework;
use HotelsProcess\Output\OutputFactory;
use HotelsProcess\Model\Hotel;
use HotelsProcess\Utils\Storage;

class OutputTest extends PHPUnit_Framework_TestCase
{
	protected $to_sql = 'sql';
	protected $to_sql_target = 'test.sql';
	protected $to_xml = 'xml';
	protected $to_xml_target = 'test.xml';
	
	public function testFactory()
	{
		$type = 'sql';
		$output = OutputFactory::getHandle($type);
		$this->assertInstanceOf('HotelsProcess\Output\SQL', $output);
	}
	
	public function testSaveXML()
	{
		$output = OutputFactory::getHandle($this->to_xml);
		$processed_data = array();
		$hotel = new Hotel();
		$hotel->address = 'address';
		$hotel->contact = 'contact';
		$hotel->name = 'name';
		$hotel->phone = 'phone';
		$hotel->stars = '2';
		$hotel->uri = 'http://test.com';
		$processed_data[] = $hotel;
		$output->setData($processed_data);
		$output->setTarget($this->to_xml_target);
		$output->save();
		
		$file_contents = Storage::readFileToArray($this->to_xml_target);
		$actual = trim($file_contents[1]);
		$expected = '<hotel><name>name</name><address>address</address><stars>2</stars><contact>contact</contact><phone>phone</phone><uri>http://test.com</uri></hotel>';
		$this->assertEquals($expected, $actual);
	}
	
	public function testSaveSQL()
	{
		$output = OutputFactory::getHandle($this->to_sql);
		$processed_data = array();
		$hotel = new Hotel();
		$hotel->address = 'address';
		$hotel->contact = 'contact';
		$hotel->name = 'name';
		$hotel->phone = 'phone';
		$hotel->stars = '2';
		$hotel->uri = 'http://test.com';
		$processed_data[] = $hotel;
		$output->setData($processed_data);
		$output->setTarget($this->to_sql_target);
		$output->save();
	
		$file_contents = Storage::readFileToArray($this->to_sql_target);
		$actual = trim($file_contents[0]);
		$expected = 'INSERT INTO `hotel `  (`name`,`address`,`stars`,`contact`,`phone`,`uri`) VALUES (`name`,`address`,`2`,`contact`,`phone`,`http://test.com`);';
		$this->assertEquals($expected, $actual);
	}
	
	protected function setUp()
	{
		
	}
	
	protected function tearDown()
	{
		Storage::deleteFile($this->to_sql_target);
		Storage::deleteFile($this->to_xml_target);
	}
}