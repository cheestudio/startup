<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#00704a">
  <?php wp_head(); ?>
  <link rel="alternate" type="application/rss+xml" title="<?= get_bloginfo('name'); ?> Feed" href="<?= home_url(); ?>/feed/">

  <?php // Logos & Optional ACF code
  $header_logo = get_field('logo_desktop', 'option');
  $header_code = get_field('header_code', 'option');
  $body_code   = get_field('body_code', 'option');
  if ( isset( $header_code ) ) echo $header_code; ?>
</head>

<body <?php body_class(); ?> id="top-of-page">
  <?php if ( isset($body_code) ) echo $body_code; ?>

  <header class="main-banner">
    <div class="container">
      <a href="<?= home_url(); ?>" class="brand" title="Home">
        <?php svg( $header_logo['sizes']['medium'], 'Site Logo' ); ?>
      </a>

      <nav>
        <?php include( locate_template('partials/navs/nav-desktop.php') ); ?>
        <?php include( locate_template('partials/navs/nav-mobile.php') ); ?>
      </nav>

    </div>
  </header>

  <main>
