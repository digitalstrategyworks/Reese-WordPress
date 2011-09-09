<?php 

/*

Plugin Name: Reese Post Fields
Plugin URI: http://reesenews.org/
Description: Add fields required for ReeseNews theme, a modified plugin
Author: Seth Wright
Version: 0.1
License: GPL
Author URI: http://www.sethawright.com/
Last change: 10.06.2011
*/

//avoid file direct calls
if ( !function_exists('add_action') ) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit();
}

if ( function_exists('add_action') ) {
	//wordpress define
	if ( !defined('WP_CONTENT_URL') )
        define('WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
    if ( !defined('WP_CONTENT_DIR') )
        define('WP_CONTENT_DIR', ABSPATH . 'wp-content');
    if ( !defined('WP_PLUGIN_URL') )
        define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
    if ( !defined('WP_PLUGIN_DIR') )
        define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');
    if ( !defined('PLUGINDIR') )
        define( 'PLUGINDIR', 'wp-content/plugins' ); // Relative to ABSPATH.  For back compat.
    if ( !defined('WP_LANG_DIR') )
        define('WP_LANG_DIR', WP_CONTENT_DIR . '/languages');

    // plugin definitions
    define( 'FB_DT_BASENAME', plugin_basename(__FILE__) );
    define( 'FB_DT_BASEDIR', dirname( plugin_basename(__FILE__) ) );
    define( 'FB_DT_TEXTDOMAIN', 'different-types' );
    
}

if ( !class_exists( 'DifferentType' ) ) {
    class DifferentType {

        // constructor
        function DifferentType() {

            if (is_admin() ) {
                add_action( 'admin_init', array(&$this, 'on_admin_init') );
                add_action( 'wp_insert_post', array(&$this, 'on_wp_insert_post'), 10, 2 );
                add_action( 'init', array(&$this, 'textdomain') );
                register_uninstall_hook( __FILE__, array(&$this, 'uninstall') );
                add_action( "admin_print_scripts-post.php", array($this, 'enqueue_script') );
                add_action( "admin_print_scripts-post-new.php", array($this, 'enqueue_script') );
                add_action( "admin_print_scripts-page.php", array($this, 'enqueue_script') );
                add_action( "admin_print_scripts-page-new.php", array($this, 'enqueue_script') );
            }
        }

        // active for multilanguage
        function textdomain() {

            if ( function_exists('load_plugin_textdomain') )
                load_plugin_textdomain( FB_DT_TEXTDOMAIN, false, dirname( FB_DT_BASENAME ) . '/languages' );
        }

        // unsintall all postmetadata
        function uninstall() {

            $all_posts = get_posts('numberposts=0&post_type=post&post_status=');

            foreach( $all_posts as $postinfo) {

                delete_post_meta($postinfo->ID, '_different-types');

            }
        }

        // add script
        function enqueue_script() {
            wp_enqueue_script( 'tinymce4dt', WP_PLUGIN_URL . '/' . FB_DT_BASEDIR . '/js/script.js', array('jquery') );
        }

        // admin init
        function on_admin_init() {

            if ( !current_user_can( 'publish_posts' ) )
                return;

            add_meta_box( 'different_types',
                                    __( 'ReeseNews Post Fields', FB_DT_TEXTDOMAIN ),
                                    array( &$this, 'meta_box' ),
                                    'post', 'normal', 'high'
                                    );
            
        }

        // check for preview
        function is_page_preview() {
            $id = (int)$_GET['preview_id'];
            if ($id == 0) $id = (int)$_GET['post_id'];
            $preview = $_GET['preview'];
            if ($id > 0 && $preview == 'true') {
                global $wpdb;
                $type = $wpdb->get_results("SELECT post_type FROM $wpdb->posts WHERE ID=$id");
                if ( count($type) && ($type[0]->post_type == 'page') && current_user_can('edit_page') )
                    return true;
            }
            return false;
        }

        // after save post, save meta data for plugin
        function on_wp_insert_post($id) {
            global $id;

            if ( !isset($id) )
                $id = (int)$_REQUEST['post_ID'];
            if ( $this->is_page_preview() && !isset($id) )
                $id = (int)$_GET['preview_id'];

            if ( !current_user_can('edit_post') )
                return;

            if ( isset($_POST['dt-heading']) && $_POST['dt-heading'] != '' )
                $this->data['home-featured-permalink'] = esc_attr( $_POST['dt-heading'] );
            if ( isset($_POST['dt-category-image']) && $_POST['dt-category-image'] != '' )
                $this->data['category-image'] = esc_attr( $_POST['dt-category-image'] );
            if ( isset($_POST['dt-additional-info']) && $_POST['dt-additional-info'] != '' )
                $this->data['subhead'] = $_POST['dt-additional-info'];
            if ( isset($_POST['dt-listdata']) && $_POST['dt-listdata'] != '' )
                $this->data['listdata'] = esc_attr( $_POST['dt-listdata'] );
            if ( isset($_POST['dt-story-photo']) && $_POST['dt-story-photo'] != '' )
                $this->data['story-photo'] = esc_attr( $_POST['dt-story-photo'] );
            if ( isset($_POST['dt-image-caption']) && $_POST['dt-image-caption'] != '' )
                $this->data['image-caption'] = esc_attr( $_POST['dt-image-caption'] );
            if ( isset($_POST['dt-story-video']) && $_POST['dt-story-video'] != '' )
                $this->data['story-video'] = $_POST['dt-story-video'];
           
            if ( isset($_POST['dt-sidebar-audio']) && $_POST['dt-sidebar-audio'] != '' )
                $this->data['sidebar-audio'] = $_POST['dt-sidebar-audio'];
            if ( isset($_POST['dt-sidebar-audio-title']) && $_POST['dt-sidebar-audio-title'] != '' )
                $this->data['sidebar-audio-title'] = esc_attr( $_POST['dt-sidebar-audio-title'] );
            if ( isset($_POST['dt-sidebar-audio-2']) && $_POST['dt-sidebar-audio-2'] != '' )
                $this->data['sidebar-audio-2'] = $_POST['dt-sidebar-audio-2'];
            if ( isset($_POST['dt-sidebar-audio-title-2']) && $_POST['dt-sidebar-audio-title-2'] != '' )
                $this->data['sidebar-audio-title-2'] = esc_attr( $_POST['dt-sidebar-audio-title-2'] );
            if ( isset($_POST['dt-sidebar-audio-3']) && $_POST['dt-sidebar-audio-3'] != '' )
                $this->data['sidebar-audio-3'] = $_POST['dt-sidebar-audio-3'];
            if ( isset($_POST['dt-sidebar-audio-title-3']) && $_POST['dt-sidebar-audio-title-3'] != '' )
                $this->data['sidebar-audio-title-3'] = esc_attr( $_POST['dt-sidebar-audio-title-3'] );
			
			if ( isset($_POST['dt-sidebar-gallery-title']) && $_POST['dt-sidebar-gallery-title'] != '' )
                $this->data['sidebar-gallery-title'] = esc_attr( $_POST['dt-sidebar-gallery-title'] );
            if ( isset($_POST['dt-sidebar-gallery']) && $_POST['dt-sidebar-gallery'] != '' )
                $this->data['sidebar-gallery'] = $_POST['dt-sidebar-gallery'];
            if ( isset($_POST['dt-sidebar-gallery-title-2']) && $_POST['dt-sidebar-gallery-title-2'] != '' )
                $this->data['sidebar-gallery-title-2'] = esc_attr( $_POST['dt-sidebar-gallery-title-2'] );
            if ( isset($_POST['dt-sidebar-gallery-2']) && $_POST['dt-sidebar-gallery-2'] != '' )
                $this->data['sidebar-gallery-2'] = $_POST['dt-sidebar-gallery-2'];
            
            if ( isset($_POST['dt-sidebar-custom-title']) && $_POST['dt-sidebar-custom-title'] != '' )
                $this->data['sidebar-custom-title'] = esc_attr( $_POST['dt-sidebar-custom-title'] );
            if ( isset($_POST['dt-sidebar-custom']) && $_POST['dt-sidebar-custom'] != '' )
                $this->data['sidebar-custom'] = $_POST['dt-sidebar-custom'];
            
            if ( isset($_POST['dt-sidebar-video-title']) && $_POST['dt-sidebar-video-title'] != '' )
                $this->data['sidebar-video-title'] = esc_attr( $_POST['dt-sidebar-video-title'] );
            if ( isset($_POST['dt-sidebar-video']) && $_POST['dt-sidebar-video'] != '' )
                $this->data['sidebar-video'] = $_POST['dt-sidebar-video'];
                
            if ( isset($_POST['dt-sidebar-video-title-2']) && $_POST['dt-sidebar-video-title-2'] != '' )
                $this->data['sidebar-video-title-2'] = esc_attr( $_POST['dt-sidebar-video-title-2'] );
            if ( isset($_POST['dt-sidebar-video-2']) && $_POST['dt-sidebar-video-2'] != '' )
                $this->data['sidebar-video-2'] = $_POST['dt-sidebar-video-2'];
                
            if ( isset($_POST['dt-sidebar-video-title-3']) && $_POST['dt-sidebar-video-title-3'] != '' )
                $this->data['sidebar-video-title-3'] = esc_attr( $_POST['dt-sidebar-video-title-3'] );
            if ( isset($_POST['dt-sidebar-video-3']) && $_POST['dt-sidebar-video-3'] != '' )
                $this->data['sidebar-video-3'] = $_POST['dt-sidebar-video-3'];
            
            if ( isset($_POST['dt-sources']) && $_POST['dt-sources'] != '' )
                $this->data['sources'] = $_POST['dt-sources'];
            
            if ( isset($_POST['dt-photo-credit']) && $_POST['dt-photo-credit'] != '' )
                $this->data['photo-credit'] = $_POST['dt-photo-credit'];
            
            
            if ( isset($this->data) && $this->data != '' )
                update_post_meta($id, '_different-types', $this->data);
        }

        // load post_meta_data
        function load_post_meta($id) {

            return get_post_meta($id, '_different-types', true);
        }

        // meta box on post/page
        function meta_box($data) {

            $value = $this->load_post_meta($data->ID);
            ?>
            <table id="dt-page-definition" width="100%" cellspacing="5px">
            	
            	<tr valign="top">
                	<td><h4>Main Elements</h4></td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-additional-info"><?php _e( 'Subhead:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="1" id="dt-additional-info" name="dt-additional-info" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['subhead']; ?></textarea>
                    </td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-listdata"><?php _e( 'Article Descriptor', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="3" id="dt-listdata" name="dt-listdata" class="listdata form-input-tip" size="20" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['listdata']; ?></textarea><br /><small><?php _e( 'One item per line', FB_DT_TEXTDOMAIN ) ?></small></td>
                </tr>
                
                <tr valign="top">
                    <td style="width:20%;"><label for="dt-heading"><?php _e( 'Homepage Image:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><input type="text" id="dt-heading" name="dt-heading" class="heading form-input-tip" size="16" autocomplete="off" value="<?php echo $value['home-featured-permalink']; ?>" tabindex="6" style="width:99.5%"/></td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-category-image"><?php _e( 'Category Image:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="1" id="dt-category-image" name="dt-category-image" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['category-image']; ?></textarea>
                    </td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-story-photo"><?php _e( 'Story Photo:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="1" id="dt-story-photo" name="dt-story-photo" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['story-photo']; ?></textarea>
                    </td>
                </tr>
              
              	<tr valign="top">
                    <td><label for="dt-image-caption"><?php _e( 'Image Caption:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="2" id="dt-image-caption" name="dt-image-caption" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['image-caption']; ?></textarea>
                    </td>
                </tr>
                
                <tr valign="top">
                    <td style="width:20%;"><label for="dt-photo-credit"><?php _e( 'Photo Credit:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><input type="text" id="dt-photo-credit" name="dt-photo-credit" class="heading form-input-tip" size="16" autocomplete="off" value="<?php echo $value['photo-credit']; ?>" tabindex="6" style="width:99.5%"/></td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-story-video"><?php _e( 'Story Video:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="10" id="dt-story-video" name="dt-story-video" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['story-video']; ?></textarea>
                    <small><?php _e( 'Cannot have Story Photo and Story Video. Will also receive Flash.', FB_DT_TEXTDOMAIN ) ?></small></td>
                </tr>
                
                <tr valign="top">
                	<td><h4>Story Sidebar Elements</h4></td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-sidebar-audio-title"><?php _e( 'Audio Title 1:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="1" id="dt-sidebar-audio" name="dt-sidebar-audio-title" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['sidebar-audio-title']; ?></textarea>
                    </td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-sidebar-audio"><?php _e( 'Audio 1:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="1" id="dt-sidebar-audio" name="dt-sidebar-audio" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['sidebar-audio']; ?></textarea>
                    <small><?php _e( 'No shortcode. Just mp3 file.', FB_DT_TEXTDOMAIN ) ?></small></td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-sidebar-audio-title"><?php _e( 'Audio Title 2:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="1" id="dt-sidebar-audio" name="dt-sidebar-audio-title-2" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['sidebar-audio-title-2']; ?></textarea>
                    </td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-sidebar-audio"><?php _e( 'Audio 2:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="1" id="dt-sidebar-audio" name="dt-sidebar-audio-2" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['sidebar-audio-2']; ?></textarea>
                    <small><?php _e( 'No shortcode. Just mp3 file.', FB_DT_TEXTDOMAIN ) ?></small></td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-sidebar-audio-title"><?php _e( 'Audio Title 3:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="1" id="dt-sidebar-audio" name="dt-sidebar-audio-title-3" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['sidebar-audio-title-3']; ?></textarea>
                    </td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-sidebar-audio"><?php _e( 'Audio 3:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="1" id="dt-sidebar-audio" name="dt-sidebar-audio-3" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['sidebar-audio-3']; ?></textarea>
                    <small><?php _e( 'No shortcode. Just mp3 file.', FB_DT_TEXTDOMAIN ) ?></small></td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-sidebar-gallery-title"><?php _e( 'Gallery Title:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="1" id="dt-sidebar-gallery-title" name="dt-sidebar-gallery-title" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['sidebar-gallery-title']; ?></textarea>
                    </td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-sidebar-gallery"><?php _e( 'Gallery Number:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="1" id="dt-sidebar-gallery" name="dt-sidebar-gallery" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['sidebar-gallery']; ?></textarea>
                    </td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-sidebar-gallery-title"><?php _e( 'Gallery Title 2:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="1" id="dt-sidebar-gallery-title" name="dt-sidebar-gallery-title-2" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['sidebar-gallery-title-2']; ?></textarea>
                    </td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-sidebar-gallery"><?php _e( 'Gallery Number 2:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="1" id="dt-sidebar-gallery" name="dt-sidebar-gallery-2" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['sidebar-gallery-2']; ?></textarea>
                    </td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-sidebar-custom-title"><?php _e( 'Custom HTML Title:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="1" id="dt-sidebar-custom-title" name="dt-sidebar-custom-title" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['sidebar-custom-title']; ?></textarea>
                    </td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-sidebar-custom"><?php _e( 'Custom HTML:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="6" id="dt-sidebar-custom" name="dt-sidebar-custom" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['sidebar-custom']; ?></textarea>
                    </td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-sidebar-video-title"><?php _e( 'Video Title:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="1" id="dt-sidebar-video-title" name="dt-sidebar-video-title" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['sidebar-video-title']; ?></textarea>
                    </td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-sidebar-video"><?php _e( 'Video Embed:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="10" id="dt-sidebar-video" name="dt-sidebar-video" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['sidebar-video']; ?></textarea>
                    <small><?php _e( 'Width: 210, Height:118.125', FB_DT_TEXTDOMAIN ) ?></small></td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-sidebar-video-title"><?php _e( 'Video Title 2:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="1" id="dt-sidebar-video-title" name="dt-sidebar-video-title-2" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['sidebar-video-title-2']; ?></textarea>
                    </td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-sidebar-video"><?php _e( 'Video Embed 2:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="10" id="dt-sidebar-video" name="dt-sidebar-video-2" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['sidebar-video-2']; ?></textarea>
                    <small><?php _e( 'Width: 210, Height:118.125', FB_DT_TEXTDOMAIN ) ?></small></td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-sidebar-video-title"><?php _e( 'Video Title 3:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="1" id="dt-sidebar-video-title" name="dt-sidebar-video-title-3" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['sidebar-video-title-3']; ?></textarea>
                    </td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-sidebar-video"><?php _e( 'Video Embed 3:', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="10" id="dt-sidebar-video" name="dt-sidebar-video-3" class="additional-info form-input-tip code" size="16" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['sidebar-video-3']; ?></textarea>
                    <small><?php _e( 'Width: 210, Height:118.125', FB_DT_TEXTDOMAIN ) ?></small></td>
                </tr>
                
                <tr valign="top">
                    <td><label for="dt-sources"><?php _e( 'Sources', FB_DT_TEXTDOMAIN ); ?></label></td>
                    <td><textarea cols="16" rows="3" id="dt-sources" name="dt-sources" class="listdata form-input-tip" size="20" autocomplete="off" tabindex="6" style="width:99.5%"/><?php echo $value['sources']; ?></textarea><br /><small><?php _e( 'One item per line', FB_DT_TEXTDOMAIN ) ?></small></td>
                </tr>
                
                
                
            </table>
            <?php
        }
        
                
        // return facts incl. markup
        function get_DifferentTypeFacts($id, $type, $value) {

            if (!$value)
                return false;
            if ( $type == '' )
                return false;

            if ( 'home-featured-permalink' == $type && '' != $value['home-featured-permalink'] )
                return $value['home-featured-permalink'];
            if ( 'subhead' == $type && '' != $value['subhead'] )
                return $value['subhead'];
            if ( 'category-image' == $type && '' != $value['category-image'] )
                return $value['category-image'];
            if ( 'story-photo' == $type && '' != $value['story-photo'] ) {
            	return $value['story-photo'];
            }
            if ( 'story-video' == $type && '' != $value['story-video'] ) {
            	return $value['story-video'];
            }
            if ( 'image-caption' == $type && '' != $value['image-caption'] ) {
            	return $value['image-caption'];
            }
            if ( 'photo-credit' == $type && '' != $value['photo-credit'] ) {
            	return $value['photo-credit'];
            }
            
            if ( 'sidebar-audio-title' == $type && '' != $value['sidebar-audio-title'] ) {
            	return $value['sidebar-audio-title'];
            }
            if ( 'sidebar-audio' == $type && '' != $value['sidebar-audio'] ) {
            	return $value['sidebar-audio'];
            }
            if ( 'sidebar-audio-title-2' == $type && '' != $value['sidebar-audio-title-2'] ) {
            	return $value['sidebar-audio-title-2'];
            }
            if ( 'sidebar-audio-2' == $type && '' != $value['sidebar-audio-2'] ) {
            	return $value['sidebar-audio-2'];
            }
            if ( 'sidebar-audio-title-3' == $type && '' != $value['sidebar-audio-title-3'] ) {
            	return $value['sidebar-audio-title-3'];
            }
            if ( 'sidebar-audio-3' == $type && '' != $value['sidebar-audio-3'] ) {
            	return $value['sidebar-audio-3'];
            }
            
            
            
            if ( 'sidebar-gallery-title' == $type && '' != $value['sidebar-gallery-title'] ) {
            	return $value['sidebar-gallery-title'];
            }
            if ( 'sidebar-gallery' == $type && '' != $value['sidebar-gallery'] ) {
            	return $value['sidebar-gallery'];
            }
            
            if ( 'sidebar-gallery-title-2' == $type && '' != $value['sidebar-gallery-title-2'] ) {
            	return $value['sidebar-gallery-title-2'];
            }
            if ( 'sidebar-gallery-2' == $type && '' != $value['sidebar-gallery-2'] ) {
            	return $value['sidebar-gallery-2'];
            }
            
            if ( 'sidebar-custom-title' == $type && '' != $value['sidebar-custom-title'] ) {
            	return $value['sidebar-custom-title'];
            }
            if ( 'sidebar-custom' == $type && '' != $value['sidebar-custom'] ) {
            	return $value['sidebar-custom'];
            }
            if ( 'sidebar-video-title' == $type && '' != $value['sidebar-video-title'] ) {
            	return $value['sidebar-video-title'];
            }
            if ( 'sidebar-video' == $type && '' != $value['sidebar-video'] ) {
            	return $value['sidebar-video'];
            }
            if ( 'sidebar-video-title-2' == $type && '' != $value['sidebar-video-title-2'] ) {
            	return $value['sidebar-video-title-2'];
            }
            if ( 'sidebar-video-2' == $type && '' != $value['sidebar-video-2'] ) {
            	return $value['sidebar-video-2'];
            }
            if ( 'sidebar-video-title-3' == $type && '' != $value['sidebar-video-title-3'] ) {
            	return $value['sidebar-video-title-3'];
            }
            if ( 'sidebar-video-3' == $type && '' != $value['sidebar-video-3'] ) {
            	return $value['sidebar-video-3'];
            }
            
            
            if ( 'listdata' == $type && '' != $value['listdata'] ) {
                $return = '';
                $listdatas = preg_split("/\r\n/", $value['listdata'] );

                foreach ( (array) $listdatas as $key => $listdata ) {

                    $return .= '<li>' . trim($listdata) . '</li>';

                }
                return '<ul class="descriptors">' . $return . '</ul>'. "\n";
            }
            
            if ( 'sources' == $type && '' != $value['sources'] ) {
                $return = '';
                $sourcedatas = preg_split("/\r\n/", $value['sources'] );

                foreach ( (array) $sourcedatas as $key => $sourcedata ) {

                    $return .= '<li>' . trim($sourcedata) . '</li>';

                }
                return '<ul class="sources">' . $return . '</ul>'. "\n";
            }
        }

        // echo facts, if exists
        function DifferentTypeFacts($id, $type, $string) {

            if ( $id ) {
                $value = $this->load_post_meta($id);

                echo $this->get_DifferentTypeFacts($id, $type, $value);
            }
        }
        
        //check if facts exist
        function ListDifferentTypeFacts($id, $type, $string) {

            if ( $id ) {
                $value = $this->load_post_meta($id);
				$newData = $this->get_DifferentTypeFacts($id, $type, $value);
               
               if($newData) {
                	return $newData;
                } else {
                	return false;
               	}
            }
        }
        
        

    } // End class

    // instance class
    $DifferentType = new DifferentType();

    // use in template
    function the_DifferentTypeFacts($id, $type = '', $string = '') {
        global $DifferentType;

        $DifferentType->DifferentTypeFacts($id, $type, $string);
    }
    
    function check_DifferentTypeFacts($id, $type = '', $string = '') {
        global $DifferentType;

        return $DifferentType->ListDifferentTypeFacts($id, $type, $string);
    }
    

} // End if class exists statement

?>