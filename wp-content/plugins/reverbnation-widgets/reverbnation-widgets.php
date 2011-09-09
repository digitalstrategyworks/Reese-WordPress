<?php
/*
  Plugin Name: ReverbNation Widgets
  Plugin URI: http://www.reverbnation.com/wordpress-plugin
  Description: Display ReverbNation widgets in posts and on your blog. Widget code should be generated in the Widgets section in your ReverbNation Control Panel. Simply paste the <code>[reverbnation]widget_url_here[/reverbnation]</code> code anywhere on your WordPress blog for instant widget action!
  Version: 2.1
  Author: ReverbNation
  Author URI: http://www.reverbnation.com
  License: As-Is
*/

define('REVERBNATION_WIDGET_URL_PREFIX', 'http://cache.reverbnation.com/widgets/swf/');
define('REVERBNATION_PLUGIN_VERSION', '2.1');
define('REVERBNATION_ERROR_MESSAGE', '<strong>Invalid ReverbNation widget url. Your widget code should be pasted exactly as shown in the Widgets section of your account Control Panel.</strong><br/>Example: <code>[reverbnation]widget_url_here[/reverbnation]</code>');

function rn_widget_error($code) {
  if($_SERVER['HTTP_HOST'] != 'localhost')
    return $error;
    
  return REVERBNATION_ERROR_MESSAGE . '<br />Error Code: ' . $code;
}

function rn_widgets_shortcode($atts, $url) {
  global $wp_embed;
  
  //make sure it's a valid ReverbNation url
  if(0 !== strpos($url, REVERBNATION_WIDGET_URL_PREFIX))
    return rn_widget_error('widget url prefix not found');
  
  //remove any html entities
  $url = html_entity_decode($url);
  
  //split the url provided, make sure proper get arguments are available for width, height, and owner
  $required_keys = array('width', 'height', 'page_object');
  $url_parts = explode('?', $url);
  if(2 !== count($url_parts))
    return rn_widget_error('url split not 2 parts');
  
  $width = $height = $page_object = NULL;
  $final_file_string = $url_parts[0];
  
  $kv_pairs = explode('&', $url_parts[1]);
  foreach($kv_pairs as $key => $kv) {
    list($key, $value) = explode('=', $kv);
    
    if($key == 'width') {
      $width = $value;
      unset($kv_pairs[$key]);
    } elseif($key == 'height') {
      $height = $value;
      unset($kv_pairs[$key]);
    } elseif($key == 'id' || $key == 'twID') {
      $page_object = $value;
      //don't remove this one, request still needs it
    }
  }
  
  //3 important vars should have come in as get args in the embedded URL
  if(is_null($width) || is_null($height) || is_null($page_object))
    return rn_widget_error("width:$width, height:$height, or page_object:$page_object was null");

  //dirty extraction of widget id, should change to regexp when time permits
  $widget_id_munge = str_replace(REVERBNATION_WIDGET_URL_PREFIX, '', $final_file_string);
  $widget_id_munge_parts = explode('/', $widget_id_munge);
  $widget_id = (int)$widget_id_munge_parts[0];
  if($widget_id <= 0)
    return rn_widget_error('invalid widget id ' . $widget_id);
  
  //construct the final request that will hit ReverbNation servers
  //all other extracted variables will be placed into flash embed code
  $final_arg_string = implode('&', $kv_pairs);
  $final_request_string = $final_file_string . '?' . $final_arg_string;
    
  //fill in the html before returning with autoembed
  $html = '
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="' . $width . '" height="' . $height . '">
    <param name="movie" value="#{final_file_string}"></param>
    <param name="allowscriptaccess" value="always"></param>
    <param name="allowNetworking" value="all"></param>
    <param name="allowfullscreen" value="true"></param>
    <param name="wmode" value="opaque"></param>
    <param name="quality" value="best"></param>
    <embed src="' . $final_request_string . '" type="application/x-shockwave-flash" allowscriptaccess="always" allowNetworking="all" allowfullscreen="true" wmode="opaque" quality="best" width="' . $width . '" height="' . $height . '"></embed>
  </object>
  <img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/' . $widget_id . '/' . $page_object . '//t.gif" />
  ';
  
  //finally, return whatever the media autoembed returns
  return $wp_embed->autoembed(trim($html));
}


add_shortcode('reverbnation', 'rn_widgets_shortcode');
wp_oembed_add_provider('#' . REVERBNATION_WIDGET_URL_PREFIX . '([0-9]+)/.*#i', 'http://www.reverbnation.com/oembed', true);