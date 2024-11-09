<?php

class Input
{

	public static function validate($item)
	{
		if (isset($_POST[$item])) {
			return self::sanitize($_POST[$item]);
		} else if (isset($_GET[$item])) {
			return self::sanitize($_GET[$item]);
		} else if (isset($_FILES[$item])) {
			return $_FILES[$item];
		} else return '';
	}

	private static function sanitize($string)
	{
		return htmlentities($string, ENT_QUOTES, 'UTF-8');
	}
}
