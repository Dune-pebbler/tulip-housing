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

// Check if we are on a single 'doelgroep' post page.
// If so, exclude the current post ID from the query.
if (is_singular('doelgroep')) {
    $current_id = get_the_ID();
    $args['post__not_in'] = array($current_id);
}

$doelgroep_posts = new WP_Query($args);

// Get the number of posts that were actually found.
// This will be 4 on other pages and 3 on a 'doelgroep' page.
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
                <div class="ta-cards__cards-container owl-carousel stagger-on-scroll" data-items="<?= $post_count; ?>">
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