<?php
namespace HotelsProcess\Process;

use HotelsProcess\Process\BaseProcess;
use HotelsProcess\Input\InputFactory;
use HotelsProcess\App\Settings;
use HotelsProcess\Model\Hotel;
use HotelsProcess\Output\OutputFactory;

class Convert implements BaseProcess 
{
	private $from;
	private $input;
	private $to;
	private $output;
	private $sort_by = 'none';
	
	public function init()
	{
		
	}
	
	public function run() 
	{
		$input = InputFactory::getHandle($this->from);
		$input->setSource($this->input);
		$data = $input->getData();
		
		$processed_data = $this->process($data);
		
		$output = OutputFactory::getHandle($this->to);
		$output->setData($processed_data);
		if ($this->sort_by != 'none') {
			$output->sort($this->sort_by);
		}
		$output->setTarget($this->output);
		$output->save();
	}
	
	public function setParams(Settings $settings) 
	{
		$this->from = $settings->params['from'];
		$this->input = $settings->params['input'];
		$this->to = $settings->params['to'];
		$this->output = $settings->params['output'];	
		
		if (isset($settings->params['sort_by'])) {
			$this->sort_by = $settings->params['sort_by'];
		}
	}
	
	private function process($data)
	{
		$ret = array();
		
		foreach ($data as $hotel_info) {
			$hotel = new Hotel();
			$hotel->address = $hotel_info['address'];
			$hotel->contact = $hotel_info['contact'];
			$hotel->name = $hotel_info['name'];
			$hotel->phone = $hotel_info['phone'];
			$hotel->stars = $hotel_info['stars'];
			$hotel->uri = $hotel_info['uri'];
			if ($hotel->isValid()) {
				$ret[] = $hotel;		
			}
		}
		
		return $ret;
	}
}