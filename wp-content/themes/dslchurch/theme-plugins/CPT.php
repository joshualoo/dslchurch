<?php
class CPT {
	public $name, $self, $args;
	protected $supports = ['custom-fields', 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes'] ;
	public function __construct() {
		$this->name = get_class($this); 
		add_action('init', [$this, 'init']);
	}
	public function init () {
		$labels = [
			'name' => __("{$this->name}s"),
			'singular_name' => __($this->name),
			'menu_name' => __("{$this->name}s"),
			'all_items' => __("All {$this->name}s"),
			'view_item' => __("View $this->name"),
			'add_new_item' => __("Add New $this->name"),
			'add_new' => __("Add $this->name"),
			'edit_item' => __("Edit $this->name"),
			'update_item' => __("Update $this->name"),
			'search_items' => __("Search $this->name"),
			'not_found' => __("$this->name Not Found"),
			'not_found_in_trash' => __("$this->name Not Found In Trash"),
		];
		$this->args = [
			'label' => __("{$this->name}s"),
			'labels' => $labels,
			'supports' => $this->supports,
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'menu_position' => 7,
			'can_export' => true,
			'has_archive' => false,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'capability_type' => 'page',
		];
	}
	public function registerCPT() {
		$this->self = register_post_type(str_replace(" ", "_",  strtolower($this->name)), $this->args);
	}
}
