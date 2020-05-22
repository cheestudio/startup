<div class="mobile-nav-wrap">

  <div class="mobile-nav-header">
    <a class="mobile-brand" href="<?= home_url(); ?>" title="Tap to Go Home">
      <?php svg( $logo, 'Company Logo' ); ?>
    </a>

    <a class="navbar-toggle" title="Tap to Open Menu">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
  </div>

  <div class="mobile-nav">
    <?php wp_nav_menu( array(
      'theme_location'  => 'primary_nav',
      'container'       => '',
      'container_class' => '',
      'menu_id'         => '',
      'menu_class'      => 'mobile-menu',
      'echo'            => true,
      'fallback_cb'     => 'wp_page_menu',
      'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
      'depth'           => 2
    )); ?>
  </div>

</div>
