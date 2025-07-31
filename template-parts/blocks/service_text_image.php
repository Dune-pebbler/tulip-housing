<?php
$text_block = get_sub_field('text_block');
$image_block = get_sub_field('image_block');
$reverse_layout = get_sub_field('reverse_layout');
$background_color_picker = get_sub_field('background_color_picker');
?>
<?php if ($text_block || $image_block): ?>
    <section class="service_text_image <?= $background_color_picker; ?>">
        <div class="container ">
            <div class="row justify-content-center<?= $reverse_layout ? ' reverse' : '' ?>">
                <?php if ($image_block && isset($image_block['url'])): ?>
                    <div class="col-12 col-lg-6 p-0">
                        <div class="text_with_image__image-container slide-right-on-scroll">
                            <img src="<?= $image_block['url']; ?>" alt="">
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($text_block): ?>
                    <div class="col-12 col-lg-6">
                        <div class="text_with_image__text-container-container">
                            <div class="text_with_image__text-container slide-left-on-scroll">
                                <?= $text_block; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>