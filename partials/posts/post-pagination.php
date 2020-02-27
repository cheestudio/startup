<nav class="pagination">

  <?php // Next Posts
  if ( get_next_posts_link() ) :?>
    <div class="pagination__prev">
      <?= get_next_posts_link( 'Older Posts', $wp_query->max_num_pages ); ?>
    </div>
  <?php endif; ?>

  <?php // Previous Posts
  if ( get_previous_posts_link() ): ?>
    <div class="pagination__next">
      <?= get_previous_posts_link( 'Newer Posts', $wp_query->max_num_pages ); ?>
    </div>
  <?php endif; ?>

</nav>
