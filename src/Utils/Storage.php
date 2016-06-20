<?php
namespace HotelsProcess\Utils;

class Storage
{
	public static function getPath($file)
	{
		return BASE_PATH . 'storage/' . $file;
	}
	
	public static function readFileToArray($file)
	{
		return file(Storage::getPath($file));
	}
	
	public static function writeFile($target, $contents) 
	{
		file_put_contents(Storage::getPath($target), $contents);
	}
	
	public static function deleteFile($target)
	{
		@unlink(Storage::getPath($target));
	}
}