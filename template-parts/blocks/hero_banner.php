<?php
$hero_img = get_sub_field('hero_img');
$hero_title = get_sub_field('hero_title');
?>
<section class="hero">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="hero__container">
                    <img src="<?= $hero_img['url']; ?>" alt="">
                </div>
                <?php if ($hero_title): ?>
                    <div class="hero__title-container">
                        <h1><?= $hero_title; ?></h1>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>