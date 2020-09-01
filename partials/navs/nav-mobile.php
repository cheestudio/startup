
<?php // Mobile Nav
$mobile_logo = get_field('logo_mobile', 'option') ? get_field('logo_mobile', 'option') : get_field('logo_desktop', 'option'); ?>

<div class="mobile-nav-wrap">

  <div class="mobile-nav-header">
    <?php if ( $mobile_logo ) : ?>
      <a href="<?= home_url(); ?>" class="mobile-brand" title="Tap to Go Home" aria-label="Go Home">
        <?php svg( $mobile_logo['sizes']['medium'], 'Site Logo' ); ?>
      </a>
    <?php endif; ?>

    <button class="navbar-toggle" title="Tap to Open Menu" aria-label="Open Menu">
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
