<?php
/* Template Name: Blog
========================================================= */ ?>
<?php get_header(); ?>


<section class="blog-index">
  <div class="container">

    <?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args = array(
      'post_type'      => 'post',
      'posts_per_page' => 6,
      'paged'          => $paged
    );

    $query = new WP_Query( $args ); ?>

    <?php if ( $query->have_posts() ) : ?>

      <section class="post-grid">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <?php get_template_part('partials/blog/content-index'); ?>
        <?php endwhile; ?>
      </section>

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
