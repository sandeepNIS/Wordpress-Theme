<?php if (!defined('ABSPATH')) exit; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="nm-header" id="nmHeader">
  <div class="nm-header-inner nm-container">

    <a class="nm-brand" href="<?php echo esc_url(home_url('/')); ?>">
      <div class="nm-logo">
        <?php
          if (function_exists('the_custom_logo') && has_custom_logo()) {
            the_custom_logo();
          } else {
            echo '<span class="nm-brand-text">' . esc_html(get_bloginfo('name')) . '</span>';
          }
        ?>
      </div>
    </a>

    <!-- Desktop menu -->
    <nav class="nm-nav-desktop" aria-label="Primary Menu">
      <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'container'      => false,
          'menu_class'     => 'nm-menu',
          'fallback_cb'    => '__return_false',
          'depth'          => 3,
        ]);
      ?>
    </nav>

    <!-- Mobile Toggle -->
    <button class="nm-mobile-toggle" type="button"
      aria-label="Toggle Menu"
      aria-controls="nmMobileDrawer"
      aria-expanded="false"
      id="nmMobileToggle">
      <i class="fa-solid fa-bars"></i>
    </button>

  </div>
</header>

<!-- Mobile Drawer -->
<div class="nm-drawer" id="nmMobileDrawer" aria-hidden="true">
  <div class="nm-drawer-overlay" data-nm-close></div>

  <aside class="nm-drawer-panel" role="dialog" aria-modal="true" aria-label="Mobile Menu">
    <div class="nm-drawer-top">
      <span class="nm-drawer-title"><?php echo esc_html(get_bloginfo('name')); ?></span>

      <button class="nm-drawer-close" type="button" aria-label="Close Menu" data-nm-close>
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>

    <nav class="nm-nav-mobile" aria-label="Mobile Primary Menu">
      <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'container'      => false,
          'menu_class'     => 'nm-menu-mobile',
          'fallback_cb'    => '__return_false',
          'depth'          => 3,
        ]);
      ?>
    </nav>
  </aside>
</div>
