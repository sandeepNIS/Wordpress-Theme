<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header style="margin-bottom:20px;">
    <h1 class="nm-h1"><?php the_title(); ?></h1>
  </header>

  <div class="nm-prose">
    <?php the_content(); ?>
  </div>

</article>
