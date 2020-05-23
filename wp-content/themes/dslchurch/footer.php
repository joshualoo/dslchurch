<hr class="section-divider">

	<footer class="section">
		<div class="columns footer-columns is-desktop">

			<div class="column is-one-thirds">
				<h1 class="section-header">Stay in Touch</h1>
				<h2 class="footer-subheader">Connect anywhere</h2>
			</div>

			<div class="column social-column is-two-thirds-desktop">
				<div class="tile is-horizontal social-tiles">

					<?php
						if( have_rows('social_links' ,'options') ):
							while ( have_rows('social_links' ,'options') ) : the_row();
								$link_text = get_sub_field('link_text');
								$link_to = get_sub_field('link_to');?>

								<div class="tile">
									<a target="_blank" rel="noopener" href="<?php echo $link_to;?>" class="social-links"><?php echo $link_text; ?></a>
								</div>
					<?php
						endwhile;
					endif;
					?>
					
				</div>  
			</div>
		</div>

		<hr class="section-divider copyright-line">

		<div class="copyright-container">
			<p>&copy; Desert Streams Life Church <?php echo date("Y");?> </p>
		</div>   
  
	</footer> 

	<?php wp_footer(); ?>  
 
	<script src="//localhost:35729/livereload.js"></script>
</body>
</html>       