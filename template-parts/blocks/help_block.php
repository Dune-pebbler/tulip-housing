<?php
$left_text_field = get_sub_field('left_text_field');
$right_text_field = get_sub_field('right_text_field');

?>
<section class="help">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between">
                <div class="help__text-left">
                    <?= $left_text_field; ?>
                </div>
                <div class="help__text-right">
                    <?= $right_text_field; ?>
                </div>
            </div>
        </div>
    </div>
</section>