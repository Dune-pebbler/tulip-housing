<?php
$ta_text = get_sub_field('ta_text_block');

// --- START: MODIFICATIONS ---

// The arguments for our query
$args = array(
    'post_type' => 'doelgroep',
    'posts_per_page' => 4,
    'orderby' => 'date',
    'order' => 'ASC',
);

// Determine the container class and query args based on the page type
if (is_singular('doelgroep')) {
    // We are on a single 'doelgroep' page
    $current_id = get_the_ID();
    $args['post__not_in'] = array($current_id);
    $container_class = 'static-grid'; // Use this class for the static grid layout
} else {
    // We are on any other page
    $container_class = 'owl-carousel'; // Use this class to initialize the carousel
}

$doelgroep_posts = new WP_Query($args);
$post_count = $doelgroep_posts->post_count;

// --- END: MODIFICATIONS ---
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
                <div class="ta-cards__cards-container <?= esc_attr($container_class); ?> stagger-on-scroll"
                    data-items="<?= $post_count; ?>">
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