<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#00704a">
  <?php wp_head(); ?>
  <link rel="alternate" type="application/rss+xml" title="<?= get_bloginfo('name'); ?> Feed" href="<?= home_url(); ?>/feed/">

  <?php // Site Logo & Optional ACF code
  $logo = get_template_directory_uri() . '/assets/img/svg/logo.svg';
  if ( function_exists('get_field') ) :
    $header_code = get_field('header_code', 'option');
    if ( isset($header_code) ) echo $header_code;
  endif; ?>
</head>

<body <?php body_class(); ?> id="top">
  
  <?php // Optional ACF code
  if ( function_exists('get_field') ) :
    $body_code = get_field('body_code', 'option');
    if ( isset($body_code) ) echo $body_code;
  endif; ?>

  <header class="main-banner">
    <div class="container">
      <a class="brand" href="<?= home_url(); ?>" title="Home">
        <?php svg( $logo, 'Site Logo' ); ?>
      </a>

      <nav>
        <?php include( locate_template('partials/navs/nav-desktop.php') ); ?>
        <?php include( locate_template('partials/navs/nav-mobile.php') ); ?>
      </nav>

    </div>
  </header>

  <main>
