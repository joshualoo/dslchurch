<?php

/**
 * Echos a reversed email string
 *
 */
add_filter( 'display_email', 'get_email_html', 10, 1 );

function echo_email($email) {
	echo get_email_encoded($email);
}

function get_email_encoded($email) {
	return base64_encode(strrev($email));
}

/**
 * This function requires some javascript intervention. 
 * To protect the users email you have to scramble the output
 * and then use javascript to unscramble it. The href's by
 * default are empty to prevent bots from noticing anything
 * suspicious about them
 * @param  [string] $email
 * @param  array  $classes
 *         Need to add additional classes to the list? Pass each class
 *         to the array
 * @return [string]
 *         returns an html string that is to be used by the
 *         email functions in the Javascripts security module
 */
function get_email_html($email, $classes=array()) {
	$email = get_email_encoded($email);
	$classes[] = 'js-decode-email';

	return '<a class="'. implode(' ', $classes) .'" href="" data-email="' . $email . '">' . $email . '</a>';
}