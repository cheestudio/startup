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
if (function_exists('add_image_size')) {
//add_image_size('NAME', X, Y, $crop);
}
add_filter('image_size_names_choose', 'insert_custom_image_sizes');
function insert_custom_image_sizes($sizes) {
  global $_wp_additional_image_sizes;
  if (empty($_wp_additional_image_sizes)) {
    return $sizes;
  }
  foreach ($_wp_additional_image_sizes as $id => $data) {
    if (!isset($sizes[$id])) {
      $sizes[$id] = ucfirst(str_replace('-', ' ', $id));
    }
  }
  return $sizes;
}

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
