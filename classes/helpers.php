<?php

if (!function_exists('url')) {
	function url($path)
	{
		$root_url = $GLOBALS['ROOTURL'] ?? '/V_TiemChung/';
		if ('/V_TiemChung/' === $path) {
			
			return $root_url;
		}
		return $root_url . $path;
	}
}

if (!function_exists('redirect')) {

	function redirect($location)
	{
		header('Location: ' . url($location));
		exit();
	}
}
