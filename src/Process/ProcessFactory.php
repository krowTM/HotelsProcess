<?php
namespace HotelsProcess\Process;

use HotelsProcess\App\Settings;

class ProcessFactory 
{
	public static function createProcess(Settings $settings) 
	{
		if ($settings->process == 'convert') {
			return new Convert();
		}		
	}
}