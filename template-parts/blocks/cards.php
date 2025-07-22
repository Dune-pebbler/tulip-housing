<?php
$section_banner = get_sub_field('section_banner');
$cards = get_sub_field('cards_repeater');
?>
<section class="cards">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <?php if ($cards): ?>
                        <?php foreach ($cards as $card):
                            $icon = $card['icon'];
                            $text = $card['card_text'];
                            ?>
                            <div class="col-10 col-md-6 col-lg-3">
                                <div class="card__container">

                                    <?php if ($icon): ?>
                                        <div class="image__container">
                                            <img src="<?= $icon['url']; ?>" alt="<?= $icon['alt']; ?>" class="card__icon">
                                        </div>
                                    <?php endif; ?>
                                    <div class="card__text">
                                        <?= $text; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const cards = document.querySelectorAll(".card__container");

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("in-view");
                        observer.unobserve(entry.target);
                    }
                });
            }, {
            threshold: 0.1,
        }
        );

        cards.forEach((card, index) => {
            card.style.transitionDelay = `${index * 150}ms`; // stagger effect
            observer.observe(card);
        });
    });
</script>