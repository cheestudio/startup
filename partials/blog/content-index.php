<article class="post-entry">

  <div class="entry-content">
    <h2 class="entry-title">
      <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
    </h2>

    <?php if ( has_post_thumbnail() ) : ?>
      <div class="featured-image">
        <a href="<?php the_permalink();?>"><?php the_post_thumbnail('medium_large' ); ?></a>
      </div>
    <?php endif; ?>

    <?php get_template_part('partials/blog/entry-meta');?>

    <div class="post-excerpt">
      <?php the_excerpt(); ?>
      <a class="read-more button" href="<?php the_permalink();?>">Read More</a>
    </div>

  </div>

</article>
