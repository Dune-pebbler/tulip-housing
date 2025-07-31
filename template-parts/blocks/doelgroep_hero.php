<?php
$doelgroep_hero_img = get_sub_field('doelgroep_hero_img');
$doelgroep_hero_title = get_sub_field('doelgroep_hero_title');
$doelgroep_hero_txt = get_sub_field('doelgroep_hero_txt');
$mirror_layout = get_sub_field('mirror_lay-out');
?>
<section class="doelgroep-hero">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-12 col-lg-4">
                <div class="doelgroep-hero__text-container">
                    <h1><?= $doelgroep_hero_title; ?></h1>
                    <?= $doelgroep_hero_txt; ?>
                </div>
            </div>

            <div class="col-12 col-lg-7 p-0">
                <div class="doelgroep-hero__image-container">
                    <img src="<?= $doelgroep_hero_img['url']; ?>" alt="<?= $doelgroep_hero_img['alt']; ?>">
                </div>
            </div>
        </div>
    </div>
</section>