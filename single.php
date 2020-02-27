<?php get_header(); ?>


<?php if ( have_posts() ) : ?>
  <div class="post-single">
    <div class="container">

      <div class="post-single--content">
        <?php while ( have_posts() ) : the_post();?>
          <?php include( locate_template('partials/posts/post-single.php') ); ?>
        <?php endwhile; ?>
      </div>

    </div>
  </div>
<?php endif; ?>


<?php get_footer(); ?>
