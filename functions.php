<?php

// ------------------------------------------
// Determining theme folders.
// ------------------------------------------
define( '_OPB_PARENT_DIR', get_template_directory() );
define( '_OPB_CHILD_DIR', get_stylesheet_directory() );

define( '_OPB_INCLUDES_DIR', _OPB_CHILD_DIR . '/inc' );


// ------------------------------------------
// Determining theme links.
// ------------------------------------------
define( '_OPB_PARENT_URI', get_template_directory_uri() );
define( '_OPB_CHILD_URI', get_stylesheet_directory_uri() );


// ------------------------------------------
// Include library files.
// ------------------------------------------
require_once ( _OPB_INCLUDES_DIR . '/functions.php' );
require_once ( _OPB_INCLUDES_DIR . '/template-functions.php' );
require_once ( _OPB_INCLUDES_DIR . '/template-hooks.php' );