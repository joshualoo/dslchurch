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

                                <a href="<?php echo $event_link;?> " class="body-btn"><?php echo $event_link_label;?></a>
                            <?php endif; ?>
                        </div>
                     </div>

                </div>

                <div class="column is-two-thirds">

                    <?php
                        $is_video_img = get_field('is_video_img'); 
                        
                        if($is_video_img == 'video'):
                            $video_link = get_field('video_link'); ?>

                        <div class="default-iframe-size embed-responsive">
                            <iframe class="embed-responsive-item" src="<?php echo $video_link; ?>" frameborder="0" allowfullscreen></iframe>
                        </div>
                        
                    <?php elseif($is_video_img == 'img'): 
                            $image =  wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
                            <div class="event-column__img-container">
                                <img class="event-column__featured-img" src="<?php echo $image; ?>" alt="Featured Event">
                            </div>
                    <?php endif; ?> 
                      
                </div>

                <?php
                    endwhile;
                endif;
                wp_reset_query();?> 
      
    </div>

</section>