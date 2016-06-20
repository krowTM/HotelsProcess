<?php
namespace HotelsProcess\App;

class Settings 
{
	public $process = 'convert';
	public $params = array(
		'from' => 'csv',
		'input' => 'hotels.csv',
		'to' => 'xml',
		'output' => 'hotels.xml'
	); 
}