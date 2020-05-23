<hr class="section-divider">

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
                 $resource_video_link = get_sub_field('resource_video_link'); ?>

            <div class="column">

                    <h1 class="resource-title"><?php echo the_title(); ?></h1>
                    <p class="resource-date"><?php  $post_date = get_the_date( 'l F j, Y' ); echo $post_date; ?></p>
                    
            </div>
            
        <?php
            endwhile;
        endif;
        wp_reset_query();?>

    </div>
</section>