<?php
use PHPUnit\Framework;
use HotelsProcess\Input\InputFactory;
use HotelsProcess\Utils\Storage;

class InputTest extends PHPUnit_Framework_TestCase
{
	protected $from_csv = 'csv';
	protected $input_file_csv = 'test_input.csv';
	
	public function testFactory()
	{
		$type = 'csv';
		$input = InputFactory::getHandle($type);
		$this->assertInstanceOf('HotelsProcess\Input\CSV', $input);
		
		/* $type = 'xml';
		$intput = InputFactory::getHandle($type);
		$this->assertNull($intput); */
	}
	
	public function testGetDataCSV()
	{
		$from = 'csv';
		$input_file = 'test_input.csv';
		$input = InputFactory::getHandle($this->from_csv);
		$input->setSource($this->input_file_csv);
		$data = $input->getData();
		
		$this->assertTrue(is_array($data));
		$this->assertTrue((count($data) == 1));
	}
	
	protected function setUp()
	{
		$data = "name,address,stars,contact,phone,uri
The Gibson,\"63847 Lowe Knoll, East Maxine, WA 97030-4876\",5,Dr. Sinda Wyman,1-270-665-9933x1626,http://www.paucek.com/search.htm";
		Storage::writeFile($this->input_file_csv, $data);
	}
	
	protected function tearDown()
	{
		Storage::deleteFile($this->input_file_csv);
	}
}