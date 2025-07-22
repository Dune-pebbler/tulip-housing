</main>
<?php
$footer_logo = get_field('footer_logo', 'option');
$location_info = get_field('location_info', 'option');
$contact_info = get_field('contact_info', 'option');

?>
<footer>
  <div class="footer-main">
    <div class="container">
      <div class="reference">
        <div class="row">
          <div class="col-8 col-lg-3 p-0">
            <div class="footer__image-container">
              <img src="<?= $footer_logo['url']; ?>" alt="<?= $footer_logo['alt']; ?>">
            </div>
          </div>
          <div class="col-12 col-lg-3">
            <div class="content-container">
              <?= $location_info; ?>
            </div>
          </div>
          <div class="col-12 col-lg-3">
            <div class="content-container">
              <?= $contact_info; ?>
            </div>
          </div>
          <div class="col-12 col-lg-1">
            <div id="copyright"></div>
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