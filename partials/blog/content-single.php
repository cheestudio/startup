<?php while ( have_posts() ) : the_post();?>

  <article class="post-entry">
    <div class="entry-content">
      <h1 class="entry-title"><?php the_title(); ?></h1>

      <?php get_template_part('partials/blog/entry-meta');?>

      <?php if ( has_post_thumbnail() ) : ?>
        <div class="featured-image"><?php the_post_thumbnail(); ?></div>
      <?php endif; ?>

      <div class="post-content">
        <?php the_content(); ?>
      </div>

    </div>
  </article>

<?php endwhile; ?>


<?php comments_template('/partials/blog/comments.php'); ?>
