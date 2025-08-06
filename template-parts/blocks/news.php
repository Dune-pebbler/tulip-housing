<section class="news">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Nieuws</h2>
            </div>
        </div>

        <!-- Desktop grouped slider -->
        <div class="row d-none d-md-block">
            <!-- show on md and up -->
            <div class="col-12">
                <div class="news-carousel-desktop owl-carousel">
                    <?php
                    $args = array('post_type' => 'post', 'posts_per_page' => 3);
                    $news_query = new WP_Query($args);

                    if ($news_query->have_posts()):
                        $count = 0;
                        while ($news_query->have_posts()):
                            $news_query->the_post();
                            $count++;
                            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

                            if ($count % 3 == 1) {
                                echo '<div class="item"><div class="row">';
                                echo '<div class="col-md-6">';
                                ?>
                                <div class="news-item big-post">
                                    <?php if ($image_url): ?>
                                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>"
                                            class="img-fluid">
                                    <?php endif; ?>
                                    <div class="big-post__content-container">
                                        <h3><?php the_title(); ?></h3>
                                        <p><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="btn news-button">Lees verder</a>
                                    </div>
                                </div>
                                <?php
                                echo '</div>'; // close col-md-6
                                echo '<div class="col-md-6 d-flex flex-column justify-content-between">';
                            } else {
                                ?>
                                <div class="news-item small-post">
                                    <?php if ($image_url): ?>
                                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>"
                                            class="img-fluid">
                                    <?php endif; ?>
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn news-button">Lees verder</a>
                                </div>
                                <?php
                            }

                            if ($count % 3 == 0) {
                                echo '</div></div></div>';
                            }

                        endwhile;

                        if ($count % 3 != 0) {
                            echo '</div></div></div>';
                        }

                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div>

        <!-- Mobile individual slider -->
        <div class="row d-md-none">
            <!-- show only below md -->
            <div class="col-12">
                <div class="news-carousel-mobile owl-carousel">
                    <?php
                    $args = array('post_type' => 'post', 'posts_per_page' => 3);
                    $news_query = new WP_Query($args);

                    if ($news_query->have_posts()):
                        while ($news_query->have_posts()):
                            $news_query->the_post();
                            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                            ?>
                            <div class="item">
                                <div class="news-item">
                                    <?php if ($image_url): ?>
                                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>"
                                            class="img-fluid">
                                    <?php endif; ?>
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn news-button">Lees verder</a>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>