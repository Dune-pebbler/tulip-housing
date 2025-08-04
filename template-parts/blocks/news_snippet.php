<section class="news-grid">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Nieuws archief</h2>
            </div>
        </div>

        <div class="row" id="news-grid-container">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3, // Only 3 posts
                'post_status' => 'publish'
            );
            $news_query = new WP_Query($args);

            if ($news_query->have_posts()):
                while ($news_query->have_posts()):
                    $news_query->the_post();
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
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
                                <a href="<?php the_permalink(); ?>" class="btn news-grid-button">Lees verder</a>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <div class="btn__container">
                    <a href="/nieuws" class="btn news-load-more-btn">
                        Bekijk alle nieuwsberichten
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>