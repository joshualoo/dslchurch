
<?php if ((get_sub_field('hide_section_divider') == 'no')):?>
    <hr class="section-divider">
<?php endif; ?>

<?php
$timeline_copy_header = get_sub_field('timeline_copy_header');
$timeline_copy_subheader = get_sub_field('timeline_copy_subheader');
$timeline_copy_content = get_sub_field('timeline_copy_content');
?>

<section class="timeline-section section">

    <div class="columns">
        <div class="column is-6">
            <h1 class="section-header"> <?php echo $timeline_copy_header;?></h1>
            <h2 class="timeline-subheader"> <?php echo $timeline_copy_subheader;?></h2>
            <p><?php echo $timeline_copy_content;?> </p>
        </div>
    </div>

    <div class="box-shadow timeline-content-columns" draggable="false">

        <?php
            if( have_rows('timeline_items') ): $i=0; ?> 
            <div class="timeline-container columns is-mobile is-vcentered">
              <?php while ( have_rows('timeline_items') ) : the_row(); $i++;
                    $timeframe = get_sub_field('timeframe');
                    $item_copy = get_sub_field('item_copy');
                    $feature_image = get_sub_field('feature_image');?>

                    <div class="timeline-single-item" id="slide-<?php echo $i; ?>">
                        <div class=" timeline-copy">
                            <div class="tile is-parent is-vertical">
                                <div class="tile is-child timeframe-year">
                                    <h1 class="has-text-weight-medium is-italic"><?php echo $timeframe; ?></h1>
                                </div>

                                <div class="tile is-child">
                                    <p><?php echo $item_copy; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class=" timeline-img">
                            <img src="<?php echo $feature_image['url'];?>" alt="<?php echo $feature_image['alt'];?>">
                        </div>
                    </div>
        <?php
            endwhile; ?>
        </div>
        <?php endif;
        ?>
        
    </div>

        <div class="is-hidden-desktop is-hidden-tablet has-text-right swipe">
            <p class="is-size-6">swipe &#8594;</p>
        </div>
 

    <div class="columns is-mobile is-hidden-mobile">
        <div class="column timeline-column">
            <div class="tile is-mobile is-horizontal">
            
                <?php
                    if( have_rows('timeline_items') ): $i=0;
                        while ( have_rows('timeline_items') ) : the_row(); $i++;
                            $timeframe = get_sub_field('timeframe');
                            $year = intval(preg_replace('/[^0-9]+/', '', $timeframe), 10); ?>

                        <a class="tile is-mobile timeframe-centered" href="#slide-<?php echo $i; ?>">
                            <div class="">
                               <span class="timeframe"><?php echo $year; ?></span>
                            </div>
                        </a>
                <?php
                    endwhile;
                endif;
                ?>
            </div>

            <hr class="timeline">
        </div>
    </div>

</section>

<script>
    document.querySelectorAll('a.timeframe-centered[href^="#"]').forEach((anchor) => {
		anchor.addEventListener("click", function (e) {
			e.preventDefault();

			document.querySelector(this.getAttribute("href")).scrollIntoView({
                behavior: "smooth",
                block:"center",
                inline: "start",
			});
		});
	});
</script>