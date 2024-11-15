<?php

class Hash
{

	public static function make($string)
	{
		return password_hash($string, PASSWORD_DEFAULT);
	}

	public static function check($string, $hash)
	{
		return password_verify($string, $hash);
	}

	public static function unique($length = 32)
	{

		$keyspace = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$str = '';
		$max = mb_strlen($keyspace, '8bit') - 1;

		for ($i = 0; $i < $length; ++$i) {
			$str .= $keyspace[random_int(0, $max)];
		}

		return $str;
	}
	public static function number($length = 10)
	{

		$keyspace = '0123456789';
		$str = '';
		$max = mb_strlen($keyspace, '8bit') - 1;

		for ($i = 0; $i < $length; ++$i) {
			$str .= $keyspace[random_int(0, $max)];
		}

		return $str;
	}
}
