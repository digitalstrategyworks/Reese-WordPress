<?php 
/*
Plugin Name: WP Scribd
Plugin URI: http://wordpress.org/extend/plugins/wp-scribd/
Description:  Add Scribd docs inside a post

Version: 0.1
Author: <a href="http://maurizio.mavida.com">maurizio</a>

*/

/*
License: GPL

Installation:
Place the wp-holiday dir in your /wp-content/plugins/ directory
and activate through the administration panel.
*/

/*  

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
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

require_once 'scribd.php';
//$scribd = new Scribd($scribd_api_key, $scribd_secret);



function wp_scribd_activation() {
	/* 
	06.08.2008 | maurizio
	this function print one random image from summer dir
	*/
	add_option("wp_scribd_api_key", '');
	add_option("wp_scribd_secret", '');

}

function wp_scribd_deactivation() {
	/* 
	06.08.2008 | maurizio
	this function print one random image from summer dir
	*/
	
	delete_option("wp_scribd_api_key");
	delete_option("wp_scribd_secret");

}

// action function for above hook
function wp_scribd_menu() {

    // Add a new submenu under Options:
    add_options_page(	
					'Scribd', 
					'Scribd', 
					'manage_options', 
					__FILE__, 
					'wp_scribd_options_page');

}


function wp_scribd_options_page() {
	/* 
	06.08.2008 | maurizio
	this function display the admin form ed update the options on sumbit action
	*/
	$updated = false;
	$updated_text = "";
	
	if ( isset($_POST['submit']) )	{
		update_option('wp_scribd_api_key', $_POST['wp_scribd_api_key']);
		update_option('wp_scribd_secret', $_POST['wp_scribd_secret']);
		
		$updated = true;
		
		$wp_scribd_api_key = $_POST['wp_scribd_api_key'];
		$wp_scribd_secret = $_POST['wp_scribd_secret'];
		
		
	} else {

		$wp_scribd_api_key = get_option('wp_scribd_api_key');
		$wp_scribd_secret = get_option('wp_scribd_secret');
	
	}
	

	
if ( $updated == true ) {
	$updated_text = '
		<br/>
		<div class="updated fade" id="message" >
			<p><strong>Options saved.</strong></p>
		</div>
		';
	}
	
echo '
    <div class="wrap">
      <h2>Scribd</h2>
	  
	  '.$updated_text.'
	  
      <p>This page contain some advanced optional data to work width with Scridb.</p>
	  
	  <p>For basic use just insert the scridb tag with document ID [scridb]doc_id[/scridb]</p>
	  
	<form style="margin-top: 20px;" name="form1" method="post" action="">
		
		<h3>API code</h3>
		<fieldset class="options">
	
		<table class="form-table" cellspacing="2" cellpadding="5" border="0">
		
		<tr valign="top">
			<th >api key:</th>
			<td>	
				<input type="text" id="wp_scribd_api_key" name="wp_scribd_api_key" value="'.$wp_scribd_api_key.'">
			</td>
		</tr>		
		
		<tr valign="top">
			<th >Secret:</th>
			<td>	
				<input type="text" id="wp_scribd_secret" name="wp_scribd_secret" value="'.$wp_scribd_secret.'">
			</td>
		</tr>
		
		</table>
		
		</fieldset>
		<p class="submit" ><input type="submit" name="submit" value="update" /></p>
	</form>	  
	  
	<p >Developed by <a href="http://maurizio.mavida.com">Maurizio</a></p>
    </div>	
	
	';
}




function wp_scribd( ) {
	/* 
	06.08.2008 | maurizio
	this function print one random image from summer dir
	*/
	
	$wp_scribd_position = get_option('wp_scribd_position');
	if ( $wp_scribd_position != "hide" ) {	
		echo wp_scribd_filter();
		}
}

function get_wp_scribd( ) {
	/* 
	06.08.2008 | maurizio
	this function return the code of one random image from summer dir
	*/
	return wp_scribd_filter();
}

function wp_scribd_filter( $any='' ) {
	/* 06.08.2008 | maurizio
	*/

    global $wpdb, $tableposts;
	
	$wp_scribd_api_key = get_option('wp_scribd_api_key');
	$wp_scribd_secret = get_option('wp_scribd_secret');


	$any .= "<i>Scridb filter</i>";
	$any .= "<!-- Scridb filter-->";
	
	return $any;
}



register_activation_hook(__FILE__, wp_scribd_activation);
register_deactivation_hook(__FILE__, wp_scribd_deactivation); 

add_action('admin_menu', 'wp_scribd_menu');
add_filter('the_content', 'wp_scribd_filter');	
	
	
?>