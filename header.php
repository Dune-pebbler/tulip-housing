<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://use.typekit.net/hwq6byc.css">
  <title>
    <?php wp_title(); ?>
  </title>
  <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
  <header>
    <nav>
      <div class="container">
        <div class="row">
          <div class="col-12 nav-container static">

            <div class="logo">
              <a href="/" title="Home">
                <?php $header_logo = get_field('header_logo', 'option'); ?>
                <?php if ($header_logo): ?>
                  <img src="<?= $header_logo['url']; ?>" alt="">
                <?php endif; ?>
              </a>
            </div>

            <!-- menu items (mobile and desktop)-->
            <div id="nav-items">
              <div id="cross">
                <div class="cross-line-1"></div>
                <div class="cross-line-2"></div>
              </div>
              <?php
              wp_nav_menu([
                'theme_location' => 'primary',
                'menu_class' => 'primary-nav',
              ]);
              ?>
              <!-- search -->
              <!-- <div class="search">
                <form role="search" method="get" class="searchform" action="/">
                  <input type="text" placeholder="Zoek uw product.." name="s" id="s">
                  <button type="submit" class="search-btn"><i class="far fa-search"></i></button>
                </form>
              </div> -->
            </div>
            <!-- end menu items -->

            <div class="hamburger">
              <div class="hamburger-line"></div>
              <div class="hamburger-line"></div>
              <div class="hamburger-line"></div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </nav>
  </header>
  <main>