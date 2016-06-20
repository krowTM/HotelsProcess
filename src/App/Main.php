<?php
namespace HotelsProcess\App;

use HotelsProcess\Process\ProcessFactory;

class Main 
{	
	private $settings;
	
	public function __construct() 
	{
		$this->init();
	}
	
	public function setSettings(Settings $settings)
	{
		$this->settings = $settings;
	}
	
	public function run() 
	{
		$process = ProcessFactory::createProcess($this->settings);		
		$process->setParams($this->settings);		
		$process->init();
		
		$process->run();
	}
	
	private function init() 
	{
		$this->settings = new Settings;
	}
}