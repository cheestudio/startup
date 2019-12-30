<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <title><?php wp_title(''); ?></title>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#00704a">
  <?php wp_head(); ?>
  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
  <?php $logo = get_template_directory_uri() . '/assets/img/svg/logo.svg'; ?>
  <?php $header_code = get_field('header_code', 'option'); ?>
  <?php if ( $header_code ) echo $header_code; ?>
</head>

<body <?php body_class(); ?> id="top">

  <header class="main-banner" role="banner">
    <div class="container">
      <a class="brand" href="/" title="Home">
        <?php svg( $logo, 'Site Logo' ); ?>
      </a>

      <nav role="navigation">
        <?php include( locate_template('partials/navs/nav-desktop.php') ); ?>
        <?php include( locate_template('partials/navs/nav-mobile.php') ); ?>
      </nav>

    </div>
  </header>

  <main role="main">
