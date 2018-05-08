<?php
/* Shortcodes
========================================================= */

// YouTube Shortcode
function youtube_embed_shortcode( $atts ) {

  extract( shortcode_atts(
    array(
      'link' => '',
      ), $atts )
  );

  return '<div class="embed-container"><iframe src="//www.youtube.com/embed/' . $link  . '"' . 'frameborder="0" allowfullscreen></iframe></div>';
}
add_shortcode( 'youtube', 'youtube_embed_shortcode' );


// Vimeo Shortcode
function vimeo_embed_shortcode( $atts ) {

  extract( shortcode_atts(
    array(
      'link' => '',
      ), $atts )
  );

  return '<div class="embed-container"><iframe src="//player.vimeo.com/video/' . $link  . '?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
}
add_shortcode( 'vimeo', 'vimeo_embed_shortcode' );
