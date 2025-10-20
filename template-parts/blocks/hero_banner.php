<?php
$hero_img = get_sub_field('hero_img');
$hero_title = get_sub_field('hero_title');
$hero_button = get_sub_field('hero_button');
?>

<section class="hero">
    <img class="hero__img" src="<?= $hero_img['url']; ?>" alt="<?= $hero_img['alt']; ?>" loading="eager"
        fetchpriority="high">

    <?php if ($hero_title): ?>
        <div class="hero__overlay">
            <div class="container">
                <div class="hero__title-container">
                    <h1><?= $hero_title; ?></h1>
                    <?php if ($hero_button): ?>
                        <div class="hero__button-container">
                            <a class="btn hero__button" href="<?= $hero_button['url'] ?>"><?= $hero_button['title'] ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>