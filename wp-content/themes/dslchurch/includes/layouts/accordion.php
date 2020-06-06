
<?php if ((get_sub_field('hide_section_divider') == 'no')):?>
    <hr class="section-divider">
<?php endif; ?>

<section class="section accordion-section">
<?php
    $accordion_copy_header = get_sub_field('accordion_copy_header');
    $feature_image = get_sub_field('feature_image'); ?>

    <h1 class="section-header"><?php echo $accordion_copy_header;?></h1>

    <div class="columns accordion-columns">
        <div class="accordion-column is-5 column">
            <div class="tile accordion">
                <div class="accordion-container">
                    <ul class="accordion__items">
                        <?php
                            if( have_rows('accordion') ): $i = 0;
                                while ( have_rows('accordion') ) : the_row();  $i++;
                                    $accordion_header = get_sub_field('accordion_header');
                                    $accordion_content = get_sub_field('accordion_content');?>
                                   
                                    <li class="accordion__item <?php if($i==1):?> active <?php endif;?>">
                                    <div class="accordion__title" <?php if($i==1):?> style="border-top:0;"<?php endif;?>>
                                        <h2><?php echo $accordion_header;?></h2>
                                        <span class="accordion__icon"></span>
                                    </div>
                                    <div class="accordion__content">
                                        <p><?php echo $accordion_content;?></p>
                                    </div>
                                </li>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </ul>
                </div>
            </div>
            
            <div class="tile cta-btns">
                <div class="cta-btn-container">
                    <?php
                        if( have_rows('accordion_cta') ): 
                            while ( have_rows('accordion_cta') ) : the_row();
                                $button_text = get_sub_field('button_text'); 
                                $button_link = get_sub_field('button_link'); ?>

                                <a target="_blank" rel="noopener" href="<?php echo $button_link;?>" class="body-btn accordion-cta-btn"><?php echo $button_text;?> </a>
                   <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
            
        </div>

        <div class="featured-img-container column">  
            <img src="<?php echo $feature_image['url'];?> " alt="<?php echo $feature_image['alt'];?>">
        </div>
    </div>
</section>

<script>

let accordion = document.querySelector(".accordion");
let items = accordion.querySelectorAll(".accordion__item");
let title = accordion.querySelectorAll(".accordion__title");
let firstAccordion = items.firstChild;

function toggleAccordion() {
  let thisItem = this.parentNode;

  items.forEach((item) => {
    if (thisItem == item) {
      // if this item is equal to the clicked item, open it.
      thisItem.classList.toggle("active");
      return;
    }
    // otherwise, remove the open class
    item.classList.remove("active");
  });
}

title.forEach((question) =>
  question.addEventListener("click", toggleAccordion)
);

</script>