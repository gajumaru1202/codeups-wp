<?php get_header(); ?>

<main id="main" class="site-main">
  <section class="content">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
    ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h2 class="entry-title"><?php the_title(); ?></h2>
          <div class="entry-content">
            <?php the_content(); ?>
          </div>
        </article>
    <?php
      endwhile;
    else :
    ?>
      <p>記事が見つかりませんでした。</p>
    <?php endif; ?>
  </section>
</main>

<?php get_footer(); ?>