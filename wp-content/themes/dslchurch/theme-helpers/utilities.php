<?php
/**
 * This file will be where we put our utility functions
 * Basically any function that has a common yet generic use
 */

function get_main_version($version) {
	$version_pieces = explode('.', $version);

	return $version[0];
}

/**
 * Convert a hex color code to rgb
 * @return array
 * 	Returns an array with 3 elements [red,green,blue] values
 */
function hex2rgb($hex) {
	$hex = str_replace("#", "", $hex);
	
	if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);
	
	return $rgb;
}

/**
 * Convert a hex color code to rgba
 * @param  [string]  $hex
 *         3 or 6 digit hex code string to convert. Examples ('000', '000000', '#000', '#000000')
 * @param  [float] 	 $alpha
 *         A float digit ranging from 0-1
 * @return [array]
 *         Returns an array with 4 elements [red,green,blue,alpha] values
 */
function hex2rgba($hex, $alpha=1) {
	$rgb = hex2rgb($hex);
	$rgb[] = $alpha;
	return $rgb;
}

/**
 * Return a unique ID string. This is great for creating unique ID values for elements on a page to interact with
 * @return [string]
 */
function get_guid() {
	if (function_exists('com_create_guid') === true) {
		return trim(com_create_guid(), '{}');
	}

	return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}