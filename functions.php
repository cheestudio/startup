<?php
/* Theme Initialization
========================================================= */
require_once locate_template('/init/shortcodes.php');    // Shortcodes
require_once locate_template('/init/constants.php');    // Initial theme setup and constants
require_once locate_template('/init/comments.php');    // Custom comments modifications
require_once locate_template('/init/scripts.php');    // Theme Scripts and Stylesheets
require_once locate_template('/init/helpers.php');   // All other custom functions
require_once locate_template('/init/cpt.php');      // Custom Post Types

/* Custom Login Screen
========================================================= */
function custom_login_screen() { ?>
  <style type="text/css">

  #login h1 a,
  .login h1 a {
    background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/LOGO.png); padding-bottom: 0px; background-size: 100%;  width: 100%; height: 160px;
  }

  </style>
<?php }
add_action( 'login_enqueue_scripts', 'custom_login_screen' );
