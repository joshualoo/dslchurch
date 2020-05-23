<?php

function register_testmonial_post_type() {

	$labels = array(
		'name'                => __( 'Testimonials', 'text-domain' ),
		'singular_name'       => __( 'Testimonial', 'text-domain' ),
		'add_new'             => _x( 'Add New Testimonial', 'text-domain', 'text-domain' ),
		'add_new_item'        => __( 'Add New Testimonial', 'text-domain' ),
		'edit_item'           => __( 'Edit Testimonial', 'text-domain' ),
		'new_item'            => __( 'New Testimonial', 'text-domain' ),
		'view_item'           => __( 'View Testimonial', 'text-domain' ),
		'search_items'        => __( 'Search Testimonials', 'text-domain' ),
		'not_found'           => __( 'No Testimonials found', 'text-domain' ),
		'not_found_in_trash'  => __( 'No Testimonials found in Trash', 'text-domain' ),
		'parent_item_colon'   => __( 'Parent Testimonial:', 'text-domain' ),
		'menu_name'           => __( 'Testimonials', 'text-domain' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'Testimonials and case studies',
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'editor', 'author', 'thumbnail'
			)
	);

	register_post_type( 'testimonial', $args );
}

add_action( 'init', 'register_testmonial_post_type' );


function register_testimonial_categories() {

	$labels = array(
		'name'					=> _x( 'Categories', 'Taxonomy plural name', 'text-domain' ),
		'singular_name'			=> _x( 'Category', 'Taxonomy singular name', 'text-domain' ),
		'search_items'			=> __( 'Search Categories', 'text-domain' ),
		'popular_items'			=> __( 'Popular Categories', 'text-domain' ),
		'all_items'				=> __( 'All Categories', 'text-domain' ),
		'parent_item'			=> __( 'Parent Category', 'text-domain' ),
		'parent_item_colon'		=> __( 'Parent Category', 'text-domain' ),
		'edit_item'				=> __( 'Edit Category', 'text-domain' ),
		'update_item'			=> __( 'Update Category', 'text-domain' ),
		'add_new_item'			=> __( 'Add New Category', 'text-domain' ),
		'new_item_name'			=> __( 'New Category Name', 'text-domain' ),
		'add_or_remove_items'	=> __( 'Add or remove Categories', 'text-domain' ),
		'choose_from_most_used'	=> __( 'Choose from most used text-domain', 'text-domain' ),
		'menu_name'				=> __( 'Category', 'text-domain' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => false,
		'hierarchical'      => true,
		'show_tagcloud'     => false,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'query_var'         => true,
	);

	register_taxonomy( 'testimonial_categories', array( 'testomonial' ), $args );
}

add_action( 'init', 'register_testimonial_categories' );

function get_testimonials($limit=10, $args=array()) {

	$default_args = array(
		'posts_per_page' => $limit,
		'post_type' => 'testimonial',
		);

	$args = wp_parse_args( $args, $default_args );

	$testimonials = new WP_QUERY($args);

	return $testimonials;
}
?>