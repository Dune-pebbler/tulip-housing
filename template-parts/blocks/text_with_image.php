<?php
$text_block = get_sub_field('text_block');
$text_block_button = get_sub_field('text_block_button');
$image_block = get_sub_field('image_block');
$reverse_layout = get_sub_field('reverse_layout');
?>
<section class="text_with_image">
    <div class="container-fluid">
        <div class="row justify-content-center<?= $reverse_layout ? ' reverse' : '' ?>">

            <div class="col-md-6 col-lg-6">
                <div class="text_with_image__text-container slide-left-on-scroll">
                    <?= $text_block; ?>

                    <div class="text_with_image__button-container">
                        <a class="btn" href="<?= $text_block_button['url']; ?>"><?= $text_block_button['title']; ?> </a>
                    </div>
                </div>

            </div>


            <div class="col-md-6 col-lg-6 p-0">
                <div class="text_with_image__image-container slide-right-on-scroll">
                    <img src="<?= $image_block['url']; ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>