<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://use.typekit.net/dfb3xvw.css">
  <title><?php wp_title(); ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <!-- Absolute wrapper so the header sits ON TOP of hero -->
  <div class="header-wrapper">
    <header>
      <nav>
        <div class="container-fluid">
          <div class="row">
            <div class="col-6 nav-container">

              <div class="logo">
                <a href="/" title="Home">
                  <?php $header_logo = get_field('header_logo', 'option'); ?>
                  <?php if ($header_logo): ?>
                    <img src="<?= $header_logo['url']; ?>" alt="">
                  <?php endif; ?>
                </a>
              </div>

              <!-- menu items -->
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
              </div>

              <!-- hamburger -->
              <div class="hamburger">
                <div class="hamburger-line"></div>
                <div class="hamburger-line"></div>
                <div class="hamburger-line"></div>
              </div>

            </div>
          </div>
        </div>
      </nav>
    </header>
  </div>

  <main>