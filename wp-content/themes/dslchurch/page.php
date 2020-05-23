<?php get_header(); ?>

<?php if(have_posts()) : ?>
	<?php while(have_posts()) : ?>
		<?php the_post(); ?>
		
			<?php include(get_template_directory() . '/includes/section-layouts.php'); ?>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>