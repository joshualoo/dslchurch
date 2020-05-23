<?php 

// global $acf;

// if( isset($acf) && (int)get_main_version($acf->settings['version']) > 4 ) { // test if we have a valid acf version

if( function_exists('have_rows') ) {

	if( have_rows('section_layouts') ) {
		while( have_rows('section_layouts') ) {
			the_row();

			$component = get_row_layout();
			
			switch($component) {
				case 'layout_one_column':
					include(get_template_directory() . '/includes/layouts/one-column.php');
					break;
				case 'layout_two_column':
					include(get_template_directory() . '/includes/layouts/two-column.php');
					break;
				case 'layout_three_column':
					include(get_template_directory() . '/includes/layouts/three-column.php');
					break;
				case 'prayer_wall':
					include(get_template_directory() . '/includes/layouts/prayer-wall.php');
					break;
				case 'services':
					include(get_template_directory() . '/includes/layouts/services.php');
					break;
				case 'events':
					include(get_template_directory() . '/includes/layouts/events.php');
					break;
				case 'resources':
					include(get_template_directory() . '/includes/layouts/resources.php');
					break;
				case 'accordion':
					include(get_template_directory() . '/includes/layouts/accordion.php');
					break;
				case 'timeline':
					include(get_template_directory() . '/includes/layouts/timeline.php');
					break;
				case 'img_content':
					include(get_template_directory() . '/includes/layouts/img_content.php');
					break;
				case 'statement_of_beliefs':
					include(get_template_directory() . '/includes/layouts/statement-of-beliefs.php');
					break;
			}
		}
	}
	
}
