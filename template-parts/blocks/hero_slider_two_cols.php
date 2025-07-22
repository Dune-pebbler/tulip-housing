<section class="hero-slider_two_cols">
    <div class="container hi-tim">
        <div class="row">
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