<?php 

// test if there is an environment variable
// if not we will set it to a production setting

add_theme_support( 'post-thumbnails' );

register_nav_menu( 'main_nav', 'Main Navigation' );
register_nav_menu( 'toggle_nav', 'Toggled Navigation' );

register_nav_menu( 'footer_nav', 'Footer Navigation');

add_editor_style( 'css/editor-styles.css' );

// If you want the editor back then you should comment this out
add_action( 'admin_init', 'remove_editor_for_pages' );


// Hide Useless admin items

add_action( 'admin_init', 'my_remove_menu_pages' );
function my_remove_menu_pages() {
	remove_menu_page('edit.php'); // Posts
    remove_menu_page('edit-comments.php'); // Comments
    remove_menu_page('edit-comments.php'); // Comments
    remove_menu_page('admin.php?page=advanced_db_cleaner.php');
}

// 
// Action Hooks
//
 
function remove_editor_for_pages() {
	remove_post_type_support('page', 'editor');
}

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        // $option_page = acf_add_options_page(array(
        //     'page_title'    => __('Theme General Settings'),
        //     'menu_title'    => __('Theme Settings'),
        //     'menu_slug'     => 'theme-general-settings',
        //     'capability'    => 'edit_posts',
        //     'redirect'      => false
		// ));
		
		// Add sub page.
        $option_page = acf_add_options_page(array(
            'page_title'  => __('Social Settings'),
            'menu_title'  => __('Socials'),
            'parent_slug' => $parent['menu_slug'],
        ));
    }
}


//change contact form name to prayers
function rename_contact_form_menu() {
    global $menu;
    
    foreach($menu as $key => $item) {
      if ( $item[0] === 'Contact Forms' ) {
          $menu[$key][0] = __('Prayer Requests','textdomain');     //change name
          $menu[$key][3] = __('Adressbuch','textdomain');   //does not work but should (needs another hook?)  
          //$menu[$key][6] = __('dashicons-id','textdomain'); change icon
      }
    }
   return false;
}

