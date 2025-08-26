<?php
$text_block = get_sub_field('text_block');
$image_block = get_sub_field('image_block');
$reverse_layout = get_sub_field('reverse_layout');
$before_color_picker = get_sub_field('before_color_picker');
?>

<?php if ($text_block || $image_block): ?>

    <section class="doelgroep_text_image <?= $before_color_picker ? $before_color_picker : ''; ?>">
        <div class="container">
            <div class="row justify-content-center<?= $reverse_layout ? ' reverse' : '' ?>">

                <?php if ($image_block && isset($image_block['url'])): ?>
                    <div class="col-12 col-lg-6 p-0">
                        <div class="text_with_image__image-container slide-right-on-scroll">
                            <img src="<?= esc_url($image_block['url']); ?>" alt="<?= esc_attr($image_block['alt']); ?>">
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