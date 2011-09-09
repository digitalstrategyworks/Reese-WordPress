<?php
/*
Plugin Name: HTML Javascript Adder
Plugin URI: http://www.aakashweb.com
Description: A widget plugin for adding Javascripts, HTML scripts, Shortcodes, advertisements and even simple texts in the sidebar with advanced targeting on posts and pages.
Author: Aakash Chakravarthy
Version: 3.3
Author URI: http://www.aakashweb.com/
*/

/*
Copyright 2011  Aakash Chakravarthy  (email : aakash.19493@gmail.com) (website : www.aakashweb.com)

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

**********************************

	In short, this plugin is free to use by anyone and everyone. As this plugin is free,
	you can also donate and support this plugin if you like.
	
*********************************/

define('HJA_VERSION', '3.3');
define('HJA_AUTHOR', 'Aakash Chakravarthy');

if (!defined('WP_CONTENT_URL')) {
	$hja_pluginpath = get_option('siteurl').'/wp-content/plugins/'.plugin_basename(dirname(__FILE__)).'/';
} else {
	$hja_pluginpath = WP_CONTENT_URL . '/plugins/' . plugin_basename(dirname(__FILE__)) . '/';
}

$hja_donate_link = 'http://bit.ly/hjadonate';

## Load languages
load_plugin_textdomain('hja', false, basename(dirname(__FILE__)) . '/languages/');

class html_javascript_adder_widget extends WP_Widget{

	## Initialize
	function html_javascript_adder_widget(){
		$widget_ops = array('classname' => 'widget_html_javascript_adder', 'description' => __("Used to add HTML, javascripts, Flash embed codes to sidebar", 'hja') );
		$control_ops = array('width' => 530, 'height' => 500);
		$this->WP_Widget('html_javascript_adder', __('HTML Javascript Adder', 'hja'), $widget_ops, $control_ops);
	}
	
	function hja_page_check($instance){
		$hja_is_single = $instance['hja_is_single'];
		$hja_is_archive = $instance['hja_is_archive'];
		$hja_is_home = $instance['hja_is_home'];
		$hja_is_page = $instance['hja_is_page'];
		$hja_is_search = $instance['hja_is_search'];
		
		if (is_home() == 1 && $hja_is_home != 1){
			return true;
		
		}elseif (is_single() == 1 && $hja_is_single!= 1){
			return true;
		
		}elseif (is_page() == 1 && $hja_is_page != 1){
			return true;
		
		}elseif (is_archive() == 1 && $hja_is_archive != 1){
			return true;
		
		}elseif (is_tag() == 1 && $hja_is_archive != 1){
			return true;
		
		}elseif(is_search() == 1 && $hja_is_search != 1){
			return true;
		
		}else{
			return false;
		}
	}
	
	function hja_admin_check($instance){
		$hja_is_admin = $instance['hja_is_admin'];
		
		if(current_user_can('level_10') && $hja_is_admin == 1){
			return false;
		}else{
			return true;
		}
	}
	
	function hja_post_check($instance){
		global $post;
		$hja_diable_post = $instance['hja_diable_post'];
		$splitId = explode(',', $hja_diable_post);
		
		if(is_page($splitId) || is_single($splitId)){
			return false;
		}else{
			return true;
		}
	}
	
	function hja_all_ok($instance){
		return (
			$this->hja_page_check($instance) && 
			$this->hja_admin_check($instance) && 
			$this->hja_post_check($instance)
		);
	}
	
	## Display the Widget
	function widget($args, $instance){
		extract($args);
		
		if(empty($instance['hja_title'])){
			$hja_title = '';
		}else{
			$hja_title = $before_title . apply_filters('widget_title', $instance['hja_title'], $instance, $this->id_base) . $after_title;
		}
		
		if(empty($instance['hja_content'])){
			$hja_content = '';
		}elseif($instance['hja_add_para'] == 1){
			$hja_content = wpautop($instance['hja_content']);
		}else{
			$hja_content = $instance['hja_content'];
		}
		
		$hja_before_content = "\n" . '<div class="hjawidget">' . "\n";
		$hja_after_content = "\n" . '</div>' . "\n";
		
		## Output
		$hja_output_content = 
			$before_widget . 
			"\n\n<!-- Start - HTML Javascript Adder plugin v" . HJA_VERSION . " -->\n" .
			$hja_title . 
			$hja_before_content . 
			$hja_content . 
			$this->hja_link_back() .
			$hja_after_content . 
			"<!-- End - HTML Javascript Adder plugin v" . HJA_VERSION . " -->\n\n" .
			$after_widget;
		
		if($this->hja_all_ok($instance)){
			echo do_shortcode($hja_output_content);
		}
				
		define('IS_HJA_ADDED', 1);
	}
	
	## Save settings
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['hja_title'] = stripslashes($new_instance['hja_title']);
		$instance['hja_content'] = stripslashes($new_instance['hja_content']);
		
		$instance['hja_is_single'] = $new_instance['hja_is_single'];
		$instance['hja_is_archive'] = $new_instance['hja_is_archive'];
		$instance['hja_is_home'] = $new_instance['hja_is_home'];
		$instance['hja_is_page'] = $new_instance['hja_is_page'];
		$instance['hja_is_search'] = $new_instance['hja_is_search'];
		
		$instance['hja_add_para'] = $new_instance['hja_add_para'];
		
		$instance['hja_is_admin'] = $new_instance['hja_is_admin'];
		$instance['hja_diable_post'] = $new_instance['hja_diable_post'];
		
		$instance['hja_heading_select'] = $new_instance['hja_heading_select'];
		
		return $instance;
	}
  
	## HJA Widget form
	function form($instance){
		global $hja_pluginpath, $hja_donate_link;
		
		$instance = wp_parse_args( (array) $instance, array('hja_title'=>'', 'hja_content'=>'','hja_is_single'=>'','hja_is_archive'=>'','hja_is_home'=>'','hja_is_search'=>'' ) );
		$hja_title = htmlspecialchars($instance['hja_title']);
		$hja_content = htmlspecialchars($instance['hja_content']);
		
		$hja_is_single = $instance['hja_is_single'];
		$hja_is_archive = $instance['hja_is_archive'];
		$hja_is_home = $instance['hja_is_home'];
		$hja_is_page = $instance['hja_is_page'];
		$hja_is_search = $instance['hja_is_search'];
		
		$hja_add_para = $instance['hja_add_para'];
		
		$hja_is_admin = $instance['hja_is_admin'];
		$hja_diable_post = $instance['hja_diable_post'];
	?>
	
		<div class="section">
		
		<!-- Title text box for admin widget title -->
		<input id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title'); ?>" type="hidden" value="<?php echo $hja_title; ?>" class="widefat">
		
			<label><?php _e('Title :', 'hja'); ?><br />
				<input id="<?php echo $this->get_field_id('hja_title');?>" name="<?php echo $this->get_field_name('hja_title'); ?>" type="text" value="<?php echo $hja_title; ?>" class="widefat"/>
			</label>
		</div>
		
		<div class="section">
			<label for="<?php echo $this->get_field_id('hja_content'); ?>"><?php _e('Content :', 'hja'); ?></label>

			<ul class="dropToolbar tbButtons clearfix">
				<li class="top"><img src="<?php echo $hja_pluginpath . 'images/edit-icon.png';?>" width="10" height="10" />Quick Tags
					<ul class="sub"><li class="width200">
					<?php echo $this->hja_tbbuttons($this->get_field_id('hja_content'), $this->get_field_id('hja_heading_select')); ?></li></ul>
				</li>
				<?php if($this->hja_wpsr_check() == 1): ?>
				<li class="top"><img src="<?php echo WPSR_ADMIN_URL . 'images/wp-socializer.png';?>" width="10" height="10" />WP Socializer Buttons
					<ul class="sub">
						<li class="width200"><input type="button" onclick="awQuickTags('<?php echo $this->get_field_id('hja_content'); ?>','[wpsr_socialbts] ','','');" value="Social buttons"/><input type="button" onclick="awQuickTags('<?php echo $this->get_field_id('hja_content'); ?>','[wpsr_addthis] ','','');" value="Addthis"/><hr/>
						<input type="button" onclick="awQuickTags('<?php echo $this->get_field_id('hja_content'); ?>','[wpsr_sharethis] ','','');" value="Sharethis"/><input type="button" onclick="awQuickTags('<?php echo $this->get_field_id('hja_content'); ?>','[wpsr_retweet] ','','');" value="Retweet"/><hr/>
						<input type="button" onclick="awQuickTags('<?php echo $this->get_field_id('hja_content'); ?>','[wpsr_buzz] ','','');" value="Buzz"/><input type="button" onclick="awQuickTags('<?php echo $this->get_field_id('hja_content'); ?>','[wpsr_plusone] ','','');" value="Google +1"/><hr/>
						<input type="button" onclick="awQuickTags('<?php echo $this->get_field_id('hja_content'); ?>','[wpsr_digg] ','','');" value="Digg"/><input type="button" onclick="awQuickTags('<?php echo $this->get_field_id('hja_content'); ?>','[wpsr_facebook] ','','');" value="Facebook"/><hr/>
						<input type="button" onclick="awQuickTags('<?php echo $this->get_field_id('hja_content'); ?>','[wpsr_stumbleupon] ','','');" value="Stumbleupon"/><input type="button" onclick="awQuickTags('<?php echo $this->get_field_id('hja_content'); ?>','[wpsr_reddit] ','','');" value="Reddit"/>
						</li>
					</ul>
				</li>
				<?php endif; ?>
				
				<li class="top"><a href="http://www.aakashweb.com/wordpress-plugins/html-javascript-adder/" target="_blank">Help</a>
				<ul class="sub width150">
					<li><a href="http://www.aakashweb.com/wordpress-plugins/html-javascript-adder/" target="_blank"><?php _e("Documentation", 'hja'); ?></a></li>
					<li><a href="http://www.aakashweb.com/" target="_blank"><?php _e("Visit Author site", 'hja'); ?></a></li>
					<li><a href="http://www.aakashweb.com/forum/" target="_blank"><?php _e("Support Forum", 'hja'); ?></a></li>
				</ul>
				</li>
			</ul>
			
			<textarea rows="10" id="<?php echo $this->get_field_id('hja_content'); ?>" name="<?php echo $this->get_field_name('hja_content'); ?>" class="hja_content"><?php echo $hja_content; ?></textarea>
		</div>
		
		<div class="section">
			<label><b><?php _e('Settings', 'hja'); ?></b></label><br />
			<div class="alignLeft" style="width:47%">
			
				<label><input id="<?php echo $this->get_field_id('hja_is_single'); ?>" type="checkbox"  name="<?php echo $this->get_field_name('hja_is_single'); ?>" value="1" <?php echo $hja_is_single == "1" ? 'checked="checked"' : ""; ?> /> <?php _e("Don't display in Posts page", 'hja'); ?></label><br />
				
				<label><input id="<?php echo $this->get_field_id('hja_is_archive'); ?>" type="checkbox" name="<?php echo $this->get_field_name('hja_is_archive'); ?>" value="1" <?php echo $hja_is_archive == "1" ? 'checked="checked"' : ""; ?>/> <?php _e("Don't display in Archive or Tag page", 'hja'); ?></label><br />
				
				<label><input id="<?php echo $this->get_field_id('hja_is_home'); ?>" type="checkbox" name="<?php echo $this->get_field_name('hja_is_home'); ?>" value="1" <?php echo $hja_is_home == "1" ? 'checked="checked"' : ""; ?>/> <?php _e("Don't display in Home page", 'hja'); ?></label><br />
				
				<label><input id="<?php echo $this->get_field_id('hja_is_page'); ?>" type="checkbox" name="<?php echo $this->get_field_name('hja_is_page'); ?>" value="1" <?php echo $hja_is_page == "1" ? 'checked="checked"' : ""; ?>/> <?php _e("Don't display in Pages", 'hja'); ?></label><br />
				
				<label><input id="<?php echo $this->get_field_id('hja_is_search'); ?>" type="checkbox" name="<?php echo $this->get_field_name('hja_is_search'); ?>" value="1" <?php echo $hja_is_search == "1" ? 'checked="checked"' : ""; ?>/> <?php _e("Don't display in Search page", 'hja'); ?></label><br />
				
				<label><input id="<?php echo $this->get_field_id('hja_add_para'); ?>" type="checkbox" name="<?php echo $this->get_field_name('hja_add_para'); ?>" value="1" <?php echo $hja_add_para == "1" ? 'checked="checked"' : ""; ?>/> <?php _e("Automatically add paragraphs", 'hja'); ?></label>
				
			</div>
			
			<div class="alignLeft" style="width:47%">
			
				<label><input id="<?php echo $this->get_field_id('hja_is_admin'); ?>" type="checkbox" name="<?php echo $this->get_field_name('hja_is_admin'); ?>" value="1" <?php echo $hja_is_admin == "1" ? 'checked="checked"' : ""; ?>/> <?php _e("Don't display to admin", 'hja'); ?></label><br /><br />
				
				<label><?php _e("Don't show in posts", 'hja'); ?><br />
					<input id="<?php echo $this->get_field_id('hja_diable_post'); ?>" type="text" name="<?php echo $this->get_field_name('hja_diable_post'); ?>" value="<?php echo $hja_diable_post; ?>" class="widefat"/>
					<span class="smallText"><?php _e("Post ID's / name / title seperated by comma", 'hja'); ?></span>
				</label>
				
			</div>
			<div style="clear:both"></div>
		</div>
		
		<div class="widget-control-actions links">
		<a href="<?php echo $hja_donate_link; ?>" target="_blank" class="donateBt"><?php _e("Make Donations", 'hja'); ?></a> | <a href="#" onclick="openSubForm();"><?php _e("Subscribe", 'hja'); ?></a> | <a href="#" onclick="openAddthis();"><?php _e("Promote", 'hja'); ?></a></div>
		
		<?php	  
	}
	
	function hja_tbbuttons($cntId, $headId){
		return '<select id="' . $headId . '" onChange="awQuickTagsHeading(\'' . $cntId . '\', \'' . $headId . '\');"><option value="1">Heading 1</option><option value="2">Heading 2</option><option value="3">Heading 3</option><option value="4">Heading 4</option><option value="5">Heading 5</option><option value="6">Heading 6</option></select><hr/>
<input type="button" onClick="awQuickTags(\'' . $cntId . '\',\'<strong>\',\'</strong>\',\'\');" value="B"/>
<input type="button" onClick="awQuickTags(\'' . $cntId . '\',\'<em>\',\'</em>\',\'\');" value="I"/>
<input type="button" onClick="awQuickTags(\'' . $cntId . '\',\'<u>\',\'</u>\',\'\');" value="U"/><hr/>
<input type="button" onClick="awQuickTags(\'' . $cntId . '\',\'<a \',\'</a>\',\'a\');" value="' . __("Link", "hja") . '"/>
<input type="button" onClick="awQuickTags(\'' . $cntId . '\',\'<img \',\'/>\',\'img\');" value="' . __("Image", "hja") . '"/>
<input type="button" onClick="awQuickTags(\'' . $cntId . '\',\'<code>\',\'</code>\',\'\');" value="'. __("Code", "hja") . '"/><hr/>
<input type="button" onClick="awQuickTags(\'' . $cntId . '\',\'<ul>\',\'</ul>\',\'\');" value="ul"/>
<input type="button" onClick="awQuickTags(\'' . $cntId . '\',\'<ol>\',\'</ol>\',\'\');" value="ol"/>
<input type="button" onClick="awQuickTags(\'' . $cntId . '\',\'<li>\',\'</li>\',\'\');" value="li"/>
<input type="button" onClick="awQuickTags(\'' . $cntId . '\',\'<p>\',\'</p>\',\'\');" value="P"/>
<input type="button" onClick="awQuickTags(\'' . $cntId . '\',\'\',\'</br>\',\'\');" value="br"/><hr/>
<input type="button" value="' . __("Preview", "hja") . '" class="hja_preview_bt" rel="' . $cntId . '"/>';
	}
	
	function hja_wpsr_check(){
		if(function_exists('wp_socializer') && WPSR_VERSION >= '2.0'){
			return 1;
		}else{
			return 0;
		}
	}
	
	function hja_link_back(){
		$hja_options = get_option('hja_data');
		
		if(!defined('IS_HJA_ADDED') && $hja_options['hja_disable_linkback'] != 1){
			return "\n" . '<a href="http://www.aakashweb.com/" target="_blank" rel="follow" title="' . __('Added with HTML Javascript Adder Wordpress plugin', 'hja') . '" style="float:right;font-size:50%"> ?</a>';
		}
	}
	
}
## End class

function html_javascript_adder_init(){
	register_widget('html_javascript_adder_widget');
}
add_action('widgets_init', 'html_javascript_adder_init');

function html_javascript_adder_js(){
	global $hja_pluginpath;
	$currentUrl = $_SERVER["PHP_SELF"];
	$fileUrl = explode('/', $currentUrl);
	$fileName = $fileUrl[count($fileUrl) - 1];
	
	if($fileName == 'widgets.php'){
		echo '<script type="text/javascript" src="' . $hja_pluginpath . 'js/awQuickTag.js"></script>';
		echo '<link rel="stylesheet" href="' . $hja_pluginpath . 'hja-widget-css.css" type="text/css" />';
		echo '<script type="text/javascript" src="' . $hja_pluginpath . 'hja-widget-js.js"></script>';
	}
}
add_action('admin_head','html_javascript_adder_js');

## Action Links
function hja_plugin_actions($links, $file){
	static $this_plugin;
	global $hja_donate_link;
	
	if(!$this_plugin) $this_plugin = plugin_basename(__FILE__);
	if( $file == $this_plugin ){
		$settings_link = "<a href='$hja_donate_link' target='_blank'>" . __('Make Donations', 'hja') . '</a> ';
		$links = array_merge(array($settings_link), $links);
	}
	return $links;
}
add_filter('plugin_action_links', 'hja_plugin_actions', 10, 2);

function hja_admin_page(){
	$hja_options = get_option('hja_data');
	
	if ($_POST["hja_admin_submit"]) {
		$hja_options['hja_disable_linkback'] = $_POST['hja_disable_linkback'];
		update_option("hja_data", $hja_options);
	}
	
	$hja_disable_linkback = $hja_options['hja_disable_linkback'];
	
	?>
	<div class="wrap">
		<form method="POST">
			<small><label><?php _e('Disable HTML Javascript Adder link back', 'hja'); ?> <input name="hja_disable_linkback" type="checkbox" id="hja_disable_linkback" value="1" <?php echo $hja_disable_linkback == "1" ? 'checked="checked"' : ""; ?> /></label></small>
			<span class="submit"><input type="submit" name="hja_admin_submit" id="hja_admin_submit" value="<?php _e('Save'); ?>" /></span>
			
		</form>
	</div>
	<br />
	
	<?php
}
add_action('sidebar_admin_page', 'hja_admin_page');

## Admin Dashboard
if(!function_exists('aw_dashboard')){
	function aw_dashboard() {
		$rss = array('url' => 'http://feeds2.feedburner.com/aakashweb', 'items' => '5','show_date' => 0, 'show_summary'=> 1);
		$subscribe = "window.open('http://feedburner.google.com/fb/a/mailverify?uri=aakashweb', 'win','menubar=1,resizable=1,width=600,height=500'); return false;" ;
		echo '<div class="rss-widget">';
		echo '<a href="http://www.aakashweb.com/wordpress-plugins/" target="_blank"><img src="http://a.imageshack.us/img844/5834/97341029.png" align="right"/></a>';
		echo '<p>'; wp_widget_rss_output($rss); echo '</p>';
		echo '<hr style="border-top: 1px solid #fff;"/>';
		echo '<p><a href="#" onclick="' . $subscribe . '">' . __( 'Subscribe to Updates', 'hja') . '</a> | <a href="http://twitter.com/vaakash" target="_blank">' . __( 'Follow on Twitter', 'hja') . '</a> | <a href="http://www.aakashweb.com/" target="_blank">' . __( 'Home Page', 'hja') . '</a></p>';
		echo "</div>";
	}
	
	function aw_dashboard_setup() {
		wp_add_dashboard_widget('aw_dashboard', __( 'AW Latest Updates', 'hja'), 'aw_dashboard');
	}
	add_action('wp_dashboard_setup', 'aw_dashboard_setup');
}

?>