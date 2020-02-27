<?php get_header(); ?>


<div class="posts-index">
  <div class="container">

    <?php if ( have_posts() ) : ?>

      <div class="posts-index--title">
        <h1>
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
      </div>

      <div class="posts-index--grid">
        <div class="flex">
          <?php while ( have_posts() ) : the_post(); ?>
            <?php include( locate_template('partials/posts/post-entry.php') ); ?>
          <?php endwhile; ?>
        </div>
      </div>

      <div class="posts-index--pagination">
        <?php include( locate_template('partials/posts/post-pagination.php') ); ?>
      </div>

    <?php else : ?>
      <h2>No Posts Found</h2>
      <?php get_search_form(); ?>
    <?php endif; ?>

  </div>
</div>


<?php get_footer(); ?>
