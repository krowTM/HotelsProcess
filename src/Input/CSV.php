<?php
namespace HotelsProcess\Input;

use HotelsProcess\Input\BaseInput;
use HotelsProcess\Utils\Storage;

class CSV implements BaseInput
{
	private $source;
	
	public function getData()
	{
		$csv = array_map('str_getcsv', Storage::readFileToArray($this->source));
		$header = $csv[0];
		for ($i = 1; $i < count($csv); $i++) {
			for ($j = 0; $j < count($header); $j++) {
				$csv[$i][$header[$j]] = $csv[$i][$j];
				unset($csv[$i][$j]); 
			}
		}
		
		unset($csv[0]);
		
		return $csv;
	}
	
	public function setSource($source)
	{
		$this->source = $source;
	}
}