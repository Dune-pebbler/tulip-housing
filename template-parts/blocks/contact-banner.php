<?php
$contact_banner_img = get_sub_field('contact-banner-img');
?>

<?php if ($contact_banner_img): ?>
    <section class="contact-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-0">
                    <img class="img-fluid" src="<?= $contact_banner_img['url']; ?>"
                        alt="<?= isset($contact_banner_img['alt']) ? $contact_banner_img['alt'] : ''; ?>">
                </div>
            </div>
        </div>
        <h1 class="contact-banner__title"><?= get_the_title(); ?></h1>

    </section>
<?php endif; ?>