<?php
/**
 * @package Buffet
 * @subpackage API
 */

// Remove existing actions
remove_action('wp_head', 'pagenavi_css');
remove_action('wp_head', 'wp_generator');

// Header Actions
add_action('bf_head', 'bf_canonical_url');

// Admin Actions
if ( is_admin() ) {
	add_action('admin_menu', 'bf_addmenu');
	add_action('wp_dashboard_setup', 'bf_add_dashboard');
}

// Page Navigation
add_action('bf_below_index_news', 'bf_add_pagenav');
add_action('bf_below_archive_posts', 'bf_add_pagenav');
add_action('bf_below_search_posts', 'bf_add_pagenav');

// Breadcrumbs
add_action('init', 'bf_add_breadcrumbs_js');
add_action('bf_jquery', 'bf_add_breadcrumbs_jquery');

add_action('bf_above_index_news', 'bf_add_breadcrumbs');
add_action('bf_above_archive_posts', 'bf_add_breadcrumbs');
add_action('bf_above_post', 'bf_add_breadcrumbs');

// Author Information
add_action('bf_below_post', 'bf_author_information');

// Dropdown Menus
add_action('init', 'bf_add_superfish_js');
add_action('bf_jquery', 'bf_add_superfish_jquery');

// Override WordPress Filters
add_filter('gallery_style', 'remove_gallery_css');

// WordPress MU / BuddyPress Specific Hooks
if ( bf_detect_wpmu() ) {
	add_action('wpmu_options', 'bf_wpmu_options_form');
	add_action('update_wpmu_options', 'bf_wpmu_update_options');
}

/* End of file launcher.php */
/* Location: ./includes/launcher.php */
