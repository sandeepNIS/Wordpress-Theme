<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>
  style="
    padding:20px;
    border:1px solid rgba(15,23,42,0.12);
    border-radius:16px;
    box-shadow:0 10px 22px rgba(2,6,23,0.06);
    background:#fff;
  "
>

  <header>
    <h2 style="margin:0 0 8px; font-size:22px; font-weight:900;">
      <a href="<?php the_permalink(); ?>" style="text-decoration:none; color:inherit;">
        <?php the_title(); ?>
      </a>
    </h2>

    <p style="margin:0; font-size:13px; opacity:0.7;">
      <?php echo get_the_date(); ?> | <?php the_author(); ?>
    </p>
  </header>

  <div style="margin-top:14px; line-height:1.8; font-size:15px;">
    <?php the_excerpt(); ?>
  </div>

  <div style="margin-top:16px;">
    <a href="<?php the_permalink(); ?>"
       style="
         display:inline-block;
         padding:10px 18px;
         border-radius:14px;
         background: rgba(11,42,168,0.08);
         color: var(--nm-primary);
         font-weight:800;
         text-decoration:none;
       ">
      Read More →
    </a>
  </div>

</article>
