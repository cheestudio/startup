<?php get_header(); ?>


<?php

// Look for a page slugged "404"

query_posts(array(
            'post_type' => 'page',
            'name' => '404'
));

if (have_posts()):
     while (have_posts()) : the_post(); ?>

<div class="page-404">
  <div class="container">

    <section class="page-404-content">
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
    </section>

  </div>
</div>


    <?php endwhile; ?>

<?php else: ?>

<div class="page-404">
  <div class="container">

    <section class="page-404-content">
      <h1>404 - Page Not Found</h1>
      <br><br>

      <h3>Do you think this is a site error?</h3>
      <h3><strong><a href="/contact/">Contact us</a></strong> and let us know so we can look into it!</h3>
    </section>

  </div>
</div>

<?php endif; ?>


<?php get_footer(); ?>
