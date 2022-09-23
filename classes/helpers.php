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
	// Chuyển hướng đến một trang khác
	function redirect($location)
	{
		header('Location: ' . url($location));
		exit();
	}
}
