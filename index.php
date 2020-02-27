<?php get_header(); ?>


<section class="posts-index">
  <div class="container">
    
    <div class="posts-index--title">
      <h1>Blog</h1>
    </div>

    <div class="posts-index--grid">
      <div class="flex">
        <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>
            <?php include( locate_template('partials/posts/post-entry.php') ); ?>
          <?php endwhile; ?>

        <?php else :  ?>
          <h2>No Posts Found</h2>
          <?php get_search_form(); ?>

        <?php endif; ?>
      </div>
    </div>

    <div class="posts-index--pagination">
      <?php include( locate_template('partials/posts/post-pagination.php') ); ?>
    </div>

  </div>
</section>


<?php get_footer(); ?>
