<?php if (!defined('ABSPATH')) exit; ?>

<footer class="nm-footer">
  <div class="nm-footer-inner nm-container">
    <div class="nm-footer-grid">

      <!-- Column 1: Brand/About -->
      <div class="nm-footer-col">
        <div class="nm-footer-logo">
          <?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>
            <?php the_custom_logo(); ?>
          <?php else : ?>
            <span class="nm-brand-text"><?php echo esc_html(get_bloginfo('name')); ?></span>
          <?php endif; ?>
        </div>
        <p class="nm-footer-text nm-mt-20">
          <?php echo esc_html(get_bloginfo('description')); ?>
        </p>
        <div class="nm-social">
          <a href="#" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
          <a href="#" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
          <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
        </div>
      </div>

      <!-- Column 2: Quick Links -->
      <div class="nm-footer-col">
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
      </div>

      <!-- Column 3: Contact -->
      <div class="nm-footer-col">
        <h3 class="nm-footer-title">Contact Us</h3>
        <ul class="nm-footer-contact">
          <li><i class="fa-solid fa-location-dot"></i> 813, Dr. Puneeth Rajkumar Road, Bengaluru</li>
          <li><i class="fa-solid fa-phone"></i> +91 80 1234 5678</li>
          <li><i class="fa-solid fa-envelope"></i> info@nichimodern.com</li>
        </ul>
      </div>

    </div>

    <div class="nm-footer-bottom">
      <p>Copyright &copy; <?php echo date('Y'); ?> <?php echo esc_html(get_bloginfo('name')); ?>. All Rights Reserved.</p>
      
      <a class="nm-scrolltop" href="#" aria-label="Scroll to top" id="nmScrollTop">
        <i class="fa-solid fa-arrow-up"></i>
      </a>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
