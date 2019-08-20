<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <title><?php wp_title(''); ?></title>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#f00">
  <?php wp_head(); ?>
  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

  <?php $header_code = get_field('header_code', 'option'); ?>
  <?php if ( $header_code ) echo $header_code; ?>
</head>

<body <?php body_class(); ?> >

  <header class="main-banner" role="banner">
    <div class="container">
      <a class="brand" href="/">
        <img src="<?php bloginfo('template_directory'); ?>/assets/img/svg/logo.svg" alt="Site Logo">
      </a>

      <nav>
        <div class="main-nav-wrap" role="navigation">
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

        <div class="mobile-nav-wrap" role="navigation">
          <a class="mobile-brand" href="/"><img src="<?php bloginfo('template_directory'); ?>/assets/img/svg/logo.svg" alt="Mobile Site Logo"></a>
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

<main id="top" role="main">
