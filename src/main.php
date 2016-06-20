<?php

require_once 'bootstrap.php';

// ouput as CSV
$settings = new HotelsProcess\App\Settings;
$settings->process = 'convert';
$settings->params = array(
		'from' => 'csv',
		'input' => 'hotels.csv',
		'to' => 'xml',
		'output' => 'hotels.xml'
);
$app = new HotelsProcess\App\Main;
$app->setSettings($settings);
$app->run();

// ouput as SQL file
$settings = new HotelsProcess\App\Settings;
$settings->process = 'convert';
$settings->params = array(
	'from' => 'csv',
	'input' => 'hotels.csv',
	'to' => 'sql',
	'output' => 'hotels.sql'
);
$app = new HotelsProcess\App\Main;
$app->setSettings($settings);
$app->run();

// ouput as sorted XML file
$settings = new HotelsProcess\App\Settings;
$settings->process = 'convert';
$settings->params = array(
		'from' => 'csv',
		'input' => 'hotels_small.csv',
		'to' => 'xml',
		'output' => 'hotels_small_sorted.xml',
		'sort_by' => 'name'
);
$app = new HotelsProcess\App\Main;
$app->setSettings($settings);
$app->run();

?>