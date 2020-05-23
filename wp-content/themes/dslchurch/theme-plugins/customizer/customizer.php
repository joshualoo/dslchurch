<?php
// Some examples of how to use the customizer
add_action('customize_register', 'bams_custom_logo');
add_action('customize_register', 'bams_custom_global_settings');

function bams_custom_global_settings($wp_customize) {
	$default_color_args = array(
		'default' => '#fff'
	);

	$wp_customize->add_panel('globals', array(
		'title' => 'Global Settings',
		'priority' => 150,
		'description' => "Global settings to be used throughout your customization styles. This is a great place to define colors and other settings to be reused throughout your site to maintain consistency",
	));

	$wp_customize->add_section('brand_colors', array(
		'title' => 'Brand Colors',
		'panel' => 'globals',
		'priority' => 0,
	));

	$wp_customize->add_setting('global_setting_brand_primary', $default_color_args);
	$wp_customize->add_setting('global_setting_brand_secondary', $default_color_args);
	$wp_customize->add_setting('global_setting_brand_tertiary', $default_color_args);
	$wp_customize->add_setting('global_setting_brand_quaternary', $default_color_args);

	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'global_setting_brand_primary',
		array(
			'label' => 'Brand Primary Color',
			'section' => 'brand_colors',
			'settings' => 'global_setting_brand_primary',
		)
	));

	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'global_setting_brand_secondary',
		array(
			'label' => 'Brand Secondary Color',
			'section' => 'brand_colors',
			'settings' => 'global_setting_brand_secondary',
		)
	));

	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'global_setting_brand_tertiary',
		array(
			'label' => 'Brand Tertiary Color (optional)',
			'section' => 'brand_colors',
			'settings' => 'global_setting_brand_tertiary',
		)
	));

	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'global_setting_brand_quaternary',
		array(
			'label' => 'Brand Quaternary Color (optional)',
			'section' => 'brand_colors',
			'settings' => 'global_setting_brand_quaternary',
		)
	));

}
/**
* Create Logo Setting and Upload Control
*/
function bams_custom_logo($wp_customize) {
	// add a setting for the site logo
	$wp_customize->add_setting('custom_logo');
	// Add a control to upload the logo
	$wp_customize->add_control( new WP_Customize_Image_Control( 
		$wp_customize, 
		'custom_logo',
		array(
			'label' => 'Upload Site Logo',
			'section' => 'title_tagline',
			'settings' => 'custom_logo',
		)
	));
}