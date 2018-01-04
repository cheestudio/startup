<?php get_header(); ?>


<div class="archive-index">
  <div class="container">

    <?php if ( have_posts() ) : ?>

      <h1 class="page-title">
        <?php
        if ( is_category() ) :
          echo single_cat_title( '<strong>CATEGORY: </strong>');

        elseif ( is_tag() ) :
          echo single_tag_title( '<strong>TAG: </strong>' );

        elseif ( is_author() ) :

          the_post();

          echo '<strong>AUTHOR: </strong>' . get_the_author();

          rewind_posts();

        elseif ( is_day() ) :
          printf( __( 'Daily Archives: %s'), '<span>' . get_the_date() . '</span>' );

        elseif ( is_month() ) :
          printf( __( 'Monthly Archives: %s'), '<span>' . get_the_date( 'F Y' ) . '</span>' );

        elseif ( is_year() ) :
          printf( __( 'Yearly Archives: %s'), '<span>' . get_the_date( 'Y' ) . '</span>' );

        elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
          _e( 'Asides');

        elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
          _e( 'Images', 'chee');

        elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
          _e( 'Videos');

        elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
          _e( 'Quotes');

        elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
          _e( 'Links');

        else :
          _e( 'Archives');

        endif;
        ?>
      </h1>

      <section class="post-grid">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part('partials/blog/content-index'); ?>
        <?php endwhile; ?>
      </section>

      <?php if ($wp_query->max_num_pages > 1) : ?>
        <nav class="post-nav">
          <ul class="pager">
            <li class="previous"><?php next_posts_link(__('&laquo; older posts')); ?></li>
            <li class="next"><?php previous_posts_link(__('newer posts &raquo;')); ?></li>
          </ul>
        </nav>
      <?php endif; ?>

    <?php else : ?>
      <h2>Nothing Found</h2>
    <?php endif; ?>

  </div>
</div>


<?php get_footer(); ?>
