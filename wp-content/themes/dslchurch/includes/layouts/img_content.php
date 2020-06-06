<?php

$copy_header = get_sub_field('copy_header');
$copy_subheader = get_sub_field('copy_subheader');
$copy_content = get_sub_field('copy_content');
$img = get_sub_field('img'); 

$layout = get_sub_field('layout');
$padding = get_sub_field('padding');
$vertically_align = get_sub_field('vertically_align'); ?>

<?php if ((get_sub_field('hide_section_divider') == 'off')):?>
    <hr class="section-divider">
<?php endif; ?>

<section class="img-content-section section <?php if ($padding == 'off'):?> padding-off <?php endif;?>" >

    <div class="columns <?php if ($vertically_align == 'yes'):?> is-vcentered <?php endif;?>  <?php if ($layout == 'img-left'): ?> reverse <?php endif;?>">

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

