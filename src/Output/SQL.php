<?php
namespace HotelsProcess\Output;

use HotelsProcess\Output\BaseOutput;
use HotelsProcess\Utils\Storage;

class SQL extends BaseOutput
{	
	public function save()
	{
		$sql = $this->convertToSql();
		
		Storage::writeFile($this->target, $sql);
	}
	
	private function convertToSql()
	{
		$sql = '';
		foreach ($this->data as $entry) {
			$sql .= 'INSERT INTO `' . strtolower($entry->getClassName()) . ' ` ';
			$columns = array();
			$fields = array();
			foreach (get_object_vars($entry) as $name => $value) {
				$columns[] = '`' . $name . '`';
				$fields[] = '`' . $value . '`';
			}
			$sql .= ' (' . implode(',', $columns) . ') VALUES (' . implode(',', $fields) . ');' . PHP_EOL;
		}
		
		return $sql;
	}
	
}