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
          <div class="col-8 col-lg-2 p-0">
            <div class="footer__image-container">
              <?php if ($footer_logo): ?>
                <a href="/home">
                  <img src="<?= $footer_logo['url']; ?>" alt="<?= $footer_logo['alt']; ?>">
                </a>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="content-container">
              hier komt het footer menu
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <?php if ($contact_info): ?>
              <div class="content-container">
                <?= $contact_info; ?>
              </div>
            <?php endif; ?>
          </div>
          <div class="col-lg-3">
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