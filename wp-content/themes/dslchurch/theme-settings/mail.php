<?php

/**
 * Add settings in the wp-config.php file in order to add the credentials for the SMTP email. You can copy and paste the below comments as a reference.
 *
 * define('BAMS_EMAIL_HOST', 'mail.yourhost.com'); // Required
 * define('BAMS_EMAIL_USER', 'name@yourhost.com'); // Required
 * define('BAMS_EMAIL_PASS', 'your-password-goes-here'); // Required: for gmail this could be an App Secret Key if you have two-way authentication enabled 
 * define('BAMS_EMAIL_PORT', 587); // optional: default is 587 based on the default security encryption but could be 25 if no security layer is present
 * define('BAMS_EMAIL_ENCRYPTION', 'tls'); // optional: tls is default but could be ssl or start/tls 
 */
add_action( 'phpmailer_init', 'bams_smtp_mail' );

// php mailer is passed by reference so we don't have to return anything with this filter
function bams_smtp_mail( PHPMailer $phpmailer ) {

	$host = bams_mail_get_host();
	$user = bams_mail_get_user();
	$pass = bams_mail_get_password();

	if( $host === null || $user === null || $pass === null ) {
		// no authentication credentials defined do not use SMTP
		trigger_error("Mail will use the default settings for sending");
		return;
	}

    $phpmailer->Host = $host;
    $phpmailer->Port = bams_mail_get_port();
    $phpmailer->Username = $user;
    $phpmailer->Password = $pass;
    $phpmailer->SMTPAuth = true; // if required
    $phpmailer->SMTPSecure = bams_mail_get_encryption();

    if(defined('WP_DEBUG') && WP_DEBUG) {
    	$phpmailer->SMTPDebug = 1;
    }

    $phpmailer->IsSMTP();
}

function bams_mail_get_host() {
	if(!defined('BAMS_EMAIL_HOST') ) {
		trigger_error("Using SMTP email but HOST was not defined. Define a host in the wp-config file");
		return null;
	}

	return BAMS_EMAIL_HOST;
}

function bams_mail_get_port() {
	if(!defined('BAMS_EMAIL_PORT') ) {
		switch(bams_mail_get_encryption()) {
			case 'tls':
			case 'ssl':
			case 'starttls': // not sure what the possible values are but just in case someone types this
				return 587;
			default:
				return 25;
		}
	}

	return BAMS_EMAIL_PORT;
}

function bams_mail_get_encryption() {
	if( !defined('BAMS_EMAIL_ENCRYPTION') ) {
		return 'tls';
	}

	return BAMS_EMAIL_ENCRYPTION;
}

function bams_mail_get_user() {
	if( !defined('BAMS_EMAIL_USER') ) {
		trigger_error("Using SMTP email but USER was not defined. Define a user in the wp-config");
		return null;
	}

	return BAMS_EMAIL_USER;	
}

function bams_mail_get_password() {
	if( !defined('BAMS_EMAIL_PASS') ) {
		trigger_error("Using SMTP email but PASS was not defined. Define a password in the wp-config");
		return null;
	}

	return BAMS_EMAIL_PASS;	
}

