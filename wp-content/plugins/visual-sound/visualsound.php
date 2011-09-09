<?php
/*
Plugin Name: VisualSound
Plugin URI: http://visualsound.be
Description: Allows the insertion of SoundCloud, VisualDreams and VisualMix code in Wordpress. ex: <code>[soundcloud playset wildchild seriexl]</code> 
Version: 1.03
Author: Gunther Voet, Freaking Wildchild
Author URI: http://blog.gowildchild.com

0.8   - Initial release
0.9   - Public release
0.91  - fixed open DIV tags
0.92  - cosmetic fixes and corrected links
0.93  - autoplay works only on single posts, so a cacafony is ruled out!
1.00  - Major release with settings etc...
1.01  - Rewrote database upgrade code + more configurable parameters
1.02  - Added additional artwork and show playercount widget parameters + fixed color for set widget.
1.03  - Support Plug-IN gives additionally the sample widget preview which is quite handy!
*/

/* This code is released under the GNU license; Full Attribution needs to be shown to the author of plug-in */
/* Copyright (C) 2008-2009 Gunther Voet, Freaking Wildchild (contact *A*T* gowildchild *D*O*T* com) */

include (dirname (__FILE__).'/plugin.php');

function visualsound_version () {
    return "1.03";
}

function visualsound_defaults () {
   $default = array ('provider'       => 'soundcloud',
                     'keyword'        => 'soundcloud',
		     'iheight'        => '540',
		     'iwidth'         => '640',
		     'no_caca'        => 'true',
		     'appletcomments' => 'true',
		     'appletcolor'    => 'ff7700',
		     'appletwidth'    => '100%',
                     'appletartwork'  => 'true',
		     'appletshowpc'   => 'true',
		     'suplugin'       => 'true',
		     'gotcloud'       => 'false',
		     'version'        => visualsound_version(),
		     );

   if (!get_option('visualsound_options') ) {

      add_option('visualsound_options', $default);

   } else { 

      $newoptions = get_option('visualsound_options');

      foreach( $default as $key => $val ) {

        if ( !$newoptions[$key] ) {
	   $newoptions[$key] = $val;
	   $new = true;
        }

      }

      if( $new ) {
        if ($newoptions['version'] != visualsound_version()) {
          $newoptions['version'] = visualsound_version();
	  $newoptions['suplugin'] = true;
	}
	update_option('visualsound_options', $newoptions);
      }
   }
}

function visualsound_uninstall () {
    delete_option('visualsound_options');
}

function visualsound_add_pages() {
    add_options_page('VisualSound','VisualSound',8, __FILE__, 'visualsound_options');
}

function visualsound_options() {
    $options = $newoptions = get_option('visualsound_options');
    if ($newoptions['version'] == visualsound_version()) {
      echo "<ul><li>version v" . visualsound_version() . " installed.</li></ul>";
    } elseif($newoptions['version']) {
      echo "<ul><li><b>upgrading from</b> " . $newoptions['version'] . " <b>to v</b>". visualsound_version() . "</li></ul>";
      visualsound_defaults();
    } else {
      echo "<ul><li><b>full update from pre-v1.0/</b>" . $newoptions['version'] . " <b>to v</b>" . visualsound_version() . "</li></ul>";
      visualsound_defaults();
    }

    if ( $_POST["visualsound_submit"] ) {

       $newoptions['provider'] = strip_tags(stripslashes($_POST["provider"]));
       $newoptions['keyword'] = strip_tags(stripslashes($_POST["keyword"]));
       $newoptions['iwidth'] = strip_tags(stripslashes($_POST["iwidth"]));       
       $newoptions['iheight'] = strip_tags(stripslashes($_POST["iheight"]));
       $newoptions['no_caca'] = strip_tags(stripslashes($_POST["no_caca"]));
       $newoptions['appletcomments'] = strip_tags(stripslashes($_POST["appletcomments"]));
       $newoptions['appletwidth'] = strip_tags(stripslashes($_POST["appletwidth"]));       
       $newoptions['suplugin'] = strip_tags(stripslashes($_POST["suplugin"]));
       $newoptions['appletcolor'] = strip_tags(stripslashes($_POST["appletcolor"]));
       $newoptions['appletshowpc'] = strip_tags(stripslashes($_POST["appletshowpc"]));
       $newoptions['appletartwork'] = strip_tags(stripslashes($_POST["appletartwork"]));
       $newoptions['version'] = visualsound_version();
       $newoptions['gotcloud'] = strip_tags(stripslashes($_POST["gotcloud"]));
       if ($newoptions['appletcomments'] == "") { $newoptions['appletcomments'] = "false"; }
       if ($newoptions['appletshowpc'] == "") { $newoptions['appletshowpc'] = "false"; }       
       if ($newoptions['appletartwork'] == "") { $newoptions['appletartwork'] = "false"; }       
    }

    if ( $options != $newoptions ) {
      $options = $newoptions;
      update_option('visualsound_options', $options);
    }

    echo '<form method="post">';
    echo '<div class="wrap"><h2>VisualSound v' . visualsound_version() . ' options</h2>';
    echo '<table class="form-table">';
    echo '<tr><th scope="row">Usage in any page/post</th>';
    echo '<td><code>[' . $options['keyword'] . ' command username location]</code><br><i>example: [' . $options['keyword'] . ' playset wildchild seriexl]</i></td></tr>';
    echo '<td colspan="2"><b>Commands available for ' . $options['provider'] . ':<br>';
    if ($options['provider'] == "soundcloud") {
      echo "* <i>track, playtrack, set, playset, dropbox, cloudplayer</i>";
    } elseif ($options['provider'] == "visualdreams" || $options['provider'] == "visualmix") {
      echo "* <i>open, license, artistplugme</i>";
    } elseif ($options['provider'] == "visualsound") {
      echo "* SoundCloud: <i>track, playtrack, set, playset, dropbox, cloudplayer</i><br>";
      echo "* VisualDreams/VisualMix: <i>open, license, artistplugme</i></ul>";
    } elseif ($options['provider'] == "backwards") {
      echo "<i>backwards compatibility pre-v1.0</i>";
    } else {
      echo "unknown";
    }

    $box_checked = "";
    if ($options['gotcloud'] != 'true') {
      echo '<tr valign="top"><th scope="row">Got SoundCloud!</th>';
      echo '<td><input type="checkbox" name="gotcloud" value="true"><br />Get your SoundCloud account <a href="http://soundcloud.com/signup?user[username]=' .  get_bloginfo('name') .'&user[email]=' . get_option('admin_email') . '&user[invited_by_user_id]=wildchild">here</a>! Click this box to ever disable this message!</td></tr>';
    } else {
      echo '<input type="hidden" name="gotcloud" value="true">' . "\n";
    }
    
    echo '<tr valign="top"><th scope="row">VisualSound keyword</th>';
    echo '<td><input type="text" name="keyword" value="'.$options['keyword'].'" size="15"></input><br />VisualSound listens to this keyword; recommended to set the same as the Sound Provider ('. $options['provider'].')</td></tr>';
    echo '<tr valign="top"><th scope="row">Sound provider</th>';
    echo '<td><input type="text" name="provider" value="'.$options['provider'].'" size="15"></input><br />Sound or Multimedia provider (currently available: <a href="http://www.soundcloud.com" target="_blank">soundcloud</a>, <a href="http://development.artistblog.me/2009/03/visualdreams-engine/" target="_blank">VisualDreams/MIX</a> and visualsound)<br>use <i>visualsound</i> to get the best of both worlds (all providers available)!</td></tr>';
    $box_checked = "";
    if ($options['no_caca'] == 'true') {
      $box_checked = "checked";
    }
    echo '<tr valign="top"><th scope="row">Prevent Cacafony</th>';
    echo '<td><input type="checkbox" name="no_caca" ' . $box_checked . ' value="true"> <br />Auto-start only at single posts or pages, no cacafony in archives, searches, tags, etc...</td></tr>';
    $box_checked = "";
    if ($options['suplugin'] == 'true') {
      $box_checked = "checked";
    }
    echo '<tr valign="top"><th scope="row">Support Plug-IN</th>';
    echo '<td><input type="checkbox" name="suplugin" ' . $box_checked . ' value="true"> <br />Support this plug-in with a very small link <a href="http://visualsound.be" target="_blank" style="text-decoration: none;" title="' . visualsound_by($options['provider']) . '">+</a> offers a neat preview capability!</td></tr>';

    echo '<tr valign="top"><td colspan="2" style="background-color=#bbbbff;">SoundCloud Player Widget options</td></tr>';

    echo '<tr valign="middle"><td colspan="2"><table width="100%" cellspacing="0" cellpadding="0"><tr valign="middle"><td><table width="100%" cellspacing="0" cellpadding="0">';
    echo '<tr valign="middle"><th scope="row">Widget color</th>';
    echo '<td><input type="text" name="appletcolor" value="'. $options['appletcolor'] . '" size="6"></input><font color="#' . $options['appletcolor'] . '">COLOR</font></td></tr>';
    echo '</table></td><td><table width="100%" cellspacing="0" cellpadding="0"><tr valign="middle"><th scope="row">Widget width</th>';
    echo '<td><input type="text" name="appletwidth" value="'. $options['appletwidth'] . '" size="4"></input></td></tr>';
    echo '</table></td></tr>';
    $box_checked = "";
    if ($options['appletartwork'] == 'true') {
      $box_checked = "checked";
    }
    echo '<tr valign="middle"><td><table width="100%">';
    echo '<tr valign="middle"><th scope="row">Show Artwork</th>';
    echo '<td><input type="checkbox" name="appletartwork" ' . $box_checked . ' value="true"></td></tr>';
    $box_checked = "";    
    if ($options['appletshowpc'] == 'true') {
      $box_checked = "checked";
    }
    echo '</table></td><td><table width="100%" cellpadding="0" cellspacing="0"><tr valign="middle"><th scope="row">Show Playcount</th>';
    echo '<td><input type="checkbox" name="appletshowpc" ' . $box_checked . ' value="true"></td></tr>';
    echo '</table></td></tr>';

    $box_checked = "";
    if ($options['appletcomments'] == 'true') {
      $box_checked = "checked";
    }
    echo '<tr valign="middle"><td colspan="2"><table width="100%" cellspacing="0" cellpadding="0">';
    echo '<tr valign="top"><th scope="row">Comments</th>';
    echo '<td colspan="2"><input type="checkbox" name="appletcomments" ' . $box_checked . ' value="true"> Display comments through widget</td></tr>';
    echo '</table></td></tr>';
    if ($options['suplugin'] == "true") {
      echo '<script type="text/javascript"><!--' . "\n";
      echo 'var current = "0";' . "\n";
      echo 'function Box(id){' . "\n";
      echo 'if(!document.getElementById) return false;' . "\n";
      echo 'var div = document.getElementById("box"+id);' . "\n";
      echo 'var curDiv = document.getElementById("box"+current);' . "\n";
      echo 'curDiv.style.display = "none";' . "\n";
      echo 'div.style.display = "block";' . "\n";
      echo 'current = id;' . "\n";
      echo '}' . "\n";
      echo '//--></script>' . "\n";
						

      echo '<style type="text/css">' . "\n";
      echo 'div#box1 { display: none; }';
      echo '</style>';
      $visualsound_by = visualsound_by($options['provider']);
      $visualattribution = '<a href="http://visualsound.be" target="_blank" style="text-decoration:none" title="' . $visualsound_by .' ">+</a>' . "\n"; 
      echo '<tr><td colspan="2">';
      echo 'Sample widget preview: <a href="#preview" onClick="javascript:Box(0);">single track</a> | <a href="#preview" onClick="javascript:Box(1);">full set</a>' . "\n";
      echo '<div id="box0"><object height="81" width="' . $options['appletwidth'] . '">';
      echo '<param name="movie" value="http://player.soundcloud.com/player.swf?track=drumplugme-joan-darc-remix&amp;show_comments=' . $options['appletcomments'] . '&amp;auto_play=false&amp;color=' . $options['appletcolor'] . '"></param>';
      echo '<param name="allowscriptaccess" value="always"></param>';
      echo '<param name="wmode" value="transparent"></param>';
      echo '<embed allowscriptaccess="always" height="81" src="http://player.soundcloud.com/player.swf?track=drumplugme-joan-darc-remix&amp;show_comments=' . $options['appletcomments'] . '&amp;auto_play=false&amp;color=' . $options['appletcolor'] . '"type="application/x-shockwave-flash" width="' . $options['appletwidth'] . '" wmode="transparent"> </embed>';
      echo '</object>';
      echo '<div style="padding-top: 5px;"><a href="http://soundcloud.com/wildchild/drumplugme-joan-darc-remix" target="_blank">drumplugme-joan-darc-remix</a> <span title="' . $visualsound_by . '">by</span>  <a href="http://soundcloud.com/wildchild">wildchild</a> ' . $visualattribution . '</div>';
      echo '</div>';
      echo '<div id="box1"><object height="270" width="' . $options['appletwidth'] . '">';
      echo '<param name="movie" value="http://player.soundcloud.com/player.swf?playlist=seriexl&amp;auto_play=false&amp;color=' . $options['appletcolor'] . '&amp;show_comments=' . $options['appletcomments'] . '&amp;show_artwork=' . $options['appletartwork'] . '&amp;show_playcount=' . $options['appletshowpc'] . '"></param>  <param name="wmode" value="transparent"></param>  <param name="allowscriptaccess" value="always"></param>  <embed allowscriptaccess="always" height="270" src="http://player.soundcloud.com/player.swf?playlist=seriexl&amp;auto_play=false&amp;show_comments=' . $options['appletcomments'] . '&amp;color=' . $options['appletcolor'] . '&amp;show_artwork=' . $options['appletartwork'] . '&amp;show_playcount=' . $options['appletshowpc'] . '" type="application/x-shockwave-flash" width="' . $options['appletwidth'] . '" wmode="transparent"> </embed> </object>';
      echo ' <div style="padding-top: 5px;"><a href="http://soundcloud.com/wildchild/sets/seriexl" target="_blank">sets/seriexl</a> <span title="' . $visualsound_by . '">by</span>  <a href="http://soundcloud.com/wildchild">wildchild</a> ' . $visualattribution . '</div>';
      echo '</div>';


    } else { echo '<tr><td colspan="2"><center>[ <code>You could have a nice real time preview here, by activating "Support Plug-IN"!</code> ]</center></td></tr>'; }

    echo '</table></td></tr>';
    
    echo '<tr valign="top"><td colspan="2"><a href="http://www.thecloudplayer.com" target="_blank">The Cloud Player</a> options';
    echo ' | Call thecloudplayer with <code>[' . $options['keyword'] . ' cloudplayer]</code></td></tr>';
    echo '<tr valign="top"><th scope="row">iFrame width</th>';
    echo '<td><input type="text" name="iwidth" value="'.$options['iwidth'].'" size="3"></input><br />Width for inline/iframe applets</td></tr>';
    echo '<tr valign="top"><th scope="row">iFrame height</th>';
    echo '<td><input type="text" name="iheight" value="'.$options['iheight'].'" size="3"></input><br />Height for inline/iframe applets</td></tr>';
    echo '<input type="hidden" name="visualsound_submit" value="true"></input>';
    echo '</table>';
    echo '<p class="submit"><input type="submit" value="Update VisualSound &raquo;"></input></p>';
    echo '</div>';
    echo '</form>';
    echo 'VisualSound plug-in v' . visualsound_version() .' is &copy;2009 by Gunther Voet, <a href="http://blog.gowildchild.com" target="_blank">Freaking Wildchild</a>, latest plug-in can be found at <a href="http://www.visualsound.be" target="_blank">www.visualsound.be</a>.';
    echo '<br>(links will open in new window) // <font color="#881111">SoundCloud exposure is encouraged for all users!</font>';
}

class EmbedIframe extends EmbedIframe_Plugin
{

	
	function EmbedIframe ($template)
	{

		$this->register_plugin ($template, __FILE__);
		$this->add_filter ('the_content');
		$this->add_action ('wp_head');
	}

	
	function wp_head ()
	{
		
	}
	
	function replace ($matches)
	{
	        $options = get_option('visualsound_options');
		$tmp = strpos ($matches[1], ' ');
		if ($tmp)
		{
                        $param_gen = substr ($matches[0], 1, strpos($matches[0], " "));
			$param_mode  = substr ($matches[1], 0, $tmp);
			$rest = substr ($matches[1], strlen ($param_mode));
			$parts = array_values (array_filter (explode (' ', $rest)));
			$param_user = $parts[0];
			unset ($parts[0]);
			$param_loc = implode (' ', $parts);
			return $this->capture ($options['provider'], array ('param_gen' => $param_gen, 'param_mode' => $param_mode, 'param_user' => $param_user, 'param_loc' => $param_loc, 'visualsound_by' => visualsound_by($options['provider'])));
		}
		return '';
	}

	function the_content ($text)
	{
	  $options = get_option('visualsound_options');
	  return preg_replace_callback ('@(?:<p>\s*)?\[' . $options['keyword'] . '\s*(.*?)\](?:\s*</p>)?@', array (&$this, 'replace'), $text);
	}
}

// Forbidden to remove this line by the GNU license // full attribution needs to stay in the code.

function visualsound_by ($provider) {
    return "VisualSound::" . $provider . " v" . visualsound_version() . " by Freaking Wildchild"; 
}

add_action('admin_menu','visualsound_add_pages');
register_activation_hook( __FILE__, 'visualsound_defaults' );
register_deactivation_hook( __FILE__, 'visualsound_uninstall' );
$options = get_option('visualsound_options');
$visualiframe = new EmbedIframe($options['provider']);


?>