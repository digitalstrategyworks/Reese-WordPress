<?php

/**

 * @package Buffet

 * @subpackage API

 */



/**

 * {@internal Missing Short Description }}

 * 

 * {@internal Missing Long Description }}

 * 

 * @ignore

 * @since	0.5.2

 */

function bf_addmenu() {

	if ( bf_detect_wpmu() ) {	

		if ( is_site_admin() || get_site_option('bf_wpmu_enable_options') ) {

			$page = add_theme_page( __('Options', 'buffet'), __('Options', 'buffet'), 'edit_themes', 'bf-options', 'bf_admin' );

		

			add_action('admin_print_scripts-'.$page, 'bf_admin_scripts');

			add_action('admin_print_styles-'.$page, 'bf_admin_styles');

		}

	} else {

		$page = add_theme_page( __('Options', 'buffet'), __('Options', 'buffet'), 'edit_themes', 'bf-options', 'bf_admin' );

		

		add_action('admin_print_scripts-'.$page, 'bf_admin_scripts');

		add_action('admin_print_styles-'.$page, 'bf_admin_styles');

	}

}



/**

 * {@internal Missing Short Description }}

 * 

 * {@internal Missing Long Description }}

 * 

 * @hook	action	bf_above_admin_content

 * @hook	action	bf_below_admin_content

 * 

 * @hook	action	bf_admin_$name

 * @hook	action	bf_admin_load_$submit

 * @since	0.5.2

 */

function bf_admin() {

	global $bf_options, $wpdb;

	

	if ( isset($_GET['page']) && $_GET['page'] == 'bf-options' ) {

		//print_r($_POST);

		

		foreach ( bf_allowed_submit_values() as $submit_value ) {

			if ( isset($_REQUEST[$submit_value]) ) {

				// Check whether form is submitted from WP admin itself

				if ( !wp_verify_nonce($_REQUEST['_wpnonce'], 'bf-admin') ) {

					die('Security Error');	

				}

				do_action("bf_admin_load_{$submit_value}");

			}	

		}

		

		$nonce = wp_create_nonce('bf-admin'); // create nonce token for security

?>

		<div class="wrap clearfix">

		<?php do_action('bf_above_admin_content') ?>

		

		<h2 id="bf-header"><?php printf( __('%s Options', 'buffet'), get_current_theme() ) ?></h2>

		</div>

		

		<p id="bf-help-links">

		<?php bf_admin_help_links() ?>

		</p>

		

		<form id="bf-settings-form" method="post" action="themes.php?page=bf-options&_wpnonce=<?php echo $nonce ?>">

		

		<ul id="bf-tabs" class="clearfix">

			<?php $tabs = array_merge( bf_admin_tabs(), array('reset' => __('Reset', 'buffet') ) );

			foreach ( $tabs as $id => $name ) : ?>

			<li><a href="#<?php echo $id ?>"><?php echo $name ?></a></li>

			<?php endforeach ?>

		</ul>

		

		<?php 

		foreach ( $tabs as $id => $name ) {

			echo '<div id="' . $id . '" class="padding-content">';

			do_action("bf_admin_{$id}");

			echo '</div>';

		}

		

		$hooks = bf_get_option('hooks'); 

		?>

		

		</form><!-- #bf-settings-form -->

		

		<?php do_action('bf_below_admin_content') ?>

		

		</div><!-- .wrap -->

<?php

	}

}



// Admin action hooks

add_action('bf_admin_load_save', 'bf_admin_load_save');

add_action('bf_admin_load_reset', 'bf_admin_load_reset');



/**

 * {@internal Missing Short Description }}

 * 

 * {@internal Missing Long Description }}

 * 

 * @ignore

 * @since	0.5.2

 */

function bf_admin_load_save() {

	global $bf_options;

	

	$bf_options->save_options();

	bf_update_options();

	

	echo '<div class="updated"><p>' . __('Your settings have been saved to the database.', 'buffet') . '</p></div>';

}



/**

 * {@internal Missing Short Description }}

 * 

 * {@internal Missing Long Description }}

 * 

 * @ignore

 * @since	0.5.2

 */

function bf_admin_load_reset() {

	delete_option(THEME_ID . '_options');

	bf_flush_options();

	echo '<div class="updated"><p>' . __('Your settings have been reverted to the defaults.', 'buffet') . '</p></div>';	

}



/**

 * {@internal Missing Short Description }}

 * 

 * {@internal Missing Long Description }}

 * 

 * @hook	filter	bf_allowed_submit_values

 * @since	0.5.2

 * @return	array	Default submit values to be validated

 */

function bf_allowed_submit_values() {

	$_default_values = array('save', 'reset');

	return apply_filters('bf_allowed_submit_values', $_default_values);

}



/**

 * {@internal Missing Short Description }}

 * 

 * {@internal Missing Long Description }}

 * 

 * @ignore

 * @since	0.5.2

 */

function bf_admin_scripts() {

	//wp_deregister_script('jquery');

	//wp_enqueue_script('jquery', get_template_directory_uri() . '/includes/js/jquery-1.3.2.min.js', null, '1.3.2');

	

	//wp_enqueue_script('jquery-ui-core');

	//wp_enqueue_script('jquery-ui-tabs', null, , null, false );

	

	//wp_enqueue_script( 'jquery-ui-tabs', null, array('jquery', 'jquery-ui-core'), false );

	wp_enqueue_script('bf-admin-js', get_template_directory_uri() . '/includes/js/admin.js', array('jquery', 'jquery-ui-core', 'jquery-ui-tabs'), null, false);

}



/**

 * {@internal Missing Short Description }}

 * 

 * {@internal Missing Long Description }}

 * 

 * @ignore

 * @since	0.5.4

 */

function _bf_admin_add_jquery() {

?>

	<script type="text/javascript">

	jQuery(document).ready( function($) {

		$('#bf-tabs').tabs();

	});

	</script>

<?php

}



/**

 * {@internal Missing Short Description }}

 * 

 * {@internal Missing Long Description }}

 * 

 * @ignore

 * @since	0.5.2

 */

function bf_admin_styles() {

	wp_enqueue_style('bf-admin', get_template_directory_uri() . '/css/admin.css');

}



/**

 * {@internal Missing Short Description }}

 * 

 * {@internal Missing Long Description }}

 * 

 * @ignore

 * @since	0.5.2

 */

function bf_add_dashboard() {

	wp_add_dashboard_widget( 'widget-arras', __('zy.sg - Developer\'s Blog', 'buffet'), 'bf_dashboard_widget', null );

}



/**

 * {@internal Missing Short Description }}

 * 

 * {@internal Missing Long Description }}

 * 

 * @ignore

 * @since	0.5.2

 */

function bf_dashboard_widget() {

	$rss = @fetch_rss( bf_dashboard_rss_url() );

	if ( is_array($rss->items) ) $rss->items = array_slice($rss->items, 0, 5);

	wp_widget_rss_output( $rss, array('show_author' => false, 'show_date' => true, 'show_summary' => false) );

}



/**

 * bf_dashboard_rss_url() - Dashboard RSS URL

 * 

 * Returns the RSS feed link that is used in the dashboard.

 * You can override this using the <b>bf_dashboard_rss_url</b> filter.

 * 

 * {@internal Missing Long Description }}

 * 

 * @hook	filter	bf_dashboard_rss_url

 * @since	0.5.2

 */

function bf_dashboard_rss_url() {

	$url = 'http://www.zy.sg/category/wordpress/feed/';

	return apply_filters('bf_dashboard_rss_url', $url);

}



/**

 * {@internal Missing Short Description }}

 * 

 * {@internal Missing Long Description }}

 * 

 * @hook	filter	bf_admin_tabs

 * @since	0.5.2

 */

function bf_admin_tabs() {

	$_default_tabs = array(

		'general'		=>	__('General', 'buffet'),

		'categories'	=>	__('Categories', 'buffet'),

		'navigation'	=>	__('Navigation', 'buffet'),

		'layout'		=>	__('Layout', 'buffet'),

		'design'		=>	__('Design', 'buffet')

	);	

	

	return apply_filters('bf_admin_tabs', $_default_tabs);

}



add_action('bf_admin_general', 'bf_admin_general_form');

add_action('bf_admin_categories', 'bf_admin_categories_form');

add_action('bf_admin_navigation', 'bf_admin_navigation_form');

add_action('bf_admin_layout', 'bf_admin_layout_form');

add_action('bf_admin_design', 'bf_admin_design_form');

add_action('bf_admin_reset', 'bf_admin_reset_form');



/**

 * {@internal Missing Short Description }}

 * 

 * {@internal Missing Long Description }}

 * 

 * @hook	action	bf_admin_general_form

 * @since	0.5.2

 */

function bf_admin_general_form() {

	?>

	<h3><?php _e('RSS Feeds', 'buffet') ?></h3>

	<table class="form-table">

	

	<tr valign="top">

	<th scope="row"><label for="bf-rss-feed-url"><?php _e('RSS Feed (URL)', 'buffet') ?></label></th>

	<td>

	<?php echo bf_form_input(array('name' => 'bf-rss-feed-url', 'id' => 'bf-rss-feed-url', 'class' => 'code', 'size' => '65', 'value' => bf_get_option('feed_url') )) ?><br />

	<?php _e('This will replace the default WordPress RSS feed to this. Useful if you have decided to use third-party services like <a href="http://feedburner.google.com/">Feedburner</a>.', 'buffet') ?>

	</td>

	</tr>

	

	<tr valign="top">

	<th scope="row"><label for="bf-rss-comments-url"><?php _e('RSS Comments Feed (URL)', 'buffet') ?></label></th>

	<td>

	<?php echo bf_form_input(array('name' => 'bf-rss-comments-url', 'id' => 'bf-rss-comments-url', 'class' => 'code', 'size' => '65', 'value' => bf_get_option('comments_feed_url') )) ?><br />

	<?php _e('This will replace the default WordPress RSS comments feed to this. Useful if you have decided to use third-party services like <a href="http://feedburner.google.com/">Feedburner</a>.', 'buffet') ?>

	</td>

	</tr>

	

	</table>

	

	<h3><?php _e('Footer Information', 'buffet') ?></h3>

	<table class="form-table">

	

	<tr valign="top">

	<th scope="row"><label for="bf-footer-message"><?php _e('Footer Message', 'buffet') ?></label></th>

	<td>

	<?php echo bf_form_textarea( 'bf-footer-message', form_prep(stripslashes(bf_get_option('footer_message'))), 'style="width: 70%; height: 100px;" class="code"' ) ?><br />

	<?php _e('Usually your website\'s copyright information would go here.<br /> It would be great if you could include a link to WordPress and even greater if you could include a link to the theme website. :)', 'buffet') ?>

	</td>

	</tr>

	

	</table>

	

	<?php do_action('bf_admin_general_form') ?>

	

	<p class="submit">

	<input class="button-primary" type="submit" name="save" value="<?php _e('Save Changes', 'buffet') ?>" />

	</p>

	<?php

}



/**

 * {@internal Missing Short Description }}

 * 

 * {@internal Missing Long Description }}

 * 

 * @hook	action	bf_admin_categories_form

 * @since	0.5.2

 */

function bf_admin_categories_form() {

	$cats = array('0' => 'None');

	foreach( get_categories('hide_empty=0') as $c ) {

		$cats[(string)$c->cat_ID] = $c->cat_name;

	}

	?>

	<h3><?php _e('Categories', 'buffet') ?></h3>

	<table class="form-table">

	

	<tr valign="top">

	<th scope="row"><label for="bf-cat-featured"><?php _e('Featured Category', 'buffet') ?></label></th>

	<td>

	<?php echo bf_form_dropdown('bf-cat-featured', array('sticky_posts' => 'Stickied Posts', 'Available Categories' => $cats), bf_get_option('featured_cat') ); ?>

	<br /><?php _e('Articles from this category will be shown on the featured section of the index page. <br />You can also specify your stickied posts as the featured \'category\'.', 'buffet') ?>

	</td>

	</tr>

	

	<tr valign="top">

	<th scope="row"><label for="bf-cat-news"><?php _e('News Category', 'buffet') ?></label></th>

	<td>

	<?php echo bf_form_dropdown('bf-cat-news', $cats, bf_get_option('news_cat') ); ?>

	<br /><?php _e('The news category will be shown below the featured section in the index page.', 'buffet') ?>

	</td>

	</tr>

	

	<tr valign="top">

	<th scope="row"><label for="bf-cat-asides"><?php _e('Asides Category', 'buffet') ?></label></th>

	<td>

	<?php echo bf_form_dropdown('bf-cat-asides', $cats, bf_get_option('asides_cat') ); ?>

	</td>

	</tr>

	

	</table>

	

	<?php do_action('bf_admin_categories_form') ?>

	

	<p class="submit">

	<input class="button-primary" type="submit" name="save" value="<?php _e('Save Changes', 'buffet') ?>" />

	</p>

	<?php	

}



/**

 * {@internal Missing Short Description }}

 * 

 * {@internal Missing Long Description }}

 * 

 * @hook	action	bf_admin_navigation_form

 * @since	0.5.2

 */

function bf_admin_navigation_form() {

	$linkcats['0'] = __('None', 'buffet');

	foreach ( get_categories('type=link&hide_empty=0') as $c ) {

		$linkcats[$c->cat_ID] = $c->cat_name;

	}

	$pages['0'] = __('None', 'buffet');

	foreach ( get_pages() as $p ) {

		$pages[$p->ID] = $p->post_title;	

	}

	?>

	<h3><?php _e('Main Navigation / Breadcrumbs', 'buffet') ?></h3>

	<table class="form-table">

	

	<tr valign="top">

	<th scope="row"><label for="bf-nav-home"><?php _e('Home Link', 'buffet') ?></label></th>

	<td>

	<?php echo bf_form_input(array('name' => 'bf-nav-home', 'id' => 'bf-nav-home', 'style' => 'width:40%', 'value' => bf_get_option('home_link') )) ?>

	<br /><?php _e('You can change the name of the home link at the main navigation.', 'buffet') ?>

	</td>

	</tr>

	

	<tr valign="top">

	<th scope="row"><label for="bf-nav-home"><?php _e('Blog Link', 'buffet') ?></label></th>

	<td>

	<?php echo bf_form_input(array('name' => 'bf-nav-blog', 'id' => 'bf-nav-blog', 'style' => 'width:40%', 'value' => bf_get_option('blog_link') )) ?>

	<br /><?php _e('Used for breadcrumbs.', 'buffet') ?>

	</td>

	</tr>

	

	<tr valign="top">

	<th scope="row"><label for="bf-nav-singleparent"><?php _e('Parent Page for Blog Posts', 'buffet') ?></label></th>

	<td>

	<?php echo bf_form_dropdown('bf-nav-singleparent', $pages, bf_get_option('single_parent')); ?>

	<br /><?php _e('This adds another page in-between Home and the blog post.', 'buffet') ?>

	</td>

	</tr>

	

	<tr valign="top">

	<th scope="row"><label for="bf-nav-linkcat"><?php _e('Link Category', 'buffet') ?></label></th>

	<td>

	<?php echo bf_form_dropdown('bf-nav-linkcat', $linkcats, bf_get_option('topnav_linkcat')); ?>

	<br /><?php _e('By default, the theme will list all the available categories on the main navigation (besides the home link). 

	To organise and arrange the links in the top navigation, you can create a link category with all the links you want to display at the main navigation and assign the link category here.', 'buffet') ?>

	</td>

	</tr>

	

	</table>

	

	<?php do_action('bf_admin_navigation_form') ?>

	

	<p class="submit">

	<input class="button-primary" type="submit" name="save" value="<?php _e('Save Changes', 'buffet') ?>" />

	</p>

	<?php	

}



/**

 * {@internal Missing Short Description }}

 * 

 * {@internal Missing Long Description }}

 * 

 * @hook	action	bf_admin_layout_form

 * @since	0.5.2

 */

function bf_admin_layout_form() {

	?>

	<h3><?php _e('Author Information', 'buffet') ?></h3>

	<table class="form-table">

	

	<tr valign="top">

	<th scope="row" colspan="2">

	<?php echo bf_form_checkbox('bf-layout-display-author', 'show', bf_get_option('display_author'), 'id="bf-layout-display-author"') ?> 

	<label for="bf-layout-display-author"><?php _e('Display author information in single post', 'buffet') ?></label>

	</th>

	<td></td>

	</tr>

	

	</table>

	

	<?php do_action('bf_admin_layout_form') ?>

	

	<p class="submit">

	<input class="button-primary" type="submit" name="save" value="<?php _e('Save Changes', 'buffet') ?>" />

	</p>

	

	<?php	

}



/**

 * {@internal Missing Short Description }}

 * 

 * {@internal Missing Long Description }}

 * 

 * @hook	action	bf_admin_design_form

 * @since	0.5.2

 */

function bf_admin_design_form() {

	do_action('bf_admin_design_form');

	?>

	<p class="submit">

	<input class="button-primary" type="submit" name="save" value="<?php _e('Save Changes', 'buffet') ?>" />

	</p>

	<?php

}



/**

 * {@internal Missing Short Description }}

 * 

 * {@internal Missing Long Description }}

 * 

 * @hook	action	bf_admin_remove_form

 * @since	0.5.2

 */

function bf_admin_reset_form() {

?>

<h3><?php _e('Revert to Default Settings', 'buffet') ?></h3>

<p><?php _e('If you do screw up, you can reset the settings here.', 'buffet') ?></p>

<p><?php _e('<strong>NOTE: This will erase all your settings!</strong>', 'buffet') ?></p>

<p class="submit">

<input onclick="return confirm('<?php _e('Revert to default settings? This action cannot be undone!', 'buffet') ?>')" class="button-secondary" type="submit" name="reset" value="<?php _e('Uninstall / Reset Arras.Theme', 'buffet') ?>" />

</p>



<?php do_action('bf_admin_reset_form') ?>

	

<?php	

}



/**

 * bf_admin_help_links() - Help Links Function

 * 

 * Displays the links for theme support. You can override this using the <b>bf_admin_help_links</b> filter.

 * 

 * @hook	filter	bf_admin_help_links

 * @since	0.5.2

 */

function bf_admin_help_links() {

	$content = '<strong><a href="http://code.google.com/p/arras-buffet/">' .  __('Project Page', 'buffet') . '</a></strong> | ';

	$content .= '<strong><a href="http://www.zy.sg/">' . __("Developer's Blog", 'buffet') . '</a></strong>';

	

	echo apply_filters('bf_admin_help_links', $content);

}



/**

 * {@internal Missing Short Description }}

 * 

 * {@internal Missing Long Description }}

 * 

 * @since	0.5.3

 */

function bf_wpmu_options_form() {

?>

	<h3><?php _e('Buffet Framework WPMU Options', 'buffet') ?></h3>

	<p><?php _e('These options will only apply to themes using the Buffet Framework.', 'buffet') ?></p>

	<table class="form-table">

		<tr>

			<th scope="row"><label for="bf-wpmu-enable-options"><?php _e('Allow Access for Theme Options', 'buffet'); ?></label></th>

			<td><?php echo bf_form_checkbox('bf-wpmu-enable-options', 'show', get_site_option('bf_wpmu_enable_options'), 'id="bf-wpmu-enable-options"') ?>

			<?php _e('Tick to allow regular user accounts to access the theme options page.', 'buffet') ?></td>

		</tr>

		<tr>

			<th scope="row"><label for="bf-wpmu-enable-ext"><?php _e('Allow Access for Theme Extensions', 'buffet'); ?></label></th>

			<td><?php echo bf_form_checkbox('bf-wpmu-enable-ext', 'show', get_site_option('bf_wpmu_enable_ext'), 'id="bf-wpmu-enable-ext"') ?>

			<?php _e('Tick to allow regular user accounts to access the theme extensions page.', 'buffet') ?></td>

		</tr>

	</table>

<?php	

}



/**

 * {@internal Missing Short Description }}

 * 

 * {@internal Missing Long Description }}

 * 

 * @since	0.5.3

 */

function bf_wpmu_update_options() {

	update_site_option('bf_wpmu_enable_options', (boolean)$_POST['bf-wpmu-enable-options']);

	update_site_option('bf_wpmu_enable_ext', (boolean)$_POST['bf-wpmu-enable-ext']);

}



/* End of file admin.php */

/* Location: ./includes/admin.php */

