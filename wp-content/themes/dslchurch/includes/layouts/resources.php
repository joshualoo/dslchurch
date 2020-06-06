
<?php if ((get_sub_field('hide_section_divider') == 'no')):?>
    <hr class="section-divider">
<?php endif; ?>

<section class="section resources-section">

    <?php
        $resources_copy_header = get_sub_field('resources_copy_header');
        $resources_copy_description = get_sub_field('resources_copy_description'); ?>

    <h1 class="section-header">Resources</h1>
    <h2 class="resources-copy-header"><?php echo $resources_copy_header;?></h2>
    <p class="resources-copy-description"><?php echo $resources_copy_description;?></p>

    <div class="columns resource-columns">

        <?php $args = array (
            'post_type'=> array( 'resource' ), 
            'post_status'=> array( 'publish' ),
            'posts_per_page' => 3,
        );

        $resource = new WP_Query($args);
        if( $resource->have_posts() ):
            while( $resource->have_posts() ):
                 $resource->the_post(); 
                 $yt_video = get_field('yt_video'); ?>

            <div class="column is-4 single-resource">
                <?php if ($yt_video): ?>
                    <a href="<?php echo $yt_video;?>" data-lity>
                    <div class="single-resource-container">
                        <div class="video-overlay">
                            <span class="play"><img src="<?php echo get_template_directory_uri();?>/img/play-btn.png" alt="Play"></span>
                        </div>
                        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'medium' ); ?>
                            <img class="single-resource-img" src="<?php echo $url;?>" alt="<?php the_title();?>">
                    </div>
                    </a>
                <?php endif; ?>

                    <div class="tiles __info-blurb">
                        <span class="more-info">+</span>
                        <h1 class="resource-title"><?php echo the_title(); ?></h1>
                        <p class="resource-date"><?php  $post_date = get_the_date( 'l F j, Y' ); echo $post_date; ?></p></div>
                    </div>
            
        <?php
            endwhile;
        endif;
        wp_reset_query();?>
    
    </div>

    <a href="resources" class="body-btn">View All</a>

</section>