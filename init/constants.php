<?php
/* Register NAV Menus
========================================================= */
register_nav_menus(array(
  'primary_nav' => __('Primary Navigation'),
  'footer_nav'  => __('Footer Navigation'),
));


/* Add Post Thumbnails
========================================================= */
add_theme_support('post-thumbnails');


/* Custom Image Sizes
========================================================= */
//add_image_size('NAME', 1600, 9999, true);


/* Register Sidebars
========================================================= */
/*register_sidebar(array(
  'name'          => __('Primary Sidebar'),
  'id'            => 'sidebar-primary',
  'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
  'after_widget'  => '</div></div>',
  'before_title'  => '<h3>',
  'after_title'   => '</h3>',
  ));*/
