<?php
namespace HotelsProcess\Output;

use HotelsProcess\Output\BaseOutput;
use HotelsProcess\Utils\Storage;

class XML extends BaseOutput
{
	public function save()
	{
		$xml = $this->convertToXml();
				
		Storage::writeFile($this->target, $xml);
	}
	
	private function convertToXml()
	{
		$xml = '<root>' . PHP_EOL;
		foreach ($this->data as $entry) {
			$xml .= '<' . strtolower($entry->getClassName()) . '>';
			foreach (get_object_vars($entry) as $name => $value) {
				$xml .= '<' . $name . '>' . $value . '</' . $name . '>';
			}
			$xml .= '</' . strtolower($entry->getClassName()) . '>' . PHP_EOL;
		}
			
		$xml .= '</root>';
		
		return $xml;
	}
	
}