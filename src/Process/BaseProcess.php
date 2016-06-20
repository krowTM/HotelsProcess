<?php
namespace HotelsProcess\Process;

use HotelsProcess\App\Settings;

interface BaseProcess 
{
	public function init();
	public function run();
	public function setParams(Settings $settings);
}