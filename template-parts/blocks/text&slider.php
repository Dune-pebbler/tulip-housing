<?php
$text_block = get_sub_field('text_block');
$image_block = get_sub_field('image_block');
$reverse_layout = get_sub_field('reverse_layout');
?>
<section class="text_with_image">
    <div class="container">
        <div class="row<?= $reverse_layout ? ' reverse' : '' ?>">
            <div class="col-lg-1"></div>
            <div class="col-lg-4">
                <div class="text_with_image__text-container slide-left-on-scroll">
                    <?= $text_block; ?>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6 p-0">
                <div class="text_with_image__image-container slide-right-on-scroll">
                    <img src="<?= $image_block['url']; ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>