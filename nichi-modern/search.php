<?php get_header(); ?>

<main class="nm-content">
  <div class="nm-container">

    <header style="margin-bottom:30px;">
      <h1 class="nm-h1">
        Search Results for: "<?php echo esc_html(get_search_query()); ?>"
      </h1>
    </header>

    <?php if (have_posts()) : ?>

      <div style="display:grid; grid-template-columns:1fr; gap:18px;">
        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('template-parts/content', get_post_type()); ?>
        <?php endwhile; ?>
      </div>

      <div style="margin-top:40px;">
        <?php the_posts_pagination([
          'mid_size'  => 2,
          'prev_text' => __('← Previous', 'nichi-modern'),
          'next_text' => __('Next →', 'nichi-modern'),
        ]); ?>
      </div>

    <?php else : ?>
      <?php get_template_part('template-parts/content', 'none'); ?>
    <?php endif; ?>

  </div>
</main>

<?php get_footer(); ?>
