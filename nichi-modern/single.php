<?php get_header(); ?>

<main class="nm-content">
  <div class="nm-container">
    <?php
    while (have_posts()) : the_post();
    ?>
      <article>
        <h1 class="nm-h1"><?php the_title(); ?></h1>

        <p style="opacity:0.7;font-size:14px;">
          Published on <?php echo get_the_date(); ?>
        </p>

        <div class="nm-prose">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</main>

<?php get_footer(); ?>
