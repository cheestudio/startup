<?php get_header(); ?>


<?php // Look for a page slug "404"
query_posts(array(
  'post_type' => 'page',
  'name'      => '404'
)); ?>

<section class="page-404">
  <div class="container">
    <div class="page-404--content">

      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <h1><?php the_title(); ?></h1>
          <?php the_content(); ?>
        <?php endwhile; ?>

      <?php else : ?>
        <h1>404 - Page Not Found</h1>
        <h2>Do you think this is a site error?</h2>
        <h3><strong><a href="/contact/" title="Contact us">Contact us</a></strong> and let us know so we can look into it!</h3>
      <?php endif; ?>
    </div>
  </div>
</section>


<?php get_footer(); ?>
