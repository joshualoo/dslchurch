<section class="section prayer-wall-section">

<?php 
    $value_1 = get_sub_field('value_1');
    $img_1 = get_sub_field('img_1');
    $value_1_description = get_sub_field('value_1_description');

    $value_2 = get_sub_field('value_2');
    $img_2 = get_sub_field('img_2');
    $value_2_description = get_sub_field('value_2_description');

    $value_3 = get_sub_field('value_3');
    $img_3 = get_sub_field('img_3');
    $value_3_description = get_sub_field('value_3_description');

    $prayer_wall_copy = get_sub_field('prayer_wall_copy');
?>  

    <div class="columns is-vcentered">
        <div class="column is-6 interactive-logo-column">    
            <div class="interactive-logo__container has-text-centered">

                <div class="outer-blobs-container">
                    <img class="logo-img" src="<?php echo get_template_directory_uri();?>/img/logo.png" alt="dslchurch logo">

                    <div class="inner-blobs-container">
                        <div class="yellow-hitbox hitboxes" id="yellowHitbox"></div>
                        <div class="brown-hitbox hitboxes" id="brownHitbox"></div>
                        <div class="green-hitbox hitboxes" id="greenHitbox"></div>

                        <div class="yellow-blob blob" id="yellowBlob">
                            <svg
                                viewBox="0 0 600 600"
                                xmlns="http://www.w3.org/2000/svg"
                                >
                                <g transform="translate(300,300)">
                                    <path d="M178.9,-134.8C225.3,-84.4,252.1,-10.4,237.9,55.4C223.8,121.1,168.7,178.6,102.2,209.7C35.6,240.9,-42.5,245.7,-107.9,216.9C-173.4,188.2,-226.1,125.9,-234.7,61.3C-243.2,-3.3,-207.6,-70.2,-161.1,-120.7C-114.7,-171.1,-57.3,-205.1,4.4,-208.6C66.2,-212.1,132.4,-185.2,178.9,-134.8Z" fill="#debc6a" />
                                </g>
                            </svg>
                        </div>

                        <div class="brown-blob blob" id="brownBlob">
                            <svg
                                viewBox="0 0 600 600"
                                xmlns="http://www.w3.org/2000/svg"
                                >
                                <g transform="translate(300,300)">
                                    <path d="M178.9,-134.8C225.3,-84.4,252.1,-10.4,237.9,55.4C223.8,121.1,168.7,178.6,102.2,209.7C35.6,240.9,-42.5,245.7,-107.9,216.9C-173.4,188.2,-226.1,125.9,-234.7,61.3C-243.2,-3.3,-207.6,-70.2,-161.1,-120.7C-114.7,-171.1,-57.3,-205.1,4.4,-208.6C66.2,-212.1,132.4,-185.2,178.9,-134.8Z" fill="#b19872" />
                                </g>
                            </svg>
                        </div>

                        <div class="green-blob blob" id="greenBlob">
                            <svg
                                width="50"
                                height="50"
                                viewBox="0 0 600 600"
                                xmlns="http://www.w3.org/2000/svg"
                                >
                                <g transform="translate(300,300)">
                                    <path d="M178.9,-134.8C225.3,-84.4,252.1,-10.4,237.9,55.4C223.8,121.1,168.7,178.6,102.2,209.7C35.6,240.9,-42.5,245.7,-107.9,216.9C-173.4,188.2,-226.1,125.9,-234.7,61.3C-243.2,-3.3,-207.6,-70.2,-161.1,-120.7C-114.7,-171.1,-57.3,-205.1,4.4,-208.6C66.2,-212.1,132.4,-185.2,178.9,-134.8Z" fill="#7e9265" />
                                </g>
                            </svg>
                        </div>

                    </div>
                </div>

                <div class="hover-modal-container">
                    <div draggable="false" class="yellow-modal modals" id="yellowModal">
                        <div class="modal-img-container">
                            <img draggable="false" class="modal-img" src="<?php echo $img_1['url'];?>" alt="<?php echo $img_1['alt'];?>">
                        </div>
                        <div class="modal-copy-columns columns is-horizontal is-vcentered">
                            <div class="column">
                                <h2 class="value-title"><?php echo $value_1;?></h2>
                            </div>
                            <div class="column">
                                <p class="value-description"><?php echo $value_1_description;?></p>
                            </div>
                        </div>
                    </div>

                    <div draggable="false" class="brown-modal modals" id="brownModal">
                        <div class="modal-img-container">
                            <img draggable="false" class="modal-img" src="<?php echo $img_2['url'];?>" alt="<?php echo $img_2['alt'];?>">
                        </div>
                        <div class="modal-copy-columns columns is-horizontal is-vcentered">
                            <div class="column">
                                <h2 class="value-title"><?php echo $value_2;?></h2>
                            </div>
                            <div class="column">
                                <p class="value-description"><?php echo $value_2_description;?></p>
                            </div>
                        </div>
                    </div>

                    <div draggable="false" class="green-modal modals" id="greenModal">
                        <div class="modal-img-container">
                            <img draggable="false" class="modal-img" src="<?php echo $img_3['url'];?>" alt="<?php echo $img_3['alt'];?>">
                        </div>
                        <div class="modal-copy-columns columns is-horizontal is-vcentered">
                            <div class="column">
                                <h2 class="value-title"><?php echo $value_3;?></h2>
                            </div>
                            <div class="column">
                                <p class="value-description"><?php echo $value_3_description;?></p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="column prayer-form-column">
            <h1 class="section-header">Prayer Wall</h1>
            <h2 class="prayer-wall-copy"><?php echo $prayer_wall_copy;?></h2>

                <p class="para-alt">Submit your prayer requests here:</p>

                <div class="form-container">
                    <?php echo do_shortcode('[contact-form-7 id="56" title="Prayer Form"]');?>
                </div>
        </div>
    </div>

    <div class="columns request-testimonies-columns">
        <div class="column prayer-request-column">
            <p class="para-alt">Prayer Requests:</p>
        </div>

        <div class="column prayer-testimony-column">
            <p class="para-alt">Prayer Testimonies:</p>

        </div>
    </div>

</section>