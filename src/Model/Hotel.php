<?php
namespace HotelsProcess\Model;

use HotelsProcess\Model\BaseModel;
use HotelsProcess\Utils\StringFunctions;

class Hotel extends BaseModel
{
	public $name;
	public $address;
	public $stars;
	public $contact;
	public $phone;
	public $uri;
	
	public function isValid()
	{
		if (StringFunctions::isValidUtf8($this->name) && 
			StringFunctions::isValidUrl($this->uri) &&
			(int)$this->stars >= 0 && (int)$this->stars <= 5		
		) {
			return true;
		}
		
		return false;
	}
}