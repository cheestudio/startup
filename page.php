<?php get_header(); ?>


<div class="default-page">
  <div class="container">

    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content();?>
      <?php endwhile; ?>
    <?php endif;?>
    <?php wp_reset_query(); ?>

  </div>
</div>


<?php get_footer(); ?>
