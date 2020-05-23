<hr class="section-divider">

<section class="section">

    <h1 class="section-header">Services</h1>

    <div class="columns">
        <?php
            if( have_rows('service') ):
                while ( have_rows('service') ) : the_row();
                    $title = get_sub_field('title');
                    $details = get_sub_field('details');
                    $cta_button_label = get_sub_field('cta_button_label');
                    $cta_button_link = get_sub_field('cta_button_link'); ?>

                <div class="column">
                    <h2 class="location-title"><?php echo $title;?></h2>

                    <p><?php echo $details;?> </p>

                    <a href="<?php echo $cta_button_link;?>" class="body-btn"><?php echo $cta_button_label;?></a>

                </div>

        <?php
            endwhile;
        endif;
        ?>

    </div>

</section>
