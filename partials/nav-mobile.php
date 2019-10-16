<div class="mobile-nav-wrap" role="navigation">

  <a class="mobile-brand" href="/" title="Home">
    <?php svg( $logo, 'Mobile Site Logo' ); ?>
  </a>

  <a class="navbar-toggle">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </a>

  <div class="mobile-nav">
   <?php wp_nav_menu( array(
    'theme_location'  => 'primary_nav',
    'container'       => '',
    'container_class' => '',
    'menu_class'      => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'depth'           => 2
  )); ?>
</div>

</div>