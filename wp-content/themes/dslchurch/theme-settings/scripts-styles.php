<?php

//add_action( 'init', 'disable_wp_emojicons' ); // comment this line out if you want to enable the emoticon script
add_action( 'wp_enqueue_scripts', 'load_the_theme_styles' );
add_action( 'wp_enqueue_scripts', 'load_the_theme_scripts' );

// add_filter( 'script_loader_tag', 'filter_ie_scripts', 10, 3 );

// enqueue the styles and scripts
    
function load_the_theme_styles() {
	global $wp_styles;

	$css_dir = get_template_directory_uri() . '/css/';
	$css_ext = '.min.css';

	if(defined("WP_DEBUG") && WP_DEBUG) {
		// dev styles
		$css_ext = '.css';
	}

	$main_src = $css_dir . 'main' . $css_ext;

	wp_enqueue_style( 'main-styles', $main_src, false, '1.0' );

}

function reset_jquery() {
	wp_deregister_script('jquery');
	
	$version = '1.11.1';
	$src = '//ajax.googleapis.com/ajax/libs/jquery/' . $version . '/jquery.min.js';

	wp_enqueue_script('jquery', $src, false, $version, true);
}

add_action( 'wp_enqueue_scripts', 'reset_jquery' );
    
    
function load_the_theme_scripts() {
	global $wp_scripts;

	reset_jquery(); // use most recent version

	$js_path = get_template_directory_uri() . '/js/';
	$js_extension = '.js';

	if(defined("WP_DEBUG") && !WP_DEBUG) {
		$js_extension = '.min.js';
	}

	wp_register_script( 'app-polyfills', 'https://cdn.polyfill.io/v2/polyfill' . $js_extension . '?features=es6,fetch' ); // if you don't use fetch then just remove it from the end of the url
	
	// wp_register_script( 'app-polyfills', '//cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim' . $js_extension );

	wp_enqueue_script( 'bulma-collapsible', $js_path . 'bulma-collapsible' . $js_extension, array('jquery'), '1.0', true );


	wp_enqueue_script( 'main-script', $js_path . 'script' . $js_extension, array('jquery'), '1.0', true );

}

function filter_ie_scripts($html, $handle, $src) {

	switch($handle) {
		case 'app-polyfills':
			$html = '<!--[if lte IE 11]>' . $html . '<![endif]-->';
	}

	return $html;
}

function disable_wp_emojicons() {

	// all actions related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	// filter to remove TinyMCE emojis
	add_filter( 'emoji_svg_url', '__return_false' );

}
