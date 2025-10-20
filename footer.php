</main>
<?php
$footer_logo = get_field('footer_logo', 'option');
$location_info = get_field('location_info', 'option');
$contact_info = get_field('contact_info', 'option');
$ftbr_repeater = get_field('ftbr_repeater', 'option');
$socials_repeater = get_field('socials', 'option');

?>
<footer>
  <section class="footer-banner">
    <div class="footer-banner-background">
      <img src="<?= get_template_directory_uri(); ?>/images/pink-gradient.png" alt="<?= esc_attr($logo['alt']); ?>">
    </div>
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-12">
          <div class="footer-banner__content-container">
            <?php if ($ftbr_repeater): ?>
              <div class="footer-items">
                <?php foreach ($ftbr_repeater as $item): ?>
                  <div class="footer-item">
                    <?php if (!empty($item['ftbr_icon'])): ?>
                      <div class="footer-item-icon">
                        <img src="<?= $item['ftbr_icon']['url']; ?>" alt="">
                      </div>
                    <?php endif; ?>
                    <?php if (!empty($item['ftbr_text'])): ?>
                      <div class="footer-item-text">
                        <?= $item['ftbr_text']; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="footer-main">
    <div class="container-fluid">
      <div class="reference">
        <div class="row justify-content-around">
          <div class="col-12 col-md-6 col-lg-4 p-0">
            <div class="footer__image-container">
              <?php if ($footer_logo): ?>
                <a href="/home">
                  <img src="<?= $footer_logo['url']; ?>" alt="<?= $footer_logo['alt']; ?>">
                </a>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <div class="footer-menu">
              <?php
              wp_nav_menu([
                'theme_location' => 'footer-1', // match your registered location key exactly
                'container' => 'nav',
                'container_class' => 'footer-menu-1',
                'menu_class' => 'footer-menu-list',
                'fallback_cb' => false,
              ]);
              ?>
            </div>

          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <?php if ($contact_info): ?>
              <div class="content-container">
                <?= $contact_info; ?>
              </div>
            <?php endif; ?>
          </div>
          <div class="col-12 col-md-6 col-lg-2">
            <div class="socials">
              <?php if (have_rows('socials', 'option')): ?>
                <div class="socials-row" style="display: flex; gap: 20px;">
                  <?php
                  $count = 0;
                  while (have_rows('socials', 'option') && $count < 3):
                    the_row();
                    $social_logo = get_sub_field('socials_logo');
                    $social_link = get_sub_field('socials_link');
                    if ($social_logo && $social_link): ?>
                      <a href="<?php echo $social_link['url']; ?>">
                        <img src="<?php echo $social_logo['url']; ?>" alt="<?php echo $social_logo['alt']; ?>"
                          style="max-height: 40px; height: auto;">
                      </a>
                    <?php endif;
                    $count++;
                  endwhile; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6 col-md-4 text-center">
            <p id="copyright"></p>
          </div>
          <?php
          // 1. Set default values
          $privacy_href = '/privacybeleid';
          $privacy_text = 'Privacybeleid - ';

          // 2. Check the URL parameter
          if (isset($_GET['lang']) && $_GET['lang'] === 'en') {
            // 3. Set English values if true
            $privacy_href = '/privacy-policy?lang=en';
            $privacy_text = 'Privacy - ';
          }
          ?>


          <div class="privacy-link-container">
            <a class="privacy-link" href="<?php echo htmlspecialchars($privacy_href); ?>">
              <?php echo htmlspecialchars($privacy_text); ?>
            </a>
          </div>

          <?php
          // 1. Set default values
          $disclaimer_href = '/disclaimer';
          $disclaimer_text = 'Disclaimer - ';

          // 2. Check if lang=en
          if (isset($_GET['lang']) && $_GET['lang'] === 'en') {
            // 3. Update href for English
            $disclaimer_href = '/disclaimer?lang=en';
            // The text stays the same
          }
          ?>




          <div class="col-12 justify-content-end">
            <p id="copyright"></p>
            <div class="privacy-link-container">
              <a class="privacy-link" href="<?php echo htmlspecialchars($privacy_href); ?>">
                <?php echo htmlspecialchars($privacy_text); ?>
              </a>
            </div>
            <div class="disclaimer-link-container">
              <a class="disclaimer-link" href="<?php echo htmlspecialchars($disclaimer_href); ?>">
                <?php echo htmlspecialchars($disclaimer_text); ?>
              </a>
            </div>
            <div class="dp-container">
              <p><a href="https://dunepebbler.nl/">Website door: <svg id="Group_116" data-name="Group 116"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 45.994"
                    style="width: 40px; height: 40px; vertical-align: middle; margin-left: 5px;">
                    <defs>
                      <style>
                        .cls-1 {
                          fill: #b60c44;
                        }
                      </style>
                    </defs>
                    <path id="Path_48" data-name="Path 48" class="cls-1"
                      d="M23,0c-.343,0-.68.006-1.017.025a1.176,1.176,0,0,1,.074.435V33.295a.889.889,0,0,1-.968,1h-.619c-.619,0-.968-.306-.968-.888V32.137c-.306.692-1.544,2.279-4.441,2.279-3.32,0-5.25-2.126-5.25-5.6V18.041c0-3.59,2.046-5.679,5.366-5.679,2.781,0,3.939,1.354,4.288,2.009V.459a1.855,1.855,0,0,1,.012-.19A23,23,0,0,0,23,45.994c.312,0,.619-.006.925-.018V13.459a.889.889,0,0,1,.968-1h.619c.619,0,.968.306.968.888v1.274c.306-.692,1.544-2.279,4.441-2.279,3.32,0,5.25,2.126,5.25,5.6V28.706c0,3.59-2.046,5.679-5.366,5.679-2.781,0-3.939-1.354-4.288-2.009V45.724A23,23,0,0,0,23,0Z">
                    </path>
                    <path id="Path_49" data-name="Path 49" class="cls-1"
                      d="M436.369,256.653c2.242,0,3.4-1.195,3.4-3.473V242.637c0-2.242-1.158-3.437-3.4-3.437-2.009,0-3.669,1.158-3.669,3.357V253.29C432.7,255.5,434.36,256.653,436.369,256.653Z"
                      transform="translate(-406.193 -224.547)"></path>
                    <path id="Path_50" data-name="Path 50" class="cls-1"
                      d="M205.7,239c-2.242,0-3.4,1.195-3.4,3.473v10.543c0,2.242,1.158,3.437,3.4,3.437,2.009,0,3.669-1.158,3.669-3.357V242.363C209.369,240.158,207.709,239,205.7,239Z"
                      transform="translate(-189.907 -224.359)"></path>
                  </svg></a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>




</footer>
<script>
  const currentYear = new Date().getFullYear();
  document.getElementById("copyright").innerHTML =
    `&copy; ${currentYear}`;
</script>
<?php wp_footer(); ?>
</body>

</html>
</main>