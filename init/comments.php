<?php
/* Custom walker for Comments Markup
========================================================= */
class init_Walker_Comment extends Walker_Comment {
  function start_lvl(&$output, $depth = 0, $args = array()) {
    $GLOBALS['comment_depth'] = $depth + 1; ?>
    <ul <?php comment_class('unstyled comment-' . get_comment_ID()); ?>>
      <?php
    }

    function end_lvl(&$output, $depth = 0, $args = array()) {
      $GLOBALS['comment_depth'] = $depth + 1;
      echo '</ul>';
    }

    function start_el(&$output, $comment, $depth, $args, $id = 0) {
      $depth++;
      $GLOBALS['comment_depth'] = $depth;
      $GLOBALS['comment'] = $comment;

      if (!empty($args['callback'])) {
        call_user_func($args['callback'], $comment, $args, $depth);
        return;
      }

      extract($args, EXTR_SKIP); ?>

      <li <?php comment_class('comment-' . get_comment_ID()); ?>>
        <?php include(locate_template('partials/blog/comment-single')); ?>
        <?php
      }

      function end_el(&$output, $comment, $depth = 0, $args = array()) {
        if (!empty($args['end-callback'])) {
          call_user_func($args['end-callback'], $comment, $args, $depth);
          return;
        }
        echo "</div></li>\n";
      }
    }

function init_get_avatar($avatar) {
  $avatar = str_replace("class='avatar", "class='avatar", $avatar);
  return $avatar;
}
add_filter('get_avatar', 'init_get_avatar');
