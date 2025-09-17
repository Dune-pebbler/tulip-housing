<?php
$form_text_field = get_sub_field('form_text_field');
$form_form_field = get_sub_field('form_form_field');
$form_text_img = get_sub_field('form_text_img');
?>
<section class="form_block">
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-12 col-lg-4 form-text-field">
                <div class="form-text-field__content">
                    <?= $form_text_field; ?>
                    <?php if ($form_text_img): ?>
                        <img src="<?= $form_text_img['url']; ?>" alt="<?= $form_text_img['alt']; ?>">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-lg-8 form-form-field">
                <?= $form_form_field; ?>
            </div>
        </div>
    </div>
</section>