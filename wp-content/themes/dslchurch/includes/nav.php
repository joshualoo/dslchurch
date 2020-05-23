<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="main-navigation" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Brand</a>
		</div>
		<div class="collapse navbar-collapse" id="main-navigation">
			<?php wp_nav_menu( array(
				'theme_location'    => 'main_nav',
				'menu'              => 'main-nav',
				'depth'             => 2,
				'container'         => '',
				'menu_class'        => 'menu-nav',
				'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				'walker'            => new wp_bootstrap_navwalker())
			);?>
		</div>
	</div>
</nav>