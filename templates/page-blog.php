<?php
/* Template Name: Blog
========================================================= */ ?>
<?php get_header(); ?>


<section class="blog-index">
  <div class="container">

    <?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $custom_args = array(
      'post_type'      => 'post',
      'posts_per_page' => 6,
      'paged'          => $paged
    );

    $custom_query = new WP_Query( $custom_args ); ?>

    <?php if ( $custom_query->have_posts() ) : ?>

      <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
        <article class="loop">
          <h3><?php the_title(); ?></h3>
          <div class="content">
            <?php the_excerpt(); ?>
          </div>
        </article>
      <?php endwhile; ?>

      <?php if ($the_query->max_num_pages > 1) :  ?>
        <nav class="prev-next-posts">
          <div class="prev-posts-link">
            <?php echo get_next_posts_link( 'Older Entries', $the_query->max_num_pages ); ?>
          </div>
          <div class="next-posts-link">
            <?php echo get_previous_posts_link( 'Newer Entries' ); ?>
          </div>
        </nav>
      <?php endif; ?>


      <?php wp_reset_postdata(); ?>

    <?php else :  ?>
      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>

  </div>
</section>


<?php get_footer(); ?>
