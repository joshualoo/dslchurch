<?php 

$statement_copy = get_sub_field('statement_copy');?>

<section class="statement-beliefs-section section">

    <div class="columns">
        <div class="column is-6 autoscroll-container">

            <div class="autoscroll-statement" id="scroll" draggable="true">

                <h3 class="top-statement statement">Belief Statements:</h3>

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

            <div class="controls">
                <div class="scroll-btn">
                    <p id="play">autoscroll</p>
                    <p id="pause" class="active">pause</p>
                </div>  
            </div>
            <div><p id="back">reset</p></div>

        </div>

        <div class="column copy-column">
            <?php echo $statement_copy;?>
        </div>
    </div>

</section>

