<?php
/*
Plugin Name: WP Original source
Plugin URI: http://www.wecho.com/blog/plugins-wordpress/wp-original-source-plugin/
Description: Adds Google original source meta tag to single posts and pages header for Google news publishers or regarding SEO. Let you define up to 5 URLs for sources, or add your permalink as the original source if you let the fields blank.
Version: 1.1
Author: Wecho
Author URI: http://www.wecho.com/
License: License: GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/
 
define('MY_WORDPRESS_FOLDER',$_SERVER['DOCUMENT_ROOT']);
define('MY_THEME_FOLDER',str_replace("\\",'/',dirname(__FILE__)));
define('MY_THEME_PATH','/' . substr(MY_THEME_FOLDER,stripos(MY_THEME_FOLDER,'wp-content')));

add_action('admin_init','original_source_init');
 
function original_source_init()
{
wp_enqueue_style('original_source_css', MY_THEME_PATH . '/custom/meta.css');

foreach (array('post','page') as $type) 
{
add_meta_box('my_all_meta', 'Define up to 5 sources (URLs), plugin will add Google compliant "original-source" meta tag', 'original_source_setup', $type, 'normal', 'high');
}
 
add_action('save_post','original_source_save');
}
 
function original_source_setup()
{
global $post;
 
// using an underscore, prevents the meta variable
$meta = get_post_meta($post->ID,'_original_source',TRUE);
// instead of writing HTML here, lets do an include
include('custom/meta.php');
 
// create a custom nonce for submit verification later
echo '<input type="hidden" name="original_source_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}
 
function original_source_save($post_id) 
{
	// authentication checks
 
	// make sure data came from our meta box
	if (!wp_verify_nonce($_POST['original_source_noncename'],__FILE__)) return $post_id;
 
	// check user permissions
	if ($_POST['post_type'] == 'page') 
	{
		if (!current_user_can('edit_page', $post_id)) return $post_id;
	}
	else 
	{
		if (!current_user_can('edit_post', $post_id)) return $post_id;
	}
 
	// authentication passed, save data
 
	// var types
	// single: _original_source[var]
	// array: _original_source[var][]
	// grouped array: _original_source[var_group][0][var_1], _original_source[var_group][0][var_2]
 
	$current_data = get_post_meta($post_id, '_original_source', TRUE);	
 
	$new_data = $_POST['_original_source'];
 
	original_source_clean($new_data);
 
	if ($current_data) 
	{
		if (is_null($new_data)) delete_post_meta($post_id,'_original_source');
		else update_post_meta($post_id,'_original_source',$new_data);
	}
	elseif (!is_null($new_data))
	{
		add_post_meta($post_id,'_original_source',$new_data,TRUE);
	}
 
	return $post_id;
}
 
function original_source_clean(&$arr)
{
	if (is_array($arr))
	{
		foreach ($arr as $i => $v)
		{
			if (is_array($arr[$i])) 
			{
				original_source_clean($arr[$i]);
 
				if (!count($arr[$i])) 
				{
					unset($arr[$i]);
				}
			}
			else 
			{
				if (trim($arr[$i]) == '') 
				{
					unset($arr[$i]);
				}
			}
		}
 
		if (!count($arr)) 
		{
			$arr = NULL;
		}
	}
}

function originalsource(){

global $post;
$meta = get_post_meta($post->ID,'_original_source',TRUE);
$s1 = $meta['source1'];
$s2 = $meta['source2'];
$s3 = $meta['source3'];
$s4 = $meta['source4'];
$s5 = $meta['source5'];
$perm = get_permalink();

if(is_single() || is_page())
{
if(empty($s1)) {echo '<meta name="original-source" content="' .$perm . '">' . PHP_EOL;} 
	
	else if(!empty($s1))
		{
		echo '<meta name="original-source" content="' . $s1 . '">' . PHP_EOL;
		if(!empty($s2)) {echo '<meta name="original-source" content="' . $s2 . '">' . PHP_EOL;}
		if(!empty($s3)) {echo '<meta name="original-source" content="' . $s3 . '">' . PHP_EOL;}
		if(!empty($s4)) {echo '<meta name="original-source" content="' . $s4 . '">' . PHP_EOL;}
		if(!empty($s5)) {echo '<meta name="original-source" content="' . $s5 . '">' . PHP_EOL;}
		}
		
else {}
}
else {}
}
add_action('wp_head','originalsource');
?>