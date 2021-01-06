<?php

/*
Directory
- path to the current directory
 */
define('DIR', dirname(__FILE__));

// Load Composer’s autoloader
require_once (DIR . '/vendor/autoload.php');

/*
General Functions
- basic theme functions
 */

include_once(DIR . '/inc/general.php');
include_once(DIR . '/inc/actions.php');
include_once(DIR . '/inc/filters.php');
include_once(DIR . '/inc/helpers.php');
include_once(DIR . '/inc/post-types.php');
include_once(DIR . '/inc/gutenberg.php');
include_once(DIR . '/classes/OP_Walker_Nav.php');
