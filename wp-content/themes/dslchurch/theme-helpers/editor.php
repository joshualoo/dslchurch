<?php
add_filter('mce_buttons_2', 'bams_mce_buttons');
add_filter( 'tiny_mce_before_init', 'bams_mce_editor_formats' );
add_filter('use_block_editor_for_post', '__return_false');
add_filter('use_block_editor_for_post_type', '__return_false', 10);

// Adds the Formats button in the MCE Editor
function bams_mce_buttons( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}

// Adds options inside the dropdown to the formats
function bams_mce_editor_formats( $init_array ) {  

	$style_formats = array(  
		// Turn all 'a' elements within the text selected in the editor to add the 'button' class
		// By selecting this format again on the link with the button class will just remove the class
		array(  
			'title' => 'Button',
			'selector' => 'a', // select all 'a' elements
			'classes' => 'button' // apply these classes
		)
	);
	
	$init_array['style_formats'] = json_encode( $style_formats );  

	return $init_array;  

} 
