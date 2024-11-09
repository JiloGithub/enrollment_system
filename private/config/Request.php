<?php
class Request
{

	public static function method($type, $callback)
	{
		// If request is what we want, run callback
		if (isset($_POST[$type])) {
			$callback();
		}
	}
}
