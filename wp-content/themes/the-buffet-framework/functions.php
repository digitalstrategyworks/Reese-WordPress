<?php
// Load jQuery
wp_enqueue_script('jquery');

// Load theme localization
load_theme_textdomain('buffet');

$theme_data = get_theme( get_current_theme() );

// Define PHP file constants.
define( BF_DIR, TEMPLATEPATH );
define( BF_LIB, BF_DIR . '/includes' );
define( THEME_VERSION, $theme_data['Version'] );

// Not sure whether the filter will work.
define( THEME_ID, apply_filters('bf_theme_id', 'buffet') );

// Load library files.
require_once BF_LIB . '/core.php';
require_once BF_LIB . '/actions.php';
require_once BF_LIB . '/filters.php';
require_once BF_LIB . '/helpers.php';
require_once BF_LIB . '/template.php';
require_once BF_LIB . '/widgets.php';

// Load theme options.
require_once BF_LIB . '/options.php';
bf_flush_options();

// Load admin files.
if ( is_admin() ) require_once BF_LIB . '/admin.php';

// Load extensions.
require_once BF_LIB . '/extensions.php';
require_once BF_LIB . '/extensions/default-extensions.php';

// Finally, load the launcher.
require_once BF_LIB . '/launcher.php';

// Not sure if this action will be useful here.
// The extensions file is using this though.
do_action('bf_init');

/* End of file functions.php */
/* Location: ./functions.php */