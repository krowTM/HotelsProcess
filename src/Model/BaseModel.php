<?php
namespace HotelsProcess\Model;

abstract class BaseModel
{
	public abstract function isValid();
	
	public function getClassName()
	{
		$reflect = new \ReflectionClass($this);
		return $reflect->getShortName();
	}
}