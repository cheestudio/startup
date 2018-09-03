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