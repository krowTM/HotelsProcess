<?php
namespace HotelsProcess\Input;

interface BaseInput 
{
	public function getData();
	public function setSource($source);
}