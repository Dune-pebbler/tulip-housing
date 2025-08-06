<?php
$services_title = get_sub_field('services_title');
$show_red_before = get_sub_field('show_red_before');
$service_background_color = get_sub_field('service_background_color');


$services_posts = new WP_Query(array(
    'post_type' => 'dienst',
    'posts_per_page' => -1, // Load all services (carousel handles items)
    'orderby' => 'date',
    'order' => 'ASC'
));
?>
<section class="services <?= $service_background_color; ?> <?= $show_red_before ? 'has-colored-before' : ''; ?>">
    <div class="container fade-in-on-scroll">
        <div class="row">
            <div class="col-12">
                <?php if ($services_title): ?>
                    <h2 class="services__title"><?= $services_title; ?></h2>
                <?php endif; ?>
            </div>
            <div class="col-12">
                <div class="services__cards-container owl-carousel">
                    <?php if ($services_posts->have_posts()): ?>
                        <?php while ($services_posts->have_posts()):
                            $services_posts->the_post(); ?>
                            <div class="service-card">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail('full', ['class' => 'service-card__image']); ?>
                                    <?php endif; ?>
                                    <div class="service-card__title-container">
                                        <div class="service-card__icon">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="55.806" height="69.62"
                                                viewBox="0 0 55.806 69.62">
                                                <defs>
                                                    <clipPath id="clip-path">
                                                        <rect width="55.806" height="69.62" fill="#fff" />
                                                    </clipPath>
                                                </defs>
                                                <g clip-path="url(#clip-path)">
                                                    <path
                                                        d="M29.508,79.879c-.621,0-1.256-.016-1.908-.049C9.95,78.941.948,68.108.845,47.633c-.052-10.2-.63-14.6-.806-15.706a3.032,3.032,0,0,1,3.755-3.409C18.6,32.362,22.147,40.4,25.581,48.175c.745,1.686,1.515,3.43,2.4,5.1C32.228,61.335,38.817,61.012,39.1,61c.041,0,.111-.006.152-.007a9.445,9.445,0,0,0,7.159-2.882c4.65-5.013,4.049-15.418,3.823-19.335-.033-.568-.059-1.03-.067-1.363-.035-1.416-.046-2.545-.032-3.459C35.87,38.629,34.7,51.4,34.653,51.98A2.678,2.678,0,0,1,29.31,51.6c.014-.193,1.6-19.349,23.154-23.795a2.743,2.743,0,0,1,2.522.766,3.735,3.735,0,0,1,.623,3.6,30.1,30.1,0,0,0-.09,5.109c.007.289.031.69.06,1.184.959,16.6-3.547,21.457-5.243,23.286A14.7,14.7,0,0,1,39.4,66.345c-1.208.066-10.479.2-16.163-10.571-.967-1.833-1.776-3.664-2.557-5.434C17.8,43.819,15.276,38.1,5.736,34.7c.221,2.674.435,6.805.466,12.9C6.29,65.2,13.176,73.739,27.87,74.481c12.519.63,17.981-6.083,18.208-6.369a2.678,2.678,0,0,1,4.236,3.278c-.277.361-6.689,8.488-20.806,8.489"
                                                        transform="translate(0 -10.259)" fill="#fff" />
                                                    <path
                                                        d="M47.184,20.822a2.679,2.679,0,0,1-2.678-2.678V13.454L35.044,6.076l-9.461,7.378v4.689a2.678,2.678,0,1,1-5.357,0v-6a2.68,2.68,0,0,1,1.031-2.112L33.4.567a2.679,2.679,0,0,1,3.294,0l12.14,9.467a2.68,2.68,0,0,1,1.031,2.112v6a2.679,2.679,0,0,1-2.678,2.678"
                                                        transform="translate(-7.479 0)" fill="#fff" />
                                                </g>
                                            </svg>
                                        </div>
                                        <h3 class="service-card__title"><?php the_title(); ?></h3>
                                    </div>
                                </a>
                            </div>

                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>