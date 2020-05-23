<?php
require_once('theme-helpers/debugging.php');
require_once('theme-helpers/posts.php');
require_once('theme-helpers/svg.php');
require_once('theme-helpers/utilities.php');
require_once('theme-helpers/editor.php');
require_once('theme-helpers/components.php');

require_once('libraries/class-wp-bootstrap-navwalker.php');

//custom post types
require_once('theme-plugins/events/events.php');
require_once('theme-plugins/resource/resource.php');


require_once('theme-settings/general.php');
require_once('theme-settings/security.php');
// require_once('theme-settings/mail.php'); // uncomment this to setup an authenticated SMTP mail
require_once('theme-settings/scripts-styles.php');

//enable classic editor for wordpress//
add_filter('use_block_editor_for_post','__return_false');