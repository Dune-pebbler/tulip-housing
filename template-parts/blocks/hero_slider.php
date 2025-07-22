<section class="hero-slider">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-12 p-0">
                <?php if (have_rows('hero_slider')): ?>
                    <div class="owl-carousel owl-theme">
                        <?php while (have_rows('hero_slider')):
                            the_row();
                            $image = get_sub_field('slider_img');
                            if ($image): ?>
                                <div class="slide-item">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                                        class="w-100">
                                </div>
                            <?php endif;
                        endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<script>
    jQuery(document).ready(function ($) {
        $('.hero-slider .owl-carousel').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 800,
            nav: false,
            dots: false,
        });
    });
</script>