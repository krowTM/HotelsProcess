<?php
namespace HotelsProcess\Output;

use HotelsProcess\Utils\Sorting;

abstract class BaseOutput
{
	protected $target;
	protected $data;
	
	public abstract function save();
	
	public function setData($data)
	{
		$this->data = $data;
	}
	
	public function setTarget($target)
	{
		$this->target = $target;
	}
	
	public function sort($sort_by) 
	{
		Sorting::sort($this->data, $sort_by);	
	}
}