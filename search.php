<?php get_header(); ?>


<div class="search-index">
  <div class="container">

    <?php if ( have_posts() ) : ?>
      <h2>Search Results for <em> "<?php the_search_query() ?>"</em></h2>
      <div class="search-result-entries">
        <?php while (have_posts()) : the_post(); ?>
         <a href="<?php the_permalink();?>" class="search-result-entry">
          <h5 id="post-<?php the_ID(); ?>"><?php the_title();?></h5>
          <?php the_excerpt();?>
        </a>
      <?php endwhile; ?>
    </div>

    <?php if ( $wp_query->max_num_pages > 1 ) : ?>
      <?php include( locate_template('partials/posts/post-pagination.php') ); ?>
    <?php endif; ?>

    <?php else : ?>

      <h2>No results found. Try a different search?</h2>
      <div class="search-container no-results clearit">
        <?php get_search_form(); ?>
      </div>

    </div>
  </div>
<?php endif; ?>


<?php get_footer(); ?>
