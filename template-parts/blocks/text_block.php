<?php
$text_field = get_sub_field('text_field');
$text_field_background_color = get_sub_field('text_field_background_color');
?>
<section class="text_block <?= $text_field_background_color; ?>">
    <div class="container">
        <div class="row">
            <div class="col-10 col-md-10">
                <div class="text_block__content-container">
                    <div class="text_block__content-container">
                        <?= $text_field; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>