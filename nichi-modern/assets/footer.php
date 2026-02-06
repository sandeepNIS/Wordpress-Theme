<?php if (!defined('ABSPATH')) exit; ?>

<footer class="nm-footer">
  <div class="nm-footer-inner nm-container">
    <div class="nm-footer-grid">

      <div class="nm-footer-col">
        <?php if (is_active_sidebar('footer-1')) : ?>
          <?php dynamic_sidebar('footer-1'); ?>
        <?php else: ?>
          <h3 class="nm-footer-title">Quick Links</h3>
          <?php
            wp_nav_menu([
              'theme_location' => 'footer',
              'container'      => false,
              'menu_class'     => 'nm-footer-links',
              'fallback_cb'    => '__return_false',
              'depth'          => 1,
            ]);
          ?>
        <?php endif; ?>
      </div>

      <div class="nm-footer-col">
        <?php if (is_active_sidebar('footer-2')) : ?>
          <?php dynamic_sidebar('footer-2'); ?>
        <?php else: ?>
          <h3 class="nm-footer-title">About the Company</h3>
          <p class="nm-footer-text">
            <?php echo esc_html(get_bloginfo('description')); ?>
          </p>

          <div class="nm-social">
            <a href="#" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
            <a href="#" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
          </div>
        <?php endif; ?>
      </div>

      <div class="nm-footer-col">
        <?php if (is_active_sidebar('footer-3')) : ?>
          <?php dynamic_sidebar('footer-3'); ?>
        <?php else: ?>
          <h3 class="nm-footer-title">Corporate Office</h3>
          <p class="nm-footer-text">
            #813, Dr. Puneeth Rajkumar Road, Hosakerehalli,<br>
            Banashankari 3rd Stage, Bengaluru – 560085, India
          </p>

          <h3 class="nm-footer-title" style="margin-top:16px;">Development Center</h3>
          <p class="nm-footer-text">
            #812, 1st Floor, Dr. Puneeth Rajkumar Road,<br>
            Hosakerehalli, Banashankari 3rd Stage,<br>
            Bengaluru – 560085, India
          </p>
        <?php endif; ?>
      </div>

    </div>

    <div class="nm-footer-bottom">
      <p>Copyright © <?php echo date('Y'); ?> <?php echo esc_html(get_bloginfo('name')); ?>. All Rights Reserved.</p>

      <a class="nm-scrolltop" href="#" aria-label="Scroll to top" id="nmScrollTop">
  <i class="fa-solid fa-arrow-up"></i>
</a>

    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
