<?php

/*
Plugin Name: Iframe
Plugin URI: http://web-profile.com.ua/wordpress/plugins/iframe/
Description: Plugin shows iframe with [iframe width="100%" height="480" src="http://player.vimeo.com/video/3261363"] shortcode.
Version: 1.4.0
Author: webvitaly
Author Email: webvitaly(at)gmail.com
Author URI: http://web-profile.com.ua/
*/

if ( !function_exists( 'iframe_embed_shortcode' ) ) {
	function iframe_embed_shortcode($atts, $content = null) {
		extract(shortcode_atts(array(
			'width' => '100%',
			'height' => '480',
			'src' => '',
			'frameborder' => '0',
			'scrolling' => 'no',
			'marginheight' => '0',
			'marginwidth' => '0',
			'allowtransparency' => 'true',
			'id' => '',
			'class' => 'iframe-class',
			'same_height_as' => ''
		), $atts));
		$src_cut = substr($src, 0, 35);
		if(strpos($src_cut, 'maps.google' )){
			$google_map_fix = '&output=embed';
		}else{
			$google_map_fix = '';
		}
		$return = '';
		if( $same_height_as != '' ){
			$return .= '<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>'; // including jQuery 1.6.x
			$return .= '
				<script type="text/javascript">
				jQuery(document).ready(function() {
					var target_height = jQuery("'.$same_height_as.'").height();
					jQuery("iframe.'.$class.'").height(target_height);
				});
				</script>
			';
		}
		if( $id != '' ){
			$id_text = 'id="'.$id.'" ';
		}else{
			$id_text = '';
		}
		$return .= '<iframe '.$id_text.'class="'.$class.'" width="'.$width.'" height="'.$height.'" src="'.$src.$google_map_fix.'" frameborder="'.$frameborder.'" scrolling="'.$scrolling.'" marginheight="'.$marginheight.'" marginwidth="'.$marginwidth.'" allowtransparency="'.$allowtransparency.'"></iframe>';
		// &amp;output=embed
		return $return;
	}
	add_shortcode('iframe', 'iframe_embed_shortcode');
}
