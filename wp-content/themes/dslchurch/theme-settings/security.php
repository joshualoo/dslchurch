<?php

// turn on xmlrpc by uncommenting the line below
// recommended to leave it off though cause its stupid
add_filter( 'xmlrpc_enabled', '__return_false' );

// force the api to be used only by logged in users
// WARNING:
// Becareful with this filter as it could affect other plugins that rely on the Rest API to function properly. Plugins included are:
// - Contact Form 7
// - Gravity Forms
// Uncomment the line below if you are sure no plugin will utilize the rest api
// add_filter( 'rest_authentication_errors', 'only_allow_logged_in_user_rest_api_access' );

function only_allow_logged_in_user_rest_api_access( $access ) {

	if( ! is_user_logged_in() ) {
		return new WP_Error( 'rest_cannot_access', __( 'Only authenticated users can access the REST API.', 'disable-json-api' ), array( 'status' => rest_authorization_required_code() ) );
	}

	return $access;
	
}