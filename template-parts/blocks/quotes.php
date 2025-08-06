<?php
$quotes_repeater = get_sub_field('quotes_repeater');
$backgroundcolor = get_sub_field('backgroundcolor');
?>
<section class="quotes <?= $backgroundcolor; ?>">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md 10">
                <div class="quotes__content-container owl-carousel">
                    <?php if (have_rows('quotes_repeater')): ?>
                        <?php while (have_rows('quotes_repeater')):
                            the_row();
                            $quote_field = get_sub_field('quote_field');
                            $quote_source = get_sub_field('quote_source');
                            ?>
                            <div class="quote-slide item">
                                <?php if ($quote_field): ?>
                                    <blockquote>
                                        <?php echo $quote_field; ?>

                                    </blockquote>
                                <?php endif; ?>

                                <?php if ($quote_source): ?>
                                    <p class="quote-source">- <?php echo $quote_source; ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    jQuery(document).ready(function ($) {
        $('.quotes__content-container.owl-carousel').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            dots: false,
            nav: false,
            autoplayTimeout: 5000,
            autoplayHoverPause: true
        });
    });
</script>