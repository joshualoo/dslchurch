<?php get_header(); ?>

<div class="container">
	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : ?>
			<?php the_post(); ?>
			
			<h1><?php the_title(); ?></h1>
			<div class="content">
				<?php the_excerpt(); ?>
			</div>

		<?php endwhile; ?>
	<?php endif; ?>
</div>
<div class="pagination">
	<?php include(get_stylesheet_directory() . '/includes/pagination.php'); ?>
</div>
hello
<?php get_footer(); ?>