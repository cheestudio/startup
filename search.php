<?php get_header(); ?>


<div class="search-index">
  <div class="container">
    
    <?php if (have_posts()) : ?>
      <h2>Search Results for "<em><?php the_search_query() ?></em>"</h2>
      <?php while (have_posts()) : the_post(); ?>

        <div class="search-results">
          <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title();?></a></h2>
          <?php the_excerpt();?>
          <a class="button" href="<?php the_permalink();?>">View Page</a>
        </div>

      <?php endwhile; ?>

      <?php if (next_posts_link() || previous_posts_link()): ?>
        <?php next_posts_link('&laquo; Older Entries') ?> | <?php previous_posts_link('Newer Entries &raquo;') ?>
      <?php endif; ?>

    <?php else : ?>

      <h2>No results found. Try a different search?</h2>
      <div class="search-container no-results clearit">
        <?php get_search_form(); ?>
      </div>
    <?php endif; ?>

  </div>
</div>


<?php get_footer(); ?>
