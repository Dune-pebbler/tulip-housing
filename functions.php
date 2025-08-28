<?php
defined("ABSPATH") || die("-1");

# DEFINES
define('THEME_PATH', get_template_directory());
define('THEME_URL', get_template_directory_uri());
define('THEME_TD', sanitize_title(get_bloginfo("title")));

# REQUIRES
include("shortcodes/shortcodes.php");

# ACTIONS
add_action('admin_enqueue_scripts', 'ds_admin_theme_style');
add_action('login_enqueue_scripts', 'ds_admin_theme_style');
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
add_action('wp_enqueue_scripts', 'enqueue_wp_api_settings');
add_action('wp_ajax_load_more_posts', 'load_more_posts_ajax_handler');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts_ajax_handler'); // For non-logged-in users

# FILTERS
add_filter('wp_page_menu_args', 'home_page_menu_args');
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10);
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10);
add_filter('the_content', 'remove_thumbnail_dimensions', 10);
add_filter('the_content', 'add_image_responsive_class');
add_filter('upload_mimes', 'cc_mime_types');
add_filter('use_block_editor_for_post', '__return_false');
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
add_filter('acf/settings/load_json', 'my_acf_json_load_point');

# THEME SUPPORTS
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('woocommerce');

# IMAGE SIZES
add_image_size('default-thumbnail', 128, 128, true);
set_post_thumbnail_size(128, 128, true);

# FUNCTIONS
register_nav_menus(array(
  'primary' => __('Primary Menu', THEME_TD),
  'secondary' => __('secondary Menu', THEME_TD),
  'footer-1' => __('Footer 1 Menu', THEME_TD),
  'footer-2' => __('Footer 2 Menu', THEME_TD),
));


function theme_enqueue_styles()
{
  wp_enqueue_style('owl.carousel.min.css', get_template_directory_uri() . "/assets/owlcarousel/owl.carousel.min.css");
  wp_enqueue_style('owl.carousel.default.theme.min.css', get_template_directory_uri() . "/assets/owlcarousel/owl.theme.default.min.css");
  wp_enqueue_style('bootstrap-grid', get_template_directory_uri() . "/stylesheets/bootstrap-grid.css");
  wp_enqueue_style('styles-main', get_template_directory_uri() . "/stylesheets/style.css", [], filemtime(get_template_directory() . "/stylesheets/style.css"));
}
function theme_enqueue_scripts()
{
  wp_enqueue_script('owl.carousel.min.js', get_template_directory_uri() . "/assets/owlcarousel/owl.carousel.min.js", ['jquery'], '1.0.0', true);
  wp_enqueue_script('js-in-view', get_template_directory_uri() . "/js/libs/in-view.js", ['jquery'], '1.0.0', true);
  wp_enqueue_script('js-main', get_template_directory_uri() . "/js/main.js", ['jquery'], filemtime(get_template_directory() . "/js/main.js"), true);

  // START: Infinite scroll script integrated here

  // -- CORRECTED CONDITIONAL --
  // Replace 'nieuws' with the slug of your news/blog page.
  if (is_page('nieuws')) {

    // Enqueue the infinite load script. Note the name change to 'infiniteload.js'
    wp_enqueue_script(
      'infinite-load', // handle
      get_template_directory_uri() . '/js/infiniteload.js', // path
      array('jquery'), // dependencies
      '1.0', // version
      true // load in footer
    );

    // Pass necessary data (AJAX URL and nonce) to our script
    wp_localize_script('infinite-load', 'my_ajax_obj', array(
      'ajax_url' => admin_url('admin-ajax.php'),
      'nonce' => wp_create_nonce('load_more_nonce')
    ));
  }
  // END: Infinite scroll script
}


function my_acf_json_save_point($path)
{
  $path = get_stylesheet_directory() . '/acf';
  return $path;
}
function my_acf_json_load_point($paths)
{
  unset($paths[0]);
  $paths[] = get_stylesheet_directory() . '/acf';
  return $paths;
}
function home_page_menu_args($args)
{
  $args['show_home'] = true;
  return $args;
}
function remove_thumbnail_dimensions($html)
{
  $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
  return $html;
}
function remove_width_attribute($html)
{
  $html = preg_replace('/(width|height)="\d*"\s/', "", $html);
  return $html;
}
function add_image_responsive_class($content)
{
  global $post;
  $pattern = "/<img(.*?)class=\"(.*?)\"(.*?)>/i";
  $replacement = '<img$1class="$2 img-responsive"$3>';
  $content = preg_replace($pattern, $replacement, $content);
  return $content;
}
function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
function ds_admin_theme_style()
{
  if (!current_user_can('manage_options')) {
    echo '<style>.update-nag, .updated, .error, .is-dismissible { display: none; }</style>';
  }
}
function my_acf_google_map_api($api)
{
  $api['key'] = '';
  return $api;
}
function enqueue_wp_api_settings()
{
  wp_localize_script('main-js', 'wpApiSettings', array(
    'root' => esc_url_raw(rest_url()),
    'nonce' => wp_create_nonce('wp_rest')
  ));
}


# AJAX HANDLERS

// The AJAX handler function to load more posts
function load_more_posts_ajax_handler()
{
  // Verify the security nonce
  check_ajax_referer('load_more_nonce', 'nonce');

  // Sanitize the input from the AJAX request
  $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
  $exclude_ids = isset($_POST['exclude']) ? array_map('intval', $_POST['exclude']) : array();

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 6,
    'post_status' => 'publish',
    'post__not_in' => $exclude_ids,
    'paged' => $page,
  );

  $news_query = new WP_Query($args);

  if ($news_query->have_posts()):
    while ($news_query->have_posts()):
      $news_query->the_post();
      // This HTML structure must match your grid item exactly
      ?>
      <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="news-grid-item">
          <?php if (has_post_thumbnail()): ?>
            <div class="news-grid-image">
              <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>"
                alt="<?php the_title_attribute(); ?>" class="img-fluid" loading="lazy" decoding="async">
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
  endif;

  wp_die(); // Always end a WordPress AJAX handler with wp_die()
}


# RANDOM CODE
// get the the role object
$role_object = get_role('editor');
// add $cap capability to this role object
$role_object->add_cap('edit_theme_options');

?>