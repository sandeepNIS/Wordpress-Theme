<?php get_header(); ?>

<main class="nm-container nm-content">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="nm-article">
      <h1 class="nm-h1"><?php the_title(); ?></h1>
      <div class="nm-prose"><?php the_content(); ?></div>
    </article>
  <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
