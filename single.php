<?php get_header(); ?>


<div class="blog-single">
  <div class="container">

    <?php while ( have_posts() ) : the_post();?>
      <?php get_template_part('partials/blog/content-single'); ?>
    <?php endwhile; ?>

  </div>
</div>


<?php get_footer(); ?>
