<?php

$copy_header = get_sub_field('copy_header');
$copy_subheader = get_sub_field('copy_subheader');
$copy_content = get_sub_field('copy_content');
$img = get_sub_field('img'); ?>

<hr class="section-divider">

<section class="img-content-section section">

    <div class="columns ">

        <div class="column img-col is-horizontal-center">
            <img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>">
        </div>
        
        <div class="column content-col">
            <h1 class="section-header"><?php echo $copy_header;?> </h1>
            <h2><?php echo $copy_subheader;?></h2>

            <p class="content"><?php echo $copy_content; ?></p>

        </div>
    </div>

</section>

