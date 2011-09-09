<?php
/**
 * Buffet Framework - Action Hooks
 * 
 * This file contains all the functions for the theme's actions hooks.
 * 
 * @package Buffet
 * @subpackage API
 */

/**
 * bf_head() - Buffet Framework action hook function
 * 
 * This template function is executed after wp_head(), in the <head> tag. 
 * The action hook <b>bf_head</b> allows you to add additional <meta> tags, or add any additional styles that will override the stylesheets declared in wp_head() hook.
 * 
 * The following example shows how to add an additional stylesheet using the action hook.
 * <code>
 * <?php
 * function mytheme_add_stylesheet() {
 * 	echo '<link rel="stylesheet" type="text/css" href="path/to/stylesheet" />';
 * }
 * add_action('bf_head', 'mytheme_add_stylesheet');
 * ?>
 * </code>
 * 
 * @hook	action bf_head
 * @see		bf_jquery()
 * @since	0.5.2
 */
function bf_head() {
	do_action('bf_head');
}

/**
 * bf_jquery() - Buffet Framework action hook function
 * 
 * This template function is executed inside the ready function of jQuery.
 * You can use the action hook <b>bf_jquery</b> if you wish to run additional jQuery commands before the page loads.
 * 
 * @hook	action bf_jquery
 * @link	http://docs.jquery.com/Main_Page
 * @see		bf_head()
 * @since	0.5.2 
 */
function bf_jquery() {
	do_action('bf_jquery');	
}

/**
 * bf_body() - Buffet Framework action hook function
 * 
 * This template function is executed right after the <body> tag.
 * You can add any codes into this area using the <b>bf_body</b> action hook.
 * 
 * @hook	action bf_body
 * @see		bf_above_content()
 * @see		bf_above_nav()
 * @since	0.5.2 
 */
function bf_body() {
	do_action('bf_body');	
}

/**
 * bf_above_content() - Buffet Framework action hook function
 * 
 * This template function is executed inside the main DIV container after the header.
 * The action hook <b>bf_above_content</b> can be used to add a notice box before all the content.
 * 
 * @hook	action	bf_above_content
 * @see		bf_body()
 * @see		bf_above_nav()
 * @since	0.5.2
 */
function bf_above_content() {
	do_action('bf_above_content');
}

/**
 * bf_below_content() - Buffet Framework action hook function
 * 
 * This template function is executed before the closing tag of the main DIV container.
 * The action hook <b>bf_below_content</b> can be used to add codes in the area.
 * 
 * @hook	action	bf_below_content
 * @see		bf_above_content()
 * @since	0.5.2
 */
function bf_below_content() {
	do_action('bf_below_content');	
}

/**
 * bf_above_nav() - Buffet Framework action hook function
 * 
 * This template function is executed right before the main navigation at the header.
 * You can add codes into this area using the <b>bf_above_nav</b> action hook.
 * 
 * @hook	action bf_above_nav
 * @see		bf_above_content()
 * @see		bf_below_nav()
 * @since	0.5.2
 */
function bf_above_nav() {
	do_action('bf_above_nav');
}

/**
 * bf_below_nav() - Buffet Framework action hook function
 * 
 * This template function is executed right after the main navigation at the header.
 * You can add codes into this area using the <b>bf_below_nav</b> action hook.
 * 
 * @hook	action bf_below_nav
 * @see		bf_above_content()
 * @see		bf_above_nav()
 * @since	0.5.2
 */
function bf_below_nav() {
	do_action('bf_below_nav');
}

/**
 * bf_above_post() - Buffet Framework action hook function
 * 
 * This template function is executed right before the post content, above its title.
 * You can add codes into this area using the <b>bf_above_post</b> action hook.
 * 
 * @hook	action bf_above_post
 * @see		bf_above_content()
 * @see		bf_above_nav()
 * @see		bf_below_post()
 * @since	0.5.2
 */
function bf_above_post() {
	do_action('bf_above_post');
}

/**
 * bf_below_post() - Buffet Framework action hook function
 * 
 * This template function is executed right after the post content, before the post comments.
 * You can add codes into this area using the <b>bf_below_post</b> action hook.
 * 
 * @hook	action bf_below_post
 * @see		bf_above_post()
 * @see		bf_below_comments()
 * @see		bf_before_footer()
 * @since	0.5.2
 */
function bf_below_post() {
	do_action('bf_below_post');
}

/**
 * bf_below_comments() - Buffet Framework action hook function
 * 
 * This template function is executed right after the comments, after the reply form.
 * You can add codes into this area using the <b>bf_below_comments</b> action hook.
 * 
 * @hook	action bf_below_comments
 * @see		bf_below_post()
 * @see		bf_before_footer()
 * @since	0.5.2
 */
function bf_below_comments() {
	do_action('bf_below_comments');
}

/**
 * bf_above_footer() - Buffet Framework action hook function
 * 
 * This template function is executed right after all the content, right before the footer.
 * You can add codes into this area using the <b>bf_before_footer</b> action hook.
 * 
 * @hook	action bf_above_footer
 * @see		bf_above_content()
 * @see		bf_footer()
 * @see		bf_below_comments()
 * @since	0.5.2
 */
function bf_above_footer() {
	do_action('bf_above_footer');
}

/**
 * bf_footer() - Buffet Framework action hook function
 * 
 * This template function is executed right before the closing <body> tag, after WordPress' wp_footer action hook.
 * You can add codes into this area using the <b>bf_footer</b> action hook.
 * 
 * @hook	action bf_footer
 * @see		bf_above_footer()
 * @since	0.5.2
 */
function bf_footer() {
	do_action('bf_footer');
}

/**
 * bf_above_index_news() - Buffet Framework action hook function
 * 
 * This template function is executed right before the news posts in the index page.
 * You can add codes into this area using the <b>bf_above_index_news</b> action hook.
 * 
 * @hook	action bf_above_index_news
 * @see		bf_below_index_news()
 * @since	0.5.2
 */
function bf_above_index_news() {
	do_action('bf_above_index_news');	
}

/**
 * bf_below_index_news() - Buffet Framework action hook function
 * 
 * This template function is executed right after the news posts in the index page.
 * You can add codes into this area using the <b>bf_below_index_news</b> action hook.
 * 
 * @hook	action bf_below_index_news
 * @see		bf_above_index_news()
 * @since	0.5.2
 */
function bf_below_index_news() {
	do_action('bf_below_index_news');	
}

/**
 * bf_above_primary_sidebar() - Buffet Framework action hook function
 * 
 * This template function is executed right before the primary sidebar in all pages.
 * You can add codes into this area using the <b>bf_above_primary_sidebar</b> action hook.
 * 
 * @hook	action bf_above_primary_sidebar
 * @see		bf_below_primary_sidebar()
 * @since	0.5.2
 */
function bf_above_primary_sidebar() {
	do_action('bf_above_primary_sidebar');	
}

/**
 * bf_above_primary_sidebar() - Buffet Framework action hook function
 * 
 * This template function is executed right before the primary sidebar in all pages.
 * You can add codes into this area using the <b>bf_above_primary_sidebar</b> action hook.
 * 
 * @hook	action bf_above_primary_sidebar
 * @see		bf_above_primary_sidebar()
 * @since	0.5.2
 */
function bf_below_primary_sidebar() {
	do_action('bf_below_primary_sidebar');	
}

/**
 * bf_above_secondary_sidebar() - Buffet Framework action hook function
 * 
 * This template function is executed right before the secondary sidebar in all pages.
 * You can add codes into this area using the <b>bf_above_secondary_sidebar</b> action hook.
 * 
 * @hook	action bf_above_secondary_sidebar
 * @see		bf_below_secondary_sidebar()
 * @since	0.5.2
 */
function bf_above_secondary_sidebar() {
	do_action('bf_above_secondary_sidebar');	
}

/**
 * bf_below_secondary_sidebar() - Buffet Framework action hook function
 * 
 * This template function is executed right after the secondary sidebar in all pages.
 * You can add codes into this area using the <b>bf_above_secondary_sidebar</b> action hook.
 * 
 * @hook	action bf_below_secondary_sidebar
 * @see		bf_above_secondary_sidebar()
 * @since	0.5.2
 */
function bf_below_secondary_sidebar() {
	do_action('bf_below_secondary_sidebar');	
}

/**
 * bf_above_archive_posts() - Buffet Framework action hook function
 * 
 * This template function is executed right before the posts in the archive page.
 * You can add codes into this area using the <b>bf_above_archive_posts</b> action hook.
 * 
 * @hook	action bf_below_archive_posts
 * @see		bf_below_archive_posts()
 * @since	0.5.2
 */
function bf_above_archive_posts() {
	do_action('bf_above_archive_posts');	
}

/**
 * bf_below_archive_posts() - Buffet Framework action hook function
 * 
 * This template function is executed right after the posts in the archive page.
 * You can add codes into this area using the <b>bf_below_archive_posts</b> action hook.
 * 
 * @hook	action bf_above_archive_posts
 * @see		bf_below_archive_posts()
 * @since	0.5.2
 */
function bf_below_archive_posts() {
	do_action('bf_below_archive_posts');	
}

/**
 * bf_above_search_posts() - Buffet Framework action hook function
 * 
 * This template function is executed right before the posts in the search page.
 * You can add codes into this area using the <b>bf_above_search_posts</b> action hook.
 * 
 * @hook	action bf_above_search_posts
 * @see		bf_below_search_posts()
 * @since	0.5.2
 */
function bf_above_search_posts() {
	do_action('bf_above_search_posts');	
}

/**
 * bf_below_search_posts() - Buffet Framework action hook function
 * 
 * This template function is executed right before the posts in the search page.
 * You can add codes into this area using the <b>bf_below_search_posts</b> action hook.
 * 
 * @hook	action bf_below_search_posts
 * @see		bf_above_search_posts()
 * @since	0.5.2
 */
function bf_below_search_posts() {
	do_action('bf_below_search_posts');	
}

/* End of file actions.php */
/* Location: ./includes/actions.php */
