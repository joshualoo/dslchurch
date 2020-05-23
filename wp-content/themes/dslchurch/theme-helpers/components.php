<?php

function display_components($prefix='') {
	$field = $prefix . 'components';

	if( function_exists('have_rows') ) {

		if( have_rows($field) ) {

			while( have_rows($field) ) {
				the_row();

				$component = get_row_layout();

				switch($component) {
					case 'content_component':
						include(get_template_directory() . '/includes/components/content.php');
						break;
				}
			}
		}
		
	}
}