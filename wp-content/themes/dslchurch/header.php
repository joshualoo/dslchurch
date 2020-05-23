<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo get_the_title(); ?> | <?php echo bloginfo('name');?></title>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
 
	<nav class="navbar is-fixed-top" role="navigation" aria-label="navigation">
				
		<div class="logo">
			<a href="<?php echo get_home_url();?>" class="logo-type">dslchurch</a>
		</div>

		<div class="menu">
			<?php wp_nav_menu( array(
				'theme_location'  => 'main_nav',
				'depth'	          => 1, // 1 = no dropdowns, 2 = with dropdowns.
				'container'       => 'div',
				'container_class' => 'main-nav-items',
				'container_id'    => '',
				'menu_class'      => '',
				'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
				'walker'          => new WP_Bootstrap_Navwalker(),
				) ); ?>				
		</div>
 
		<div class="menu-toggle">
			<a id="toggle" class="menu-toggle__btn">&#43;</a>
		</div> 		
		
	</nav> 

		<div class="toggled-menu nav--inactive" id="toggled-menu">
			<nav class="navbar is-fixed-top" role="navigation" aria-label="dropdown navigation">
				<div class="logo">
					<a href="<?php echo get_home_url();?>" class="logo-type">dslchurch</a>
				</div>
				<div class="menu-toggle-close">
					<a id="toggle-close" class="">&#43;</a>
				</div> 	
			</nav>
		
			<?php wp_nav_menu( array(
				'theme_location'  => 'toggle_nav',
				'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
				'container'       => 'div',
				'container_class' => 'toggled-nav-items',
				'container_id'    => '',
				'menu_class'      => 'columns',
				'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
				'walker'          => new WP_Bootstrap_Navwalker(),
				) ); ?>		
					
		</div>