<?php
$text_block = get_sub_field('text_block');
$text_block_button = get_sub_field('text_block_button');
$image_block = get_sub_field('image_block');
$reverse_layout = get_sub_field('reverse_layout');
$backgroundcolor = get_sub_field('background_color');
?>

<?php if ($text_block || $image_block): ?>
    <section class="text_with_image">
        <div class="container-fluid">
            <div class="row justify-content-center<?= $reverse_layout ? ' reverse' : '' ?>">

                <?php if ($text_block): ?>
                    <div class="col-lg-6 <?= $backgroundcolor; ?>">
                        <div class="text_with_image__text-container-container">
                            <div class="text_with_image__text-container slide-left-on-scroll">
                                <?= $text_block; ?>

                                <?php if ($text_block_button): ?>
                                    <div class="text_with_image__button-container">
                                        <a class="btn" href="<?= $text_block_button['url']; ?>">
                                            <?= $text_block_button['title']; ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($image_block): ?>
                    <div class="col-lg-6 p-0">
                        <div class="text_with_image__image-container slide-right-on-scroll">
                            <img src="<?= $image_block['url']; ?>" alt="">
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
<?php endif; ?>