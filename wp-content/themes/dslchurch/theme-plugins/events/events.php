<?php

function register_event_post_type() {

	$labels = array(
		'name'                => __( 'Events', 'text-domain' ),
		'singular_name'       => __( 'Event', 'text-domain' ),
		'add_new'             => _x( 'Add New Event', 'text-domain', 'text-domain' ),
		'add_new_item'        => __( 'Add New Event', 'text-domain' ),
		'edit_item'           => __( 'Edit Event', 'text-domain' ),
		'new_item'            => __( 'New Event', 'text-domain' ),
		'view_item'           => __( 'View Event', 'text-domain' ),
		'search_items'        => __( 'Search Events', 'text-domain' ),
		'not_found'           => __( 'No Events found', 'text-domain' ),
		'not_found_in_trash'  => __( 'No Events found in Trash', 'text-domain' ),
		'parent_item_colon'   => __( 'Parent Event:', 'text-domain' ),
		'menu_name'           => __( 'Events', 'text-domain' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'Events',
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 3,
		'menu_icon'           => 'dashicons-calendar-alt',
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

	register_post_type( 'event', $args );
}

add_action( 'init', 'register_event_post_type' );


function register_events_categories() {

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

	register_taxonomy( 'events_categories', array( 'event' ), $args );
}

add_action( 'init', 'register_events_categories' );

function get_events($limit=10, $args=array()) {

	$default_args = array(
		'posts_per_page' => $limit,
		'post_type' => 'events',
		);

	$args = wp_parse_args( $args, $default_args );

	$events = new WP_QUERY($args);

	return $events;
}
?>