<hr class="section-divider">

<section class="section event-section">

    <div class="columns is-vcentered">
            
        <?php 
            $post_ID = get_sub_field('selected_event');
            $events = array ('post_type'=> array( 'event' ), 'post_status'=> array( 'publish' ), 'p' => $post_ID );

                $var = new WP_Query($events);
                if( $var->have_posts() ):
                    while( $var->have_posts() ):
                        $var->the_post(); 
                        $enable_cta = get_field('enable_cta'); ?>

                <div class="column is-one-thirds">

                    <div class="tile is-vertical">
                    <h1 class="section-header">Updates/Billboard</h1>

                        <div class="tile">
                            <h2><?php echo the_title()?></h2>
                        </div>
                        <div class="tile is-vertical event-column__content-tile">
                            <p> <?php echo the_content();?> </p>
                        </div>
                        <div class="tile">
                            <?php if ($enable_cta == 'yes'):
                                $event_link = get_field('event_link');
                                $event_link_label = get_field('event_link_label'); ?>
    
                                <?php if ($event_link_label): ?>
                                    <a href="<?php echo $event_link;?> " class="body-btn"><?php echo $event_link_label;?></a>
                                <?php endif; ?>

                            <?php endif; ?>
                        </div>
                     </div>

                </div>

                <div class="column is-two-thirds event-column">

                    <?php
                        $add_video = get_field('add_video'); 
                        $video_id = get_field('video_id'); ?>

                        <?php if ($add_video == 'yes'): ?>
                            <a href="<?php echo $video_id;?>" data-lity>
                            <div class="video-overlay event-overlay">
                                <span class="play"><img src="<?php echo get_template_directory_uri();?>/img/play-btn.png" alt="Play"></span>
                            </div>
                        <?php endif;?>
                                <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'medium' ); ?>
                                    <img class="single-resource-img" src="<?php echo $url;?>" alt="<?php the_title();?>">
                                </div>
                        <?php if ($video_id): ?>
                            </a>
                        <?php endif;?>
                        
                </div>

                <?php
                    endwhile;
                endif;
                wp_reset_query();?> 
      
    </div>

</section>