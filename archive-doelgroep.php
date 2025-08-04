<?php get_header(); ?>

<section class="archive-grid">
    <div class="container">
        <div class="row justify-content-center">
            <?php
            // Get current post type dynamically
            $post_type = get_post_type();
            $post_type_obj = get_post_type_object($post_type);
            $post_type_label = $post_type_obj->labels->singular_name;

            // Query the 4 latest posts of current post type
            $args = array(
                'post_type' => $post_type,
                'posts_per_page' => 4,
            );
            $custom_query = new WP_Query($args);

            if ($custom_query->have_posts()):
                while ($custom_query->have_posts()):
                    $custom_query->the_post(); ?>
                    <div class="col-10 col-md-5">
                        <div class="archive-grid-item">
                            <a href="<?php the_permalink(); ?>">
                                <div class="archive-grid-image">
                                    <?php if (has_post_thumbnail()):
                                        the_post_thumbnail('full');
                                    else: ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/placeholder.png"
                                            alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="archive-grid-content">
                                    <h3><?php the_title(); ?></h3>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else:
                echo '<p>Geen ' . esc_html($post_type_label) . ' gevonden.</p>';
            endif;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>