<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <title><?php bloginfo('name'); ?></title>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if ( is_single() ) : ?>
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image" content="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>">
  <?php endif; ?>
  <?php wp_head(); ?>

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
</head>

<body <?php body_class(); ?> >

  <header class="main-banner" role="banner">
    <div class="container">
      <a class="brand" href="/">
        <img src="<?php bloginfo('template_directory'); ?>/assets/img/logo.png" alt="Site Logo">
      </a>

      <nav>
        <div class="main-nav-wrap">
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

          <div class="mobile-nav-wrap">
            <a class="mobile-brand" href="/"><img src="<?php bloginfo('template_directory'); ?>/assets/img/logo.png" alt="Mobile Site Logo"></a>
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
        </nav>
      </div>
    </header>

    <main id="top">
