<?php
/*
Plugin Name: NextGEN Public Uploader
Plugin URI: http://webdevstudios.com/support/wordpress-plugins/nextgen-public-uploader/
Description: NextGEN Public Uploader is an extension to NextGEN Gallery which allows frontend image uploads for your users.
Version: 1.6.1
Author: WebDevStudios
Author URI: http://webdevstudios.com

Copyright 2009 WebDevStudios  (email : contact@webdevstudios.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*
== Changelog ==

= V1.6.1 - 4.25.2011 =
* Security Patch (QuickFix): Adds random hash to images held for moderation. (Thanks to Linus-Neumann.de)

= V1.6 - 1.30.2010 =
* Updates: Added localization
* Updates: Displays gallery name in TinyMCE

= V1.5 - 12.7.2009 =
* New Feature: TinyMCE Button
* Bugfix: Widget Uploader
* Updates: Settings Page

= V1.4 - 11.5.2009 =
* New Feature: Image Description
* Updates: More options available via settings page
* Updates: Default Gallery Drop-down
* Updates: Added button to reset default values
* Updates: Edit more text areas from settings page
* Bugfix: Fixed bug when saving options

= V1.3 - 10.20.2009 =
* New Feature: Widget Uploader
* New Feature: Select which user level can upload
* Fixed: More than one form can be displayed
* Updates: More options available via settings page
* Updates: Readme.txt updated
* Updates: Check if NextGEN Gallery exists optimized
* Bugfix: Saving options with WPMU

= V1.2.2 - 10.7.2009 =
* New Feature: Ability to edit messages displayed

= V1.2.1 - 10.7.2009 =
* Bugfix: 404 File not found

= V1.2 - 10.7.2009 =
* Updates: Options page updated
* Updates: Readme.txt updated

= V1.1 - 10.5.2009 =
* Fixed: SVN repository

= V1.0 - 10.5.2009 =
* NextGEN Public Uploader is launched

*/

// Define current version.
define( 'NG_PUBLIC_UPLOADER_VERSION', '1.6.1' );

/*** 
 * Define the path and url of the CollabPress plugins directory. 
 * It is important to use plugins_url() core function to obtain 
 * the correct scheme used (http or https). 
 */
define( 'NG_PUBLIC_PLUGIN_DIR', WP_PLUGIN_DIR . '/nextgen-public-uploader' );
define( 'NG_PUBLIC_CP_PLUGIN_URL', plugins_url( $path = '/nextgen-public-uploader' ) );

// Function -> Display Error If NextGEN Gallery Doesn't Exist
function npu_error_message(){
	echo '<div class="error fade" style="background-color:red;"><p><strong>NextGEN Public Uploader requires NextGEN gallery in order to work. Please deactivate this plugin or activate <a href="http://wordpress.org/extend/plugins/nextgen-gallery/">NextGEN Gallery</a>.</strong></p></div>';
}
	
$plugins = get_option('active_plugins');
$required_plugin = 'nextgen-gallery/nggallery.php';
$debug_queries_on = FALSE;

// Does Nextgen Gallery Exist, If Yes Continue
if(class_exists('nggLoader') || in_array( $required_plugin , $plugins )) { 

	// Hook -> Add Settings Page
	add_action('admin_menu', 'npu_plugin_menu');

	// Function -> Add Settings Page
	function npu_plugin_menu() {
  		add_menu_page('NextGEN Public Uploader', 'Public Uploader', '8', 'nextgen-public-uploader', 'npu_plugin_options', WP_PLUGIN_URL.'/'.plugin_basename( dirname(__FILE__) ).'/images/npu.png');
  		$plugin = plugin_basename(__FILE__); 
		add_filter( 'plugin_action_links_' . $plugin, 'filter_plugin_actions' );
	}
	
	// Hook -> Add Options
	add_option('npu_default_gallery', 1);
	add_option('npu_email_option', '');
	add_option('npu_notification_email', get_option('admin_email'));
	add_option('npu_upload_button', '');
	add_option('npu_description_text', '');
	add_option('npu_notlogged', '');
	add_option('npu_upload_success', '');
	add_option('npu_no_file', '');
	add_option('npu_upload_failed', '');
	add_option('npu_widget_uploader_select', 'Enabled');
	add_option('npu_exclude_select', 'Enabled');
    add_option('npu_user_role_select', 0);
	add_option('npu_image_description_select', 'Disabled');
	add_option('npu_image_linklove_select', 'Disabled');

	// Function -> Update Uptions
	function npu_update_options() {
	update_option('npu_default_gallery', $_POST['npu_default_gallery']);
	update_option('npu_email_option', $_POST['npu_email_option']);
	update_option('npu_notification_email', $_POST['npu_notification_email']);
	update_option('npu_upload_button', $_POST['npu_upload_button']);
	update_option('npu_description_text', $_POST['npu_description_text']);
	update_option('npu_notlogged', $_POST['npu_notlogged']);
	update_option('npu_upload_success', $_POST['npu_upload_success']);
	update_option('npu_no_file', $_POST['npu_no_file']);
	update_option('npu_upload_failed', $_POST['npu_upload_failed']);
	update_option('npu_widget_uploader_select', $_POST['npu_widget_uploader_select']);
	update_option('npu_exclude_select', $_POST['npu_exclude_select']);
    update_option('npu_user_role_select', $_POST['npu_user_role_select']);
	update_option('npu_image_description_select', $_POST['npu_image_description_select']);
	update_option('npu_image_linklove_select', $_POST['npu_image_linklove_select']);
	}
	
    function npu_restore_options() {
	update_option('npu_default_gallery', 1);
	update_option('npu_email_option', '');
	update_option('npu_notification_email', get_option('admin_email'));
	update_option('npu_upload_button', '');
	update_option('npu_description_text', '');
	update_option('npu_notlogged', '');
	update_option('npu_upload_success', '');
	update_option('npu_no_file', '');
	update_option('npu_upload_failed', '');
	update_option('npu_widget_uploader_select', 'Enabled');
	update_option('npu_exclude_select', 'Enabled');
    update_option('npu_user_role_select', 0);
	update_option('npu_image_description_select', 'Disabled');
	update_option('npu_image_linklove_select', 'Disabled');
	}

	// Function -> Settings Page
	function npu_plugin_options() { ?>
    
    <?php
	
	if ( current_user_can('manage_options') ) { 
	
	if (isset($_POST['Submit'])) {
			npu_update_options();
			echo "<div class=\"updated\">\n"
				. "<p>"
					. "<strong>"
					. __('Settings saved.')
					. "</strong>"
				. "</p>\n"
				. "</div>\n";
	
		} 
	
		if (isset($_POST['Restore'])) {
			npu_restore_options();
			echo "<div class=\"updated\">\n"
				. "<p>"
					. "<strong>"
					. __('Default settings restored.')
					. "</strong>"
				. "</p>\n"
				. "</div>\n";
	
		}
	}

	?>

		<div class="wrap">
        	<div class="icon32" id="icon-options-general"><br/></div>
        	
				<h2>NextGEN Public Uploader</h2>
        		<p><strong><?php _e('Author', 'ngg-public-uploader') ?>:</strong> <a href="http://webdevstudios.com">WebDevStudios</a></p>
        		<p><strong><?php _e('Current Version', 'ngg-public-uploader') ?>:</strong> <?php echo NG_PUBLIC_UPLOADER_VERSION ?></p>
        		<p><strong><?php _e('Shortcode Examples', 'ngg-public-uploader') ?>: </strong><code>[ngg_uploader]</code> or <code>[ngg_uploader id = 1]</code></p>
				<p><strong><a href="http://webdevstudios.com/support/wordpress-plugins/nextgen-public-uploader/"><?php _e('Visit The Plugin Homepage', 'ngg-public-uploader') ?></a></strong></p>
				<p><strong><a href="http://webdevstudios.com/support/forum/nextgen-public-uploader/"><?php _e('Visit The Support Forum', 'ngg-public-uploader') ?></a></strong></p>
				<p><strong><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3084056"><?php _e('Donate To This Plugin', 'ngg-public-uploader') ?></a></strong></p>
				
				<form method="post">
        			<input type="hidden" name="action" value="update" />
					<?php wp_nonce_field('update-options'); ?>
        			<input type="hidden" name="npu_update_options" value="1">
					<table class="form-table">
        				<?php
        				include_once (NGGALLERY_ABSPATH."lib/ngg-db.php");
        				$nggdb = new nggdb();
        				$gallerylist = $nggdb->find_all_galleries('gid', 'DESC');
						?>
						<tr valign="top">
							<th scope="row"><?php _e('Default Gallery ID', 'ngg-public-uploader') ?>:</th>
							<td>
        						<select name="npu_default_gallery">
        							<option selected><?php echo get_option('npu_default_gallery'); ?></option>
        							<?php 
        							foreach ($gallerylist as $gallery) {
        								$name = ( empty($gallery->title) ) ? $gallery->name : $gallery->title; ?>
        								<?php if (get_option('npu_default_gallery') != $gallery->gid) { ?>
        									<option <?php selected($gallery->gid , $gal_id); ?> value="<?php echo $gallery->gid; ?>"><?php _e($gallery->gid,'nggallery'); ?></option>
        								<?php } ?>
        							<?php } ?>
        						</select>
        						<span class="description"><?php _e('Select the default gallery ID when using', 'ngg-public-uploader') ?> [ngg_uploader].</span>
        					</td>
						</tr>
        
        				<tr valign="top">
							<th scope="row"><?php _e('Widget Uploader', 'ngg-public-uploader') ?>: </th>
							<td>
								<select name="npu_widget_uploader_select">
									<option selected><?php echo get_option('npu_widget_uploader_select'); ?></option>
        								<?php if (get_option('npu_widget_uploader_select') != "Enabled") { ?><option value="Enabled">Enabled</option><?php } ?>
										<?php if (get_option('npu_widget_uploader_select') != "Disabled") { ?><option value="Disabled">Disabled</option><?php } ?>
								</select>
        						<span class="description"><?php _e('Enable or disable the widget uploader.', 'ngg-public-uploader') ?></span>
        					</td>
						</tr>
        
        				<tr valign="top">
							<th scope="row"><?php _e('Description Field', 'ngg-public-uploader') ?>: </th>
							<td>
								<select name="npu_image_description_select">
									<option selected><?php echo get_option('npu_image_description_select'); ?></option>
	        						<?php if (get_option('npu_image_description_select') != "Enabled") { ?><option value="Enabled"><?php _e('Enabled', 'ngg-public-uploader') ?></option><?php } ?>
									<?php if (get_option('npu_image_description_select') != "Disabled") { ?><option value="Disabled"><?php _e('Disabled', 'ngg-public-uploader') ?></option><?php } ?>
								</select>
        						<span class="description"><?php _e('Enable or disable upload description field.', 'ngg-public-uploader') ?></span>
	        				</td>
						</tr>
        
        				<?php 
		
						if (get_option('npu_user_role_select') == 99) {
							$npu_selected_user_role = "Visitor";
						} else if (get_option('npu_user_role_select') == 0) {
							$npu_selected_user_role = "Subscriber";
						} else if (get_option('npu_user_role_select') == 1) {
							$npu_selected_user_role = "Contributer";
						} else if (get_option('npu_user_role_select') == 2) {
							$npu_selected_user_role = "Author";
						} else if (get_option('npu_user_role_select') == 7) {
							$npu_selected_user_role = "Editor";
						} else if (get_option('npu_user_role_select') == 10) {
							$npu_selected_user_role = "Admin";
						}
		
						?>
        
        				<tr valign="top">
							<th scope="row"><?php _e('Minimum User Role', 'ngg-public-uploader') ?>: </th>
							<td>
        						<select name="npu_user_role_select">
									<option selected value="<?php echo get_option('npu_user_role_select'); ?>"><?php echo $npu_selected_user_role; ?></option>
        							<?php if (get_option('npu_user_role_select') != 99) { ?><option value="99"><?php _e('Visitor', 'ngg-public-uploader') ?></option><?php } ?>
									<?php if (get_option('npu_user_role_select') != 0) { ?><option value="0"><?php _e('Subscriber', 'ngg-public-uploader') ?></option><?php } ?>
									<?php if (get_option('npu_user_role_select') != 1) { ?><option value="1"><?php _e('Contributer', 'ngg-public-uploader') ?></option><?php } ?>
									<?php if (get_option('npu_user_role_select') != 2) { ?><option value="2"><?php _e('Author', 'ngg-public-uploader') ?></option><?php } ?>
									<?php if (get_option('npu_user_role_select') != 7) { ?><option value="7"><?php _e('Editor', 'ngg-public-uploader') ?></option><?php } ?>
									<?php if (get_option('npu_user_role_select') != 10) { ?><option value="10"><?php _e('Admin', 'ngg-public-uploader') ?></option><?php } ?>
								</select>
        						<span class="description"><?php _e('Select the minimum required user role for image uploading.', 'ngg-public-uploader') ?></span>
        					</td>
						</tr>
        
						<tr valign="top">
							<th scope="row"><?php _e('Notification Email', 'ngg-public-uploader') ?>:</th>
							<td>
        						<input type="text" name="npu_notification_email" value="<?php echo get_option('npu_notification_email'); ?>" />
        						<span class="description"><?php _e('Enter an email address to be notified when a image has been submitted.', 'ngg-public-uploader') ?></span>
        					</td>
						</tr>
		
						<tr valign="top">
							<th scope="row"><?php _e('Upload Button', 'ngg-public-uploader') ?>:</th>
							<td>
        						<input type="text" name="npu_upload_button" value="<?php echo get_option('npu_upload_button'); ?>" />
        						<span class="description"><?php _e('Customize text for upload button.', 'ngg-public-uploader') ?></span>
        					</td>
						</tr>
		
						<tr valign="top">
							<th scope="row"><?php _e('Description Text', 'ngg-public-uploader') ?>:</th>
							<td>
        						<input type="text" name="npu_description_text" value="<?php echo get_option('npu_description_text'); ?>" />
        						<span class="description"><?php _e('Message displayed for image description.', 'ngg-public-uploader') ?></span>
        					</td>
						</tr>

						<tr valign="top">
							<th scope="row"><?php _e('Not Authorized', 'ngg-public-uploader') ?>:</th>
							<td>
        						<input type="text" name="npu_notlogged" value="<?php echo get_option('npu_notlogged'); ?>" />
        						<span class="description"><?php _e('Message displayed when a user does not have permission to upload.', 'ngg-public-uploader') ?></span>
        					</td>
						</tr>

						<tr valign="top">
							<th scope="row"><?php _e('Upload Success', 'ngg-public-uploader') ?>:</th>
							<td>
        						<input type="text" name="npu_upload_success" value="<?php echo get_option('npu_upload_success'); ?>" />
        						<span class="description"><?php _e('Message displayed when an image has been successfully uploaded.', 'ngg-public-uploader') ?></span>
        					</td>
						</tr>

						<tr valign="top">
							<th scope="row"><?php _e('No File', 'ngg-public-uploader') ?>:</th>
							<td>
        						<input type="text" name="npu_no_file" value="<?php echo get_option('npu_no_file'); ?>" />
        						<span class="description"><?php _e('Message displayed when no file has been selected.', 'ngg-public-uploader') ?></span>
        					</td>
						</tr>

						<tr valign="top">
							<th scope="row"><?php _e('Upload Failed', 'ngg-public-uploader') ?>:</th>
							<td>
        						<input type="text" name="npu_upload_failed" value="<?php echo get_option('npu_upload_failed'); ?>" />
        						<span class="description"><?php _e('Message displayed when an upload has failed.', 'ngg-public-uploader') ?></span>
        					</td>
						</tr>
        
        				<tr valign="top">
							<th scope="row"><?php _e('Exclude Uploaded Images', 'ngg-public-uploader') ?>: </th>
							<td>
								<select name="npu_exclude_select">
									<option selected><?php echo get_option('npu_exclude_select'); ?></option>
        							<?php if (get_option('npu_exclude_select') != "Enabled") { ?><option value="Enabled">Enabled</option><?php } ?>
									<?php if (get_option('npu_exclude_select') != "Disabled") { ?><option value="Disabled">Disabled</option><?php } ?>
								</select>
        						<span class="description"><?php _e('Enable or disable images flagged as excluded.', 'ngg-public-uploader') ?></span>
        					</td>
						</tr>
        
        				<tr valign="top">
							<th scope="row"><?php _e('Link Love', 'ngg-public-uploader') ?>: </th>
							<td>
								<select name="npu_image_linklove_select">
									<option selected><?php echo get_option('npu_image_linklove_select'); ?></option>
        							<?php if (get_option('npu_image_linklove_select') != "Enabled") { ?><option value="Enabled">Enabled</option><?php } ?>
									<?php if (get_option('npu_image_linklove_select') != "Disabled") { ?><option value="Disabled">Disabled</option><?php } ?>
								</select>
        						<span class="description"><?php _e('If you love this plugin link to us in your footer.', 'ngg-public-uploader') ?></span>
        					</td>
						</tr>
	
					</table>

					<input type="hidden" name="action" value="update" />
					<input type="hidden" name="npu_page_options" value="npu_default_gallery, npu_email_option, npu_notification_email, npu_notlogged, npu_upload_success, npu_no_file, npu_upload_failed, npu_widget_uploader_select, npu_exclude_select, npu_user_role_select, npu_image_description_select, npu_image_linklove_select, npu_upload_button, npu_description_text" />

					<p class="submit"><input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" /></p>
        
				</form>
        
				<form name="Restore" method="post">
					<?php wp_nonce_field('restore-options') ?>
					<p><strong><?php _e('Restore Default Settings', 'ngg-public-uploader') ?></strong></p>
					<div>
            			<input type="submit" class="button" name="Restore" value="<?php _e('Reset Options') ;?>" onclick="javascript:check=confirm('<?php _e('WARNING: This will restore all default settings.\n\nChoose [Cancel] to Stop, [OK] to proceed.\n'); ?>');if(check==false) return false;" />
            		</div>
				</form>
        
		</div>

	<?php
}
	
	// Upload Form Path
	require_once(dirname (__FILE__). '/inc/npu-upload.php');
		
	// TinyMCE
	define('nextgenPublicUpload_ABSPATH', WP_PLUGIN_DIR.'/'.plugin_basename( dirname(__FILE__) ).'/' );
	define('nextgenPublicUpload_URLPATH', WP_PLUGIN_URL.'/'.plugin_basename( dirname(__FILE__) ).'/' );
	include_once (dirname (__FILE__)."/tinymce/tinymce.php");
	// End TinyMCE
		
	
	// NextGEN Public Uploader Link Love
	function npu_link_love() {
	?><p><a href="http://wordpress.org/extend/plugins/nextgen-public-uploader/">NextGEN Public Uploader</a> by <a href="http://www.webdevstudios.com/">WebDevStudios</a></p><?php
	}

	if(get_option('npu_image_linklove_select') == 'Enabled') {
		add_action('wp_footer', 'npu_link_love');
	}
	
	// Add Settings Link -> Plugins Page
	function filter_plugin_actions ( $links ) { 
		$settings_link = '<a href="options-general.php?page=nextgen-public-uploader">Settings</a>'; 
		array_unshift ( $links, $settings_link ); 
		return $links;
	}

} else {
	
	// Display Error Message
	add_action( 'admin_notices', 'npu_error_message');
	
}

?>
