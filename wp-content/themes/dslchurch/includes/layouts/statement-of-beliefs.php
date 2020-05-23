<?php 

$statement_copy = get_sub_field('statement_copy');?>

<section class="statement-beliefs-section section">

    <div class="columns">

        <div class="column is-6 autoscroll-container">

            <div class="autoscroll-statement" id="scroll">

                <h3 class="statement">Belief Statements:</h3>

                <?php
                    if( have_rows('statements') ):
                        while ( have_rows('statements') ) : the_row();
                            $statement = get_sub_field('statement');?>
                            <h3 class="statement"><?php echo $statement;?></h3>
                <?php
                    endwhile;
                endif;
                ?>
            </div>

        </div>

        <div class="column copy-column">
            <?php echo $statement_copy;?>
        </div>

    </div>


</section>

<hr class="section-divider">