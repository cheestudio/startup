<?php
/* SHORTCODES AND TINYMCE BUTTONS
========================================================= */

/* Add YouTube Shortcode
========================================================= */
function youtube_embed_shortcode( $atts ) {

  extract( shortcode_atts(
    array(
      'link' => '',
      ), $atts )
  );

  return '<div class="embed-container"><iframe src="//www.youtube.com/embed/' . $link  . '"' . 'frameborder="0" allowfullscreen></iframe></div>';
}
add_shortcode( 'youtube', 'youtube_embed_shortcode' );


/* Add Vimeo Shortcode
========================================================= */
function vimeo_embed_shortcode( $atts ) {

  extract( shortcode_atts(
    array(
      'link' => '',
      ), $atts )
  );

  return '<div class="embed-container"><iframe src="//player.vimeo.com/video/' . $link  . '?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
}
add_shortcode( 'vimeo', 'vimeo_embed_shortcode' );


/* Button
========================================================= */
function ebutton($atts, $content = null) {
 extract(shortcode_atts(array(
  'align'  => '',
  'link'   => '',
  'target' => ''
  ),
 $atts));
 $output  = '<p';
 if($align){$output.=' style="text-align:'.$align.'"';}$output .= '><a';if($target){$output.=' target="'.$target.'"';}$output .= ' href="'.$link.'" class="button">' . do_shortcode($content) . '</a></p>';
 return $output;
}
add_shortcode('button', 'ebutton');


/* Hooks your functions into the correct filters
========================================================= */
function custom_tiny_mce_buttons() {
    // check user permissions
  if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
    return;
  }
    // check if WYSIWYG is enabled
  if ( 'true' == get_user_option( 'rich_editing' ) ) {
    add_filter( 'mce_external_plugins', 'my_add_tinymce_plugin' );
    add_filter( 'mce_buttons', 'my_register_mce_button' );
  }
}
add_action('admin_head', 'custom_tiny_mce_buttons');


/* Declare script for new button
========================================================= */
function my_add_tinymce_plugin( $plugin_array ) {
  $plugin_array['wysiwyg_buttons'] = get_template_directory_uri() .'/assets/js/src/mce-button.js';
  return $plugin_array;
}


/* Register new button in the editor
========================================================= */
function my_register_mce_button( $buttons ) {
  array_push( $buttons,'ebutton','youtube', 'vimeo');
  return $buttons;
}
