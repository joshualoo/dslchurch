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


    <div class="columns box-shadow timeline-content-columns is-vcentered">

        <?php
            if( have_rows('timeline_items') ):
                while ( have_rows('timeline_items') ) : the_row();
                    $timeframe = get_sub_field('timeframe');
                    $item_copy = get_sub_field('item_copy');
                    $feature_image = get_sub_field('feature_image');?>

                    <div class="column timeline-copy">
                        <div class="tile is-parent is-vertical">
                        <div class="tile is-child">
                            <h1 class="has-text-weight-medium is-italic"><?php echo $timeframe; ?></h1>
                        </div>

                        <div class="tile is-child">
                            <p><?php echo $item_copy; ?></p>
                        </div>
                        </div>
                    </div>

                    <div class="column timeline-img">
                        <img src="<?php echo $feature_image['url'];?>" alt="<?php echo $feature_image['alt'];?>">
                    </div>
        <?php
            endwhile;
        endif;
        ?>
      
    </div>


    <div class="columns">
        <div class="column timeline-column">
            <div class="tile is-horizontal">
            
                <?php
                    if( have_rows('timeline_items') ):
                        while ( have_rows('timeline_items') ) : the_row();
                            $timeframe = get_sub_field('timeframe');
                            $year = intval(preg_replace('/[^0-9]+/', '', $timeframe), 10); ?>

                            <div class="tile timeframe-centered">
                                <span class="timeframe"><?php echo $year; ?></span>
                            </div>

                <?php
                    endwhile;
                endif;
                ?>
            </div>

            <hr class="timeline">
        </div>
    </div>

</section>