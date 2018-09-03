<?php
/* HELPER FUNCTIONS
========================================================= */

/* Custom Login Screen
========================================================= */

function custom_login_screen() { ?>

<style type="text/css">

#login h1 a, .login h1 a {
    background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/svg/logo.svg); padding-bottom: 0px; background-size: 100%;  width: 170px; height: 160px;
}
body {
  background: #fff !important;
}
#login a {
  color: #fff !important;
}
#login a:hover {
  color: #000 !important;
}
#wp-submit {
    display: inline-block;
  *display: inline;
  zoom: 1;
  line-height: normal;
  white-space: nowrap;
  vertical-align: baseline;
  text-align: center;
  cursor: pointer;
  -webkit-user-drag: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  border: 2px solid #000;
  color:#000;
  padding: 10px 60px;
  -webkit-transition:400ms;
  -o-transition:400ms;
  transition:400ms;
  background:#fff;
  text-transform: uppercase;
  letter-spacing: 0.03em;
  font-size: 19px;
  font-weight: 700;
  border-radius: 25px;
  line-height: 0;
  padding: 10px;
  box-shadow: none;
  text-shadow: none;
}
 </style>
<?php }

add_action( 'login_enqueue_scripts', 'custom_login_screen' );


/* Gravity Forms Button Markup
========================================================= */
function form_submit_button( $button, $form ) {
 return "<button class='button' id='gform_submit_button_{$form["id"]}'>{$form['button']['text']}</button>";
}
add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );


/* Gravity Forms anchor creation
========================================================= */
add_filter("gform_confirmation_anchor", create_function("","return false;"));

/* Fix Gravity Form Tabindex Conflicts
http://gravitywiz.com/fix-gravity-form-tabindex-conflicts
========================================================= */
add_filter( 'gform_tabindex', 'gform_tabindexer', 10, 2 );
function gform_tabindexer( $tab_index, $form = false ) {
  $starting_index = 1000; // if you need a higher tabindex, update this number
  if( $form )
    add_filter( 'gform_tabindex_' . $form['id'], 'gform_tabindexer' );
  return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}

/* Responsive IFRAME tags
========================================================= */
add_filter('embed_oembed_html', 'responsive_embed', 10, 3);
function responsive_embed($html, $url, $attr) {
  return $html!=='' ? '<div class="embed-container">'.$html.'</div>' : '';
}

/* Add Slug to Body Class
========================================================= */
function post_name_in_body_class( $classes ){
  if( is_singular() ) {
   global $post;
   $parent = get_page($post->post_parent);
   array_push( $classes, "{$post->post_name}" );
   array_push( $classes, "{$parent->post_name}" );
 }
 return $classes;
}
add_filter( 'body_class', 'post_name_in_body_class' );


/* Replace "Howdy" on Admin
========================================================= */
function replace_howdy( $wp_admin_bar ) {
  $my_account=$wp_admin_bar->get_node('my-account');
  $newtitle = str_replace( 'Howdy,', 'Logged in as', $my_account->title );
  $wp_admin_bar->add_node( array(
    'id' => 'my-account',
    'title' => $newtitle,
  ) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );


/* Hide Help on Admin
========================================================= */
function hide_help() {
  echo '<style type="text/css">
            #contextual-help-link-wrap { display: none !important; }
  </style>';
}
add_action('admin_head', 'hide_help');


/* Custom Footer Text
========================================================= */
function remove_footer_admin () {
  echo 'Custom WordPress Web Development by <a href="https://goodchee.com/" title="Chee Studio Web Development" target="_blank">Chee Studio</a>';
}
add_filter('admin_footer_text', 'remove_footer_admin');


/* Stop images getting wrapped up in <p> tags when they get dumped out with the_content()
========================================================= */
function remove_img_ptags($content){
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'remove_img_ptags');


/* Always show Kitchen Sink
========================================================= */
function unhide_kitchensink( $args ) {
  $args['wordpress_adv_hidden'] = false;
  return $args;
}
add_filter( 'tiny_mce_before_init', 'unhide_kitchensink' );


/* ACF Global Options Page
========================================================= */
if ( function_exists('acf_add_options_page') ) {

  acf_add_options_page(array(
    'page_title'  => 'Theme Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-settings',
    'capability'  => 'edit_posts',
    'redirect'    => true
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Global Settings',
    'menu_title'  => 'Global Settings',
    'parent_slug' => 'theme-settings',
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Footer Content',
    'menu_title'  => 'Footer Content',
    'parent_slug' => 'theme-settings',
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Company Settings',
    'menu_title'  => 'Company Info',
    'parent_slug' => 'theme-settings',
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Social Media Settings',
    'menu_title'  => 'Social Media',
    'parent_slug' => 'theme-settings',
  ));
}


/* ACF Image - SourceSet
========================================================= */
function acf_image( $image_id, $max_width, $image_size ) {
  if ( $image_id != '' ) :
    // set the default src image size
    $image_src = wp_get_attachment_image_url( $image_id, $image_size );
    // set the srcset with various image sizes
    $image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );
    // generate the markup for the responsive image
    echo 'src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.'px) 100vw, '.$max_width.'px"';
  endif;
}


/* Remove Emoji scripts from head
========================================================= */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/* Remove the additional CSS section, introduced in 4.7, from the Customizer.
========================================================= */
add_action( 'customize_register', 'prefix_remove_css_section', 15 );
function prefix_remove_css_section( $wp_customize ) {
  $wp_customize->remove_section( 'custom_css' );
}

/* Hide Admin Panel (for launch)
========================================================= */
//add_filter('acf/settings/show_admin', '__return_false');
