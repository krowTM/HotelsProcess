<?php
namespace HotelsProcess\Utils;

class Sorting
{
	public static function sort(&$data, $sort_by)
	{
		for ($i = 0; $i <= count($data) - 2; $i++) {
			for ($j = $i + 1; $j <= count($data) - 1; $j++) {
				if (strcmp($data[$i]->$sort_by, $data[$j]->$sort_by) > 0) {
					$tmp = $data[$i];
					$data[$i] = $data[$j];
					$data[$j] = $tmp;
				}
			}
		}
	}
}