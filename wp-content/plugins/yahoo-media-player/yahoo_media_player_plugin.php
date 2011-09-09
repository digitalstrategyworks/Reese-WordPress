<?php
/*
Plugin Name: Yahoo! Media Player
Plugin URI: http://www.8bitkid.com/downloads/yahoo-media-player-plugin/
Description: Embeds the Yahoo! Media Player music plugin into your site to play back media links (audio and video).  It also allows you to input your Amazon Affiliate ID in order to monetize referrals made through the plugin. 
Author: Max Engel
Version: 1.3
Author URI: http://www.8bitkid.com
*/

//main player function
function ymp() {
	$ymp_choice = get_option("choice");
	if ($ymp_choice == 1)
		{
		echo '<script type="text/javascript" src="http://webplayer.yahooapis.com/player.js"></script>';
		}
		else
		{
		echo '<script type="text/javascript" src="http://mediaplayer.yahoo.com/js"></script>';
		}
}

//autoplay function
function autoplay() {
	$autoplay_choice = get_option("auto_choice");
	if ($autoplay_choice == 1)
		{
		echo '<script type="text/javascript">
		var YMPParams = {autoplay:true}
		</script>';
		}
}

//creates the option variables
function set_ymp_options () {
	add_option('location','1','location of code for player');
	add_option('choice','1','choice of code');
	add_option("amazon_id","id_goes_here","Amazon Affiliate ID");
	add_option('auto_choice','2','choice for autoplay');

}

//resets the option
function unset_ymp_options () {
	delete_option('location');
	delete_option('choice');
}

function ymp_options () {
	echo '<div class="wrap"><h2>Yahoo! Media Player Options</h2>';
	if ($_REQUEST['submit']) {
		update_ymp_options();
	}
	print_ymp_form();
	echo '</div>';
}
function modify_menu_for_ymp () {
	add_options_page(
		'Yahoo! Media Player',         //Title
		'Yahoo! Media Player',         //Sub-menu title
		'manage_options', //Security
		__FILE__,         //File to open
		'ymp_options'  //Function to call
                      );  
 }

//controls updating the options
function update_ymp_options() {
	$updated = false;
	if ($_REQUEST['location']) {
		update_option('location', $_REQUEST['location']);
		$updated = true;
	}
	if ($_REQUEST['choice']) {
		update_option('choice', $_REQUEST['choice']);
		$updated = true;
	}
	if ($_REQUEST['amazon_id']) {
		update_option('amazon_id', $_REQUEST['amazon_id']);
		$updated = true;
	}
	if ($_REQUEST['auto_choice']) {
		update_option('auto_choice', $_REQUEST['auto_choice']);
		$updated = true;
	}
    if ($updated) {
		echo '<div id="message" class="updated fade">';
		echo '<p>Options Updated</p>';
		echo '</div>';
	}
	else {
		echo '<div id="message" class="error fade">';
		echo '<p>Unable to update options</p>';
		echo '</div>';
	}
}

//plugin options panel
function print_ymp_form () {
	$defaultLocation = get_option('location');
	$defaultChoice = get_option('choice');
	$defaultAutoplay = get_option('auto_choice');
	$defaultID = get_option('amazon_id');
	if ($defaultLocation == 1)
		{
		$ymplv1 = 'checked="checked"';
		}
	else
		{
		$ymplv2 = 'checked="checked"'; 
		}
	if ($defaultChoice == 1)
		{
		$ympv1 = 'checked="checked"';
		}
	else
		{
		$ympv2 = 'checked="checked"'; 
		}
	if ($defaultAutoplay == 1)
		{
		$ympv3 = 'checked="checked"';
		}
	else
		{
		$ympv4 = 'checked="checked"'; 
		}
	echo <<<EOF
<form method="post">
	<p><strong>Choose The Location of the Media Player Code (footer will allow your page to load more quickly, but may not be compatible with all themes)</strong><br/>
		<label>Header: <input type="radio" value="1" $ymplv1 name="location"/></label> <br/>
		<label>Footer: <input type="radio" value ="2" $ymplv2 name="location"/></label></p>

	<p><strong>Choose Which Version of Yahoo! Media Player to Run</h4></strong><br/>
		<label>Beta Build (enables video): <input type="radio" value="1" $ympv1 name="choice"/></label><br/>
		<label>Legacy Build: <input type="radio" value ="2" $ympv2 name="choice"/></label></p>

	<p><strong>Choose if Media Should Play When the Page Loads</strong><br/>
		<label>Enable Autoplay: <input type="radio" value ="1" $ympv3 name="auto_choice"/></label><br/>
		<label>Disable Autoplay: <input type="radio" value="2" $ympv4 name="auto_choice"/></label><br/></p>

	<p><strong>Amazon Affiliate ID Settings</strong><br/>
	<label>Enter your Amazon Affiliate ID:<br/>
	<input type="text" name="amazon_id" value="$defaultID" />
	</label></p>
	<input type="submit" name="submit" value="Submit" />
	</form>
EOF;
}
function amazon() {
	$amazon_id_choice = get_option("amazon_id");
	$meta_tag = "<meta name='amazonid' content='$amazon_id_choice' />";
	print "$meta_tag\n";
}
//Add and Remove vars when creating/removing plugin
register_activation_hook(__FILE__,'set_ymp_options');
register_deactivation_hook(__FILE__,'unset_ymp_options');
//Adds the admin menu
add_action('admin_menu','modify_menu_for_ymp');
//Adds autoplay if enabled
add_action('wp_head', 'autoplay');
//Adds the YMP to the right location
$ymp_location = get_option("location");
	if ($ymp_location == 1)
		{
		add_action('wp_head', 'ymp');
		}
	else
		{
		add_action('wp_footer', 'ymp'); 
		}
//Adds the amazon affiliate id to the header
add_action('wp_head', 'amazon');
?>