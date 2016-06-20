<?php
use PHPUnit\Framework;
use HotelsProcess\App\Settings;
use HotelsProcess\Process\ProcessFactory;

class ProcessTest extends PHPUnit_Framework_TestCase
{
	public function testFactory()
	{
		$settings = new Settings();
		$settings->process = 'convert';
		$process = ProcessFactory::createProcess($settings);
		
		$this->assertInstanceOf('HotelsProcess\Process\Convert', $process);
		
		$process->setParams($settings);
	}
}