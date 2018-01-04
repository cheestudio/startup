<?php get_header(); ?>


<div class="blog-index">
  <div class="container">

    <?php if ( !have_posts() ) : ?>
      <div class="alert">
        <h2>Sorry, no results were found.</h2>
      </div>
      <?php get_search_form(); ?>
    <?php endif; ?>

    <section class="post-grid">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part('partials/blog/content-index'); ?>
      <?php endwhile; ?>
    </section>

    <?php if ( $wp_query->max_num_pages > 1 ) : ?>
      <nav class="post-nav">
        <ul class="pager">
          <li class="previous"><?php next_posts_link(__('&larr; Older posts')); ?></li>
          <li class="next"><?php previous_posts_link(__('Newer posts &rarr;')); ?></li>
        </ul>
      </nav>
    <?php endif; ?>

  </div>
</div>


<?php get_footer(); ?>
