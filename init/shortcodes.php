<?php
/* Shortcodes
========================================================= */

/* Button (with on-page anchor class when arugment is used)
========================================================= */
function ebutton($atts, $content = null) {
 extract(shortcode_atts(array(
  'align'  => '',
  'url'   => '',
  'target' => '',
  'anchor' => ''
  ),
 $atts));
 $output  = '<p';
 if($align){$output.=' style="text-align:'.$align.'"';}$output .= '><a';if($target){$output.=' target="'.$target.'"';}$output .= ' href="'.$url.'" class="button';if($anchor){$output.= ' same-page';}$output.='">' . do_shortcode($content) . '</a></p>';
 return $output;
}
add_shortcode('button', 'ebutton');

/* Current Year (for use within WYSIWYG editor, such as a Copyright Date)
========================================================= */
function jr_cy_y() {
  $date = getdate();
  return $date['year'];
}

add_shortcode( 'year', 'jr_cy_y' );