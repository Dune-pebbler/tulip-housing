<?php
$form_text_field = get_sub_field('form_text_field');
$form_form_field = get_sub_field('form_form_field');
?>
<section class="form_block">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-1">
            </div>
            <div class="col-12 col-lg-3 form-text-field">
                <?= $form_text_field; ?>
            </div>
            <div class="col-12 col-lg-8 form-form-field">
                <?= $form_form_field; ?>
            </div>
        </div>
    </div>
</section>