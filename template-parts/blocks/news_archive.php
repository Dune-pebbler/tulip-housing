<section class="news-grid">
    <div class="container">
        <div class="row" id="news-grid-container">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 9,
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

        <?php
        // Check if there are more posts to load
        $total_posts = wp_count_posts('post')->publish;
        if ($total_posts > 9):
            ?>
            <div class="row">
                <div class="col-12 text-center">
                    <div class="btn__container">
                        <button id="load-more-news" class="btn news-load-more-btn" data-page="2"
                            data-total="<?php echo $total_posts; ?>">
                            Zie meer
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>



<?php
// Add this to your functions.php file (optional - only if you need custom post fields in REST API)
function add_custom_fields_to_rest_api()
{
    // This function can be used to add custom fields to the REST API response if needed
    // For now, the basic WordPress REST API provides everything we need
}
// Uncomment the line below if you need to add custom fields
// add_action('rest_api_init', 'add_custom_fields_to_rest_api');
?>