<section class="news-archive-page">
    <div class="container">
        <?php
        // START: New Featured Posts Section
        $featured_args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'post_status' => 'publish'
        );
        $featured_query = new WP_Query($featured_args);
        $featured_post_ids = wp_list_pluck($featured_query->posts, 'ID'); // Get IDs to exclude later
        
        if ($featured_query->have_posts()):
            ?>
            <div class="row featured-news mb-5">
                <?php
                // Loop through the 3 featured posts
                while ($featured_query->have_posts()):
                    $featured_query->the_post();
                    // This is the first and most recent post (the large one)
                    if ($featured_query->current_post == 0) {
                        ?>
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <div class="news-grid-item featured-large">
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="news-grid-image">
                                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"
                                            alt="<?php the_title_attribute(); ?>" class="img-fluid">
                                    </div>
                                <?php endif; ?>
                                <div class="news-grid-content">
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                                    <?php $lang = isset($_GET['lang']) ? strtolower($_GET['lang']) : ''; ?>
                                    <a href="<?php the_permalink(); ?>" class="btn news-grid-button">
                                        <?php echo ($lang === 'en' ? 'Read more' : 'Lees verder'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                        // Prepare the container for the 2nd and 3rd posts
                        echo '<div class="col-lg-6"><div class="featured-stacked">';
                    } else {
                        // These are the 2nd and 3rd posts (stacked on the right)
                        ?>
                        <div class="news-grid-item featured-small">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="news-grid-image">
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>"
                                        alt="<?php the_title_attribute(); ?>" class="img-fluid">
                                </div>
                            <?php endif; ?>
                            <div class="news-grid-content">
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 12); ?></p>
                                <?php $lang = isset($_GET['lang']) ? strtolower($_GET['lang']) : ''; ?>
                                <a href="<?php the_permalink(); ?>" class="btn news-grid-button">
                                    <?php echo ($lang === 'en' ? 'Read more' : 'Lees verder'); ?>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                endwhile;
                // Close the container for the stacked posts
                echo '</div></div>';
                ?>
            </div>
            <?php
            wp_reset_postdata();
        endif;
        // END: New Featured Posts Section
        ?>

        <div class="row stagger-on-scroll" id="news-grid-container">
            <?php
            // Main grid query, now excluding the 3 featured posts
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 6,
                'post_status' => 'publish',
                'post__not_in' => $featured_post_ids // Exclude featured posts
            );
            $news_query = new WP_Query($args);

            if ($news_query->have_posts()):
                while ($news_query->have_posts()):
                    $news_query->the_post();
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4 stagger-item">
                        <div class="news-grid-item">
                            <?php if ($image_url): ?>
                                <div class="news-grid-image">
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>"
                                        class="img-fluid">
                                </div>
                            <?php endif; ?>
                            <div class="news-grid-content">
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                <?php $lang = isset($_GET['lang']) ? strtolower($_GET['lang']) : ''; ?>
                                <a href="<?php the_permalink(); ?>" class="btn news-grid-button">
                                    <?php echo ($lang === 'en' ? 'Read more' : 'Lees verder'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <?php
        // Adjust the load more button logic
        $total_posts = wp_count_posts('post')->publish;
        // Show button only if there are more posts than the 3 featured + 9 in the grid
        if ($total_posts > 9):
            ?>
            <div class="row">
                <div class="col-12 text-center">
                    <div id="infinite-scroll-trigger" data-page="2" data-total="<?php echo $total_posts; ?>"
                        data-exclude='<?php echo json_encode($featured_post_ids); ?>'>

                        <div class="loader"></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>