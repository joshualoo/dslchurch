<?php

// To disable automatic tampering of the Wordpress video OEmbedding of video urls, just comment out the below filter
add_filter( 'embed_oembed_html','responsive_wrap_oembed_filter',10,4);


/**
 * return HTML iframe specifc to the embed url
 * Uses acf fields if no url is selected (must be named 'video_url')
 * @param  [mixed] $post
 *         The post ID or object to 
 * @param  [string] $video_url
 *         url for the video string
 * @param  [string] $video_ratio
 *         defaults to '16by9' but can be '4by3' also
 * @return [string]
 *         returns the HTML from the file [theme_dir]/includes/video-iframe.php
 */
function get_post_video_iframe($post=null, $video_url='', $video_ratio='16by9') {

	if( is_int($post) ) {
		$post = get_post($post);
	} else if($post === null) {
		global $post;
	}

	if( $video_url == '') {
		$video_url = get_field('video_url', $post->ID);
	}
	$video_type = get_video_hosted_company_from_url($video_url);

	switch($video_type) {
		case 'youtube':
			$video_id = get_youtube_video_id_from_url($video_url);
			$video_url = get_youtube_embed_url_from_id($video_id);
			break;
		case 'vimeo':
			$video_id = get_vimeo_video_id_from_url($video_url);
			$video_url = get_vimeo_embed_url_from_id($video_id);
			break;
		default:
			return '<!-- VIDEO NOT LOADED -->';
			break;
	}

	// $video_ratio = '16by9';

	ob_start();
	include(get_template_directory() . '/includes/video-iframe.php');
	$html = ob_get_contents();
	ob_end_clean();

	return $html;
}

function get_video_hosted_company_from_url($url) {
	$parsed = parse_url($url);

	switch($parsed['host']) {
		case 'www.youtube.com':
		case 'youtube.com':
		case 'youtu.be':
			return 'youtube';
		case 'vimeo.com':
		case 'www.vimeo.com':
		case 'player.vimeo.com':
			return 'vimeo';
	}

	return '';
}

function get_youtube_video_id_from_url($url) {
	preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);

	return $matches[1];

}

function get_youtube_embed_url_from_id($id) {
	return sprintf("//www.youtube.com/embed/%s",$id);
}

function get_vimeo_video_id_from_url($url) {

	preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $url, $matches);
	
	return $matches[5];
}

function get_vimeo_embed_url_from_id($id) {
	return sprintf('//player.vimeo.com/video/%s', $id);
}

function responsive_wrap_oembed_filter( $html, $url, $attr, $post_id ) {

	$company = get_video_hosted_company_from_url($url);

	if( $company ) {
		return get_post_video_iframe(null, $url);
	}
	
	return $html;
}