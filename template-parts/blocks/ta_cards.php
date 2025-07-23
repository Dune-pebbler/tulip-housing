<?php
$ta_text = get_sub_field('ta_text_block');

// Query posts with meta key "doelgroep"
$doelgroep_posts = new WP_Query(array(
    'post_type' => 'doelgroep',
    'posts_per_page' => 4,
    'orderby' => 'date',
    'order' => 'ASC'
));
?>
<section class="ta-cards">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="ta-cards__text-container">
                    <?= $ta_text; ?>
                </div>
            </div>
            <div class="col-12">
                <!-- Add owl-carousel class here -->
                <div class="ta-cards__cards-container owl-carousel stagger-on-scroll">
                    <?php
                    $index = 1;
                    if ($doelgroep_posts->have_posts()):
                        while ($doelgroep_posts->have_posts()):
                            $doelgroep_posts->the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="ta-card ta-card--<?= $index ?> stagger-item"
                                data-card-index="<?= $index ?>">
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="ta-card__image">
                                        <?php
                                        $img_url = wp_get_attachment_url(get_post_thumbnail_id());
                                        ?>
                                        <img src="<?php echo esc_url($img_url); ?>" class="ta-card__img"
                                            alt="<?php the_title_attribute(); ?>">
                                    </div>
                                <?php endif; ?>
                                <div class="ta-card__content">
                                    <h3 class="ta-card__title"><?php the_title(); ?></h3>
                                </div>
                            </a>
                            <?php
                            $index++;
                        endwhile;
                        wp_reset_postdata();
                    else: ?>
                        <p>No posts found with the "doelgroep" key.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Owl Carousel initialization script -->
<script>
    jQuery(document).ready(function ($) {
        $('.ta-cards__cards-container.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: true,
            autoplay: true,


            items: 4, // change as needed, e.g. 3 or 4
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1024: {
                    items: 3,
                },
                1080: {
                    items: 4,
                    autoplay: false,
                }
            }
        });
    });
</script>