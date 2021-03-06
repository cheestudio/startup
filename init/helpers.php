<?php
/* HELPER FUNCTIONS
========================================================= */


/* Custom Login Screen
========================================================= */
add_action( 'login_enqueue_scripts', 'custom_login_screen' );
function custom_login_screen() { ?>
  <style type="text/css">
    body {
      background: linear-gradient(to bottom, black, 85%, white) !important;
    }
    #login h1 a {
      background-image: url(<?= get_stylesheet_directory_uri(); ?>/assets/img/svg/logo.svg);
      padding-bottom: 0px;
      background-size: 100%;
      width: 320px;
    }
    #login a {
      transition: .6s cubic-bezier(.23,1,.32,1);
      color: white !important;
    }
    #login a:hover {
      color: black !important;
    }
    #login #wp-submit {
      background: black;
      border-radius: 0;
      border: 2px solid black;
      box-shadow: none;
      color: white;
      cursor: pointer;
      display: inline-block;
      font-size: 16px;
      font-weight: bold;
      line-height: 1;
      padding: 10px 30px;
      text-align: center;
      text-shadow: none;
      transition: .6s cubic-bezier(.23,1,.32,1);
      user-select: none;
      vertical-align: baseline;
      white-space: nowrap;
      zoom: 1;
      -moz-user-select: none;
      -ms-user-select: none;
      -webkit-user-drag: none;
      -webkit-user-select: none;
    }
    #login #wp-submit:hover {
      border-color: black;
      color: black;
      background: white;
    }
  </style>
<?php }


/* ACF - WP Admin Styles
========================================================= */
add_action('acf/input/admin_head', 'my_acf_admin_head');
function my_acf_admin_head() {
  ?>
  <style type="text/css">
    .acf-field.center {
      text-align: center;
    }
    .acf-field.center .image-wrap,
    .acf-field.center .image-wrap img {
      float: none;
      margin-left: auto;
      margin-right: auto;
    }
    .acf-field-button-group.center {
      text-align: center;
    }
    .acf-link .link-wrap span,
    .acf-link .link-wrap .link-url {
      display: block;
    }
    table.acf-table th.acf-th {
      text-align: center;
      font-weight: bold;
    }
    table.acf-table th.acf-th .description {
      font-weight: normal;
    }
    .acf-field.heading > .acf-label label {
      text-align: center;
      text-transform: uppercase;
      font-size: 18px;
    }
    .acf-flexible-content .layout .acf-fc-layout-handle,
    .acf-accordion-title > label {
      text-align: left;
      text-transform: uppercase;
      font-weight: bold;
    }
    .acf-link.-value .link-wrap {
      display: block;
      text-align: center;
    }
    .acf-field-flexible-content .acf-field.heading > .acf-label {
      visibility: hidden;
    }
    .acf-field-oembed {
      max-width: 640px;
      margin-left: auto !important;
      margin-right: auto !important;
    }
  </style>
  <?php
}


/* If File Exists (used to verify .svg files exist primarily)
========================================================= */
function url_exists( $url ) {
  $ch = curl_init( $url );
  curl_setopt( $ch, CURLOPT_NOBODY, true );
  curl_exec( $ch );
  $code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );

  if ( $code == 200 ) {
    $status = true;
  } else {
    $status = false;
  }
  curl_close( $ch );

  return $status;
}


/* Output Inline SVG
========================================================= */
function svg( $path, $alt='' ) {
  if ( url_exists( $path ) ) :
    $ext = pathinfo( $path, PATHINFO_EXTENSION );
    if ( $ext == 'svg' ) :
      echo file_get_contents( $path );
    else :
      echo "<img src='{$path}' alt='{$alt}'>";
    endif;
  endif;
}

/* Gravity Forms Button Markup
========================================================= */
add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
  return "<button class='button gform_button' id='gform_submit_button_{$form['id']}'>{$form['button']['text']}</button>";
}


/* Gravity Forms anchor creation
========================================================= */
add_filter( 'gform_confirmation_anchor', '__return_false' );


/* Enable Gravity Forms field label visibility
========================================================= */
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );


/* Responsive IFRAME tags
========================================================= */
add_filter('embed_oembed_html', 'responsive_embed', 10, 3);
function responsive_embed($html, $url, $attr) {
  return $html!=='' ? '<div class="embed-container">'.$html.'</div>' : '';
}


/* Add Slug to Body Class
========================================================= */
add_filter( 'body_class', 'post_name_in_body_class' );
function post_name_in_body_class( $classes ){
  if( is_singular() ) {
   global $post;
   $parent = get_page($post->post_parent);
   array_push( $classes, "{$post->post_name}" );
   array_push( $classes, "{$parent->post_name}" );
 }
 return $classes;
}


/* Replace "Howdy" on Admin
========================================================= */
add_filter( 'admin_bar_menu', 'replace_howdy',25 );
function replace_howdy( $wp_admin_bar ) {
  $my_account=$wp_admin_bar->get_node('my-account');
  $newtitle = str_replace( 'Howdy,', 'Logged in as', $my_account->title );
  $wp_admin_bar->add_node( array(
    'id' => 'my-account',
    'title' => $newtitle,
  ) );
}


/* Hide Help on Admin
========================================================= */
add_action('admin_head', 'hide_help');
function hide_help() {
  echo '<style type="text/css">
            #contextual-help-link-wrap { display: none !important; }
  </style>';
}


/* Remove footer branding
========================================================= */
add_filter( 'admin_footer_text', '__return_false' );


/* Stop images getting wrapped up in <p> tags when using the_content()
========================================================= */
add_filter('the_content', 'remove_img_ptags');
function remove_img_ptags($content){
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
// for ACF wizzy fields
add_filter ('acf_the_content', 'img_p_class_content_filter', 20);
function img_p_class_content_filter($content) {
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}


/* Always show Kitchen Sink
========================================================= */
add_filter( 'tiny_mce_before_init', 'unhide_kitchensink' );
function unhide_kitchensink( $args ) {
  $args['wordpress_adv_hidden'] = false;
  return $args;
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


/* Show Single Post/Page Content (without loop)
========================================================= */
function show_content() {
 $current_page = get_queried_object();
 $content      = apply_filters( 'the_content', $current_page->post_content );
 echo $content;
}


/* Remove hard-coded width on WordPress Captions
========================================================= */
add_filter('img_caption_shortcode_width', 'my_img_caption_shortcode_width', 10, 3);
function my_img_caption_shortcode_width($width, $atts, $content) {
  return 0;
}


/* Custom Wizzy Toolbar
========================================================= */
add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_custom_toolbars' );
function my_custom_toolbars( $toolbars )
{
  $toolbars['Full'] = array();
  $toolbars['Full'][1] = array(
    'formatselect',
    'bold',
    'italic',
    'underline',
    'forecolor',
    'strikethrough',
    'superscript',
    'charmap',
    'blockquote',
    'bullist',
    'numlist',
    'alignleft',
    'aligncenter',
    'alignright',
    'alignjustify',
    'symbol',
    'link',
    'unlink',
    'removeformat',
    'fullscreen',
    'hr'
  );
  return $toolbars;
}


/* Enqueue Default Editor Styles
========================================================= */
add_editor_style( 'editor-style.css' );


/* Enqueue Gutenberg Editor Styles
========================================================= */
add_action('enqueue_block_editor_assets','add_block_editor_assets',10,0);
function add_block_editor_assets(){
  wp_enqueue_style('block_editor_css', get_stylesheet_directory_uri().'/block-styles.css');
}


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


/* Disable Gutenberg
========================================================= */
add_filter('use_block_editor_for_post', '__return_false', 10);


/* Disable Image Side scaling on upload
========================================================= */
add_filter( 'big_image_size_threshold', 3840 );


/* Numerical Pagination
========================================================= */
function post_pagination( $pages = '', $range = 2 ) {
  $showitems = ( $range * 2 ) + 1;
  global $paged;

  if ( empty($paged) ) $paged = 1;
  if ( $pages == '' ) {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if ( !$pages ) {
      $pages = 1;
    }
  }

  if ( 1 != $pages ) {
    if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) 
      echo "<a class='first-link' href='" . get_pagenum_link(1) . "' title='Go to First Page'><<</a>";
    if ( $paged > 1 && $showitems < $pages ) 
      echo "<a class='prev-link' href='" . get_pagenum_link($paged - 1) . "' title='Go to Previous Page'><</a>";

    for ( $i = 1; $i <= $pages; $i++ ) {
      if ( 1 != $pages && ( !($i >= $paged+$range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems ) ) {
        echo ($paged == $i) ? "<span class='current'>{$i}</span>" : "<a href='" . get_pagenum_link($i) . "' class='inactive' title='Go to Page {$i}'>{$i}</a>";
      }
    }

    if ( $paged < $pages && $showitems < $pages ) 
      echo "<a class='next-link' href='" . get_pagenum_link($paged + 1) . "' title='Go to Next Page'>></a>";
    if ( $paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages ) 
      echo "<a class='last-link' href='" . get_pagenum_link($pages) . "' title='Go to Last Page'>>></a>";
  }
}
