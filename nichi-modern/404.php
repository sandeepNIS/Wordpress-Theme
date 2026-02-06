<?php get_header(); ?>

<main class="nm-content">
  <div class="nm-container" style="text-align:center; padding:80px 0;">
    
    <h1 class="nm-h1" style="font-size:60px; margin-bottom:10px;">404</h1>

    <p class="nm-prose" style="max-width:600px; margin:0 auto;">
      Sorry, the page you are looking for does not exist or may have been moved.
    </p>

    <div style="margin-top:30px;">
      <a href="<?php echo esc_url(home_url('/')); ?>" 
         style="
           display:inline-block;
           padding:12px 22px;
           border-radius:14px;
           background: var(--nm-primary);
           color:#fff;
           font-weight:700;
           text-decoration:none;
         ">
        Back to Home
      </a>
    </div>

  </div>
</main>

<?php get_footer(); ?>
