
<?php // Mobile Nav
$logo = get_field('logo_mobile', 'option'); ?>

<div class="mobile-nav-wrap">

  <div class="mobile-nav-header">
    <?php if ( $logo ) : ?>
      <a href="<?= home_url(); ?>" class="mobile-brand" title="Tap to Go Home">
        <?php svg( $logo['sizes']['thumbnail'], 'Site Logo' ); ?>
      </a>
    <?php endif; ?>

    <button class="navbar-toggle" title="Tap to Open Menu">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
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
