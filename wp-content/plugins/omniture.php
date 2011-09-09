<?php
/*
Plugin Name: Omniture - SiteCatalyst
Plugin URI: http://www.rudishumpert.com/projects/wp-omniture/
Description: Add Omniture - SiteCatalyst to your blog with settings controlled in the admin section.
Version: 0.1.0
Author: Rudi Shumpert
Author URI: http://www.rudishumpert.com/
*/
session_start();
define('omni_version', '0.1.0', true);

$omni_options = get_option('omni_admin_options'); 

function omni_track_comment() {
	session_start();
    $_SESSION['omnicommentflag'] = 1;
}

// set an  SiteCatalyst option in the options table of WordPress
function omni_set_option($option_name, $option_value) {
  $omni_options = get_option('omni_admin_options');
  $omni_options[$option_name] = $option_value;
  update_option('omni_admin_options', $omni_options);
}

function omni_get_option($option_name) {
  $omni_options = get_option('omni_admin_options'); 
  if (!$omni_options || !array_key_exists($option_name, $omni_options)) {
    $omni_default_options=array();

    $omni_default_options['omni_report_sid']               = 'uncdev';  
    $omni_default_options['omni_s_code_path']              = 'http://dev.reesenews.org/s_code.js';  
    $omni_default_options['omni_img_script_path']          = 'http://metrics.reesenews.org';
    $omni_default_options['omni_domain_list']              = '.reesenews.org';
    $omni_default_options['omni_track_loggedin']    	   = 'true' ;   
    $omni_default_options['omni_sProp_loggedin']           = '1';
    $omni_default_options['omni_eVar_loggedin']            = '1';
	$omni_default_options['omni_track_internal_search']    = 'true' ; 
    $omni_default_options['omni_sProp_internal_search']    = '2';
    $omni_default_options['omni_eVar_internal_search']     = '2';
	$omni_default_options['omni_track_internal_search_num']= 'true' ; 
    $omni_default_options['omni_sProp_internal_search_num']= '3';
    $omni_default_options['omni_eVar_internal_search_num'] = '3';
    $omni_default_options['omni_track_admins']    	       = 'true' ;
    $omni_default_options['omni_url_campid']    	       = 'cid' ;      
	$omni_default_options['omni_track_comments']           = 'true' ; 
    $omni_default_options['omni_event_comments'] 		   = '1';
    $omni_default_options['omni_enable_widgets'] 		   = 'true';
    $omni_default_options['omni_widget_js_path'] 		   = 'https://sc.omniture.com/p/widget/current/js/widget.js';
    $omni_default_options['omni_enable_dashboard_widget']  = 'true';
    $omni_default_options['omni_widget_number']            = '1';

    add_option('omni_admin_options', $omni_default_options, 
               'Settings for  SiteCatalyst plugin');

    $result = $omni_default_options[$option_name];
  } else {
    $result = $omni_options[$option_name];
  }
  
  return $result;
}

// Create the function to output the contents of our Dashboard Widget

function omni_dashboard_widget_function() {
	// Display whatever it is you want to show
	$omni_db_widget_path = omni_get_option('omni_widget_js_path');
	echo "<script type='text/javascript' src='$omni_db_widget_path'></script>";
} 

// Create the function use in the action hook

function omni_add_dashboard_widgets() {
	wp_add_dashboard_widget('omni_dashboard_widget', 'Omniture-SiteCatalyst', 'omni_dashboard_widget_function');	
} 

// Hook into the 'wp_dashboard_setup' action to register our other functions
if (omni_get_option('omni_enable_dashboard_widget')) { 
	add_action('wp_dashboard_setup', 'omni_add_dashboard_widgets' );
}

function omni_admin() {

  if (function_exists('add_options_page')) {
    add_options_page('Omniture - SiteCatalyst Settings' /* page title */, 
                     'Omniture' /* menu title */, 
                     8 /* min. user level */, 
                     basename(__FILE__) /* php file */ , 
                     'omni_options' /* function for subpanel */);
  }
 if (omni_get_option('omni_enable_widgets'))
 	 { 
 	 add_submenu_page('index.php',  __('Omniture', 'omniture-sitecatalyst'),  __('Omniture', 'omniture-sitecatalyst'), 1, 'omniture-sitecatalyst/omniture.php', 'omni_reporting');		 	 
 	 }

}
function omni_reporting() {

	$omni_rep_widget_num = omni_get_option('omni_widget_number');
	$omni_widget_row_max = 3;
	$omni_db_widget_path = omni_get_option('omni_widget_js_path');
	
?>	
<div class=wrap>
<h2>Omniture - SiteCatalyst - Reporting</h2>
  <table width="100%" cellspacing="2" cellpadding="5" class="editform">

	<tr>
 		 <th nowrap valign="top" width="100%"  colspan="3">You many need to login with your normal SiteCatalyst login credentials</th>
    </tr>
    <tr><td colspan="3" height="5">&nbsp;</td></tr>
 <?php
 	$test = 1;   
 	for (; ; )
 	 {
 		  echo "<tr>";
 		  for ($inner_loop=1; $inner_loop<4; $inner_loop++,$test++)
 		  {
 		  	
 		  	echo"<td>";
 		  		echo "<script type='text/javascript' src='$omni_db_widget_path'></script>";
 		  	echo"</td>";
 		  	if ($test == $omni_rep_widget_num) {break;}	
 		  }
 		  
 		  echo "</tr>";
 		  if ($test == $omni_rep_widget_num) {break;}
 		  echo "<tr><td colspan='3' height='5'>&nbsp;</td></tr>";
  	 }
 ?>   
   </table>
</div>   
<?php
}


function omni_options() {
  if (isset($_POST['advanced_options'])) {
    omni_set_option('advanced_config', true);
  }
  if (isset($_POST['simple_options'])) {
    omni_set_option('advanced_config', false);
  }
  if (isset($_POST['factory_settings'])) {
    $omni_factory_options = array();
    update_option('omni_admin_options', $omni_factory_options);
    ?><div class="updated"><p><strong><?php _e('Default settings restored, remember to set RSID ID', 'omni')?></strong></p></div><?php
  }
  if (isset($_POST['info_update'])) {
    ?><div class="updated"><p><strong><?php 
    // process options form
    $omni_options = get_option('omni_admin_options');
    $omni_options['omni_report_sid']           		 = $_POST['omni_report_sid'];
    $omni_options['omni_s_code_path']       		 = $_POST['omni_s_code_path'];
    $omni_options['omni_domain_list']          		 = $_POST['omni_domain_list'];
    $omni_options['omni_img_script_path']       	 = $_POST['omni_img_script_path'];
    $omni_options['omni_track_loggedin']    	     = $_POST['omni_track_loggedin'];  
    $omni_options['omni_sProp_loggedin']             = $_POST['omni_sProp_loggedin'];
    $omni_options['omni_eVar_loggedin']              = $_POST['omni_eVar_loggedin'];
	$omni_options['omni_track_internal_search']      = $_POST['omni_track_internal_search']; 
    $omni_options['omni_sProp_internal_search']      = $_POST['omni_sProp_internal_search'];
    $omni_options['omni_eVar_internal_search']       = $_POST['omni_eVar_internal_search'];
	$omni_options['omni_track_internal_search_num']  = $_POST['omni_track_internal_search_num']; 
    $omni_options['omni_sProp_internal_search_num']  = $_POST['omni_sProp_internal_search_num'];
    $omni_options['omni_eVar_internal_search_num']   = $_POST['omni_eVar_internal_search_num'];
    $omni_options['omni_track_admins']    	         = $_POST['omni_track_admins']; 
    $omni_options['omni_url_campid']    	         = $_POST['omni_url_campid'];   
    $omni_options['omni_track_comments']    	     = $_POST['omni_track_comments']; 
    $omni_options['omni_event_comments']    	     = $_POST['omni_event_comments'];     
    $omni_options['omni_enable_widgets'] 		     = $_POST['omni_enable_widgets']; 
    $omni_options['omni_widget_js_path'] 		     = $_POST['omni_widget_js_path']; 
    $omni_options['omni_enable_dashboard_widget']    = $_POST['omni_enable_dashboard_widget']; 
    $omni_options['omni_widget_number']              = $_POST['omni_widget_number'];   
    
    update_option('omni_admin_options', $omni_options);

    _e('Options saved', 'omni')
    ?></strong></p></div><?php
	} 
	// Admin Page Form
  
	?>
<div class=wrap>
  <form method="post">
    <h2>Omniture - SiteCatalyst</h2>
    <fieldset class="options" name="general">
      <legend><?php _e('General settings', 'omni') ?></legend>
      <table width="100%" cellspacing="2" cellpadding="5" class="editform">

        <tr>
          <th nowrap valign="top" width="33%" align="left"><?php _e('JS Script Path', 'omni') ?></th>
          <td><input name="omni_s_code_path" type="text" id="omni_s_code_path" value="<?php echo omni_get_option('omni_s_code_path'); ?>" size="100" />
            <br />Enter the path to your SiteCatalyst s_code.js file (ie. http://www.yoursite.com/s_code.js ).
          </td>
        </tr>
        <tr>
          <th nowrap valign="top" width="33%" align="left"><?php _e('URL Campaign Variable', 'omni') ?></th>
          <td><input name="omni_url_campid" type="text" id="omni_url_campid" value="<?php echo omni_get_option('omni_url_campid'); ?>" size="10" />
            <br />Enter the url variable that will indentify campaigns. ( site.com/?campid=mycampcode Only enter campid)
          </td>
        </tr>
        <tr>
          <th nowrap valign="top" width="33%" align="left"><?php _e('Track Admins', 'omni') ?></th>
          <td><input name="omni_track_admins" type="checkbox" id="omni_track_admins" value="true" <?php if (omni_get_option('omni_track_admins')) echo "checked"; ?>  />
            <br />Enable tracking of blog administrators.
          </td>
        </tr>
        <tr>
          <th nowrap valign="top" width="33%" align="left"><?php _e('Internal Search', 'omni') ?></th>
          <td><input name="omni_track_internal_search" type="checkbox" id="omni_track_internal_search" value="true" <?php if (omni_get_option('omni_track_internal_search')) echo "checked"; ?>  />
            <br />Enable tracking of internal seraches
          </td>
        </tr>
        <tr>
          <th nowrap valign="top" width="33%" align="left"><?php _e('Internal Search: s.propN', 'omni') ?></th>
          <td><input name="omni_sProp_internal_search" type="text" id="omni_sProp_internal_search" value="<?php echo omni_get_option('omni_sProp_internal_search'); ?>" size="3" />
            <br />Enter the s.prop # that will hold the Internal Search Terms (NOTE: only enter the # 1 or 2 or 3 etc.)
          </td>
        </tr> 
        <tr>
          <th nowrap valign="top" width="33%" align="left"><?php _e('Internal Search Results', 'omni') ?></th>
          <td><input name="omni_track_internal_search_num" type="checkbox" id="omni_track_internal_search_num" value="true" <?php if (omni_get_option('omni_track_internal_search_num')) echo "checked"; ?>  />
            <br />Enable tracking of internal seraches results
          </td>
        </tr>
        <tr>
          <th nowrap valign="top" width="33%" align="left"><?php _e('Internal Search Results: s.propN', 'omni') ?></th>
          <td><input name="omni_sProp_internal_search_num" type="text" id="omni_sProp_internal_search_num" value="<?php echo omni_get_option('omni_sProp_internal_search_num'); ?>" size="3" />
            <br />Enter the s.prop # that will hold the Internal Search Results count (NOTE: only enter the # 1 or 2 or 3 etc.)
          </td>
        </tr> 
        <tr>
          <th nowrap valign="top" width="33%" align="left"><?php _e('Logged In', 'omni') ?></th>
          <td><input name="omni_track_loggedin" type="checkbox" id="omni_track_loggedin" value="true" <?php if (omni_get_option('omni_track_loggedin')) echo "checked"; ?>  />
            <br />Enable tracking of logged in status of users
          </td>
        </tr>
        <tr>
          <th nowrap valign="top" width="33%" align="left"><?php _e('Logged In: s.propN', 'omni') ?></th>
          <td><input name="omni_sProp_loggedin" type="text" id="omni_sProp_loggedin" value="<?php echo omni_get_option('omni_sProp_loggedin'); ?>" size="3" />
            <br />Enter the s.prop # that will hold the Logged In Status (NOTE: only enter the # 1 or 2 or 3 etc.)
          </td>
        </tr> 
        <tr>
          <th nowrap valign="top" width="33%" align="left"><?php _e('Comments ', 'omni') ?></th>
          <td><input name="omni_track_comments" type="checkbox" id="omni_track_comments" value="true" <?php if (omni_get_option('omni_track_comments')) echo "checked"; ?>  />
            <br />Enable tracking of comments to post in an event
          </td>
        </tr>
        <tr>
          <th nowrap valign="top" width="33%" align="left"><?php _e('Comments: eventN', 'omni') ?></th>
          <td><input name="omni_event_comments" type="text" id="omni_event_comments" value="<?php echo omni_get_option('omni_event_comments'); ?>" size="3" />
            <br />Enter the event # that will capture the comment event(NOTE: only enter the # 1 or 2 or 3 etc.)
          </td>
        </tr> 
        <tr>
          <th nowrap valign="top" width="33%" align="left"><?php _e('Enabled Reporting Widgets ', 'omni') ?></th>
          <td><input name="omni_enable_widgets" type="checkbox" id="omni_enable_widgets" value="true" <?php if (omni_get_option('omni_enable_widgets')) echo "checked"; ?>  />
            <br />Enable Reporting Widgets
          </td>
        </tr>
        <tr>
          <th nowrap valign="top" width="33%" align="left"><?php _e('# Of Widgets', 'omni') ?></th>
          <td><input name="omni_widget_number" type="text" id="omni_widget_number" value="<?php echo omni_get_option('omni_widget_number'); ?>" size="3" />
            <br />Enter the # of rows of reporting widgets to include: (Max of 3 rows. 3 widgets per row).  The Omniture SiteCatalyst Widget can only access reportlets created within SiteCatalyst and saved to a dashboard.
          </td>
        </tr> 
        <tr>
          <th nowrap valign="top" width="33%" align="left"><?php _e('JS Widget Path', 'omni') ?></th>
          <td><input name="omni_widget_js_path" type="text" id="omni_widget_js_path" value="<?php echo omni_get_option('omni_widget_js_path'); ?>" size="100" />
            <br />Enter the path to the SiteCatalyst Widget file (ie. https://sc.omniture.com/p/widget/current/js/widget.js ).
          </td>
        </tr>
        <tr>
          <th nowrap valign="top" width="33%" align="left"><?php _e('Add Widget To Dashboard ', 'omni') ?></th>
          <td><input name="omni_enable_dashboard_widget" type="checkbox" id="omni_enable_dashboard_widget" value="true" <?php if (omni_get_option('omni_enable_dashboard_widget')) echo "checked"; ?>  />
            <br />Enable (1) Reporting Widget in WordPress Dashboard
          </td>
        </tr>
      </table>
    </fieldset>
  
    <div class="submit">
      <input type="submit" name="info_update" value="<?php _e('Update options', 'omni') ?>" />
	  </div>
  </form>
</div><?php
 
}

function omni_insert_html_once($location, $html) {
  global $omni_footer_hooked;
  global $omni_html_inserted;
    $omni_footer_hooked = true;
    if (!$omni_html_inserted) {
      echo $html;
      }
}


function omni_get_tracker() {
  
  $result='<!-- user not tracked-->';

  if(is_home()) { 
	  $pageName = $category = $pageType = 'Blog Home';
  } elseif (is_page()) {
      $pageName = $category = the_title('', '', false);
      $pageType = 'Static Page';
  } elseif (is_single()) { 
      $categories = get_the_category();
      $pageName =  the_title('', '', false);
              $category = $categories[0]->name;
              $pageType = 'Article';
  } elseif (is_category()) {
     $pageName = $category = single_cat_title('', false);
     $pageName = 'Category: ' . $pageName;
	 $pageType = 'Category';
  } elseif (is_tag()) { 
 	 $pageName = $category = single_tag_title('', false);
  	 $pageType = 'Tag';
  } elseif (is_month()) { 
     list($month, $year) = split(' ', the_date('F Y', '', '', false));
     $pageName = 'Month Archive: ' . $month . ' ' . $year;
     $category = $pageType = 'Month Archive';
  } elseif (is_404()) {
  	$pageName = '404:'.$_SERVER["REQUEST_URI"];
  	$category = '404';
  }
  
  
  global $omni_camp_id_var;
  global $omni_camp_id_value;
  $omni_camp_id_var  .=  omni_get_option('omni_url_campid');
  $omni_camp_id_value = $_GET[$omni_camp_id_var];
  if ( $omni_camp_id_value == '' )
  	 {
  	 	$omni_camp = '';
  	 	
  	 }
  else
	  {
	  	$omni_camp = 's.campaign= "'.$omni_camp_id_value.'"';
	  }

  global $internal_search_value;
  $internal_search_value  =  $_GET["s"];
  if ( $internal_search_value == '' )
  	 {
  	 	$internal_search = '';
  	 	$internal_search_count = ''; 
  	 }
  else
   { 
   	  if (omni_get_option('omni_track_internal_search')) 
   	  {
   	  	$s_prop_for_search = omni_get_option('omni_sProp_internal_search');
   	  	$internal_search = 's.prop'.$s_prop_for_search.'= "'.$internal_search_value.'"' ;
   	  } else {
   	  	$internal_search = '';
   	  }
   	  if (omni_get_option('omni_track_internal_search_num')) 
   	  {
	   	  global $wp_query;
		  $omni_count_total .= $wp_query->found_posts;
   	  	  $internal_search_count = 's.prop'.omni_get_option('omni_sProp_internal_search_num').'= "'.$omni_count_total.'"' ;
   	  } else {
   	  	$internal_search_count = ''; 
   	  }

   	  $pageName = 'Internal Search'; 
   	  $category = 'Internal Search';
   	  $pageType = 'Internal Search';         		
   }

   if (omni_get_option('omni_track_comments') && isset($_SESSION['omnicommentflag']) && $_SESSION['omnicommentflag'] == 1) 
   	  {
   	  	$s_event_for_comments = omni_get_option('omni_event_comments');
   	  	$omni_events = 's.events="event'.$s_event_for_comments.'"' ;
   	  	$_SESSION['omnicommentflag'] = 0 ;
   	  } else {
   	  	$omni_events = '';
   	  }
 	if (omni_get_option('omni_track_loggedin')) 
   	  {
   	  	  if ( is_user_logged_in() ) {
		      $loggedin = 'Yes';
		  } else {
		      $loggedin = 'No';
		  }; 
   	  	$s_prop_for_loggedin = omni_get_option('omni_sProp_loggedin');
   	  	$omni_loggedin = 's.prop'.$s_prop_for_loggedin.'= "'.$loggedin.'"' ;
   	  } else {
   	  	$omni_loggedin = '';
   	  }



      // tracking code to be added to page
  
  if (!omni_get_option('omni_track_admins')  && (current_user_can('manage_options') )) {
       $result='<!-- user not tracked by Omniture-SiteCatalyst plugin v'.omni_version.': http://www.rudishumpert.com/projects/-->';
    } else {
    	 	$result='' .
    	 			'' .
    	 			'' .
    	 			'
			<!-- tracker added by Omniture-SiteCatalyst plugin v'.omni_version.': http://www.rudishumpert.com/projects/ -->
			<script type="text/javascript" src="'.omni_get_option('omni_s_code_path').'"></script>
			<script type="text/javascript"><!--
			
			s.pageName = "'.$pageName.'"
			s.channel = "'.$category.'"
			s.pageType = "'.$pageType.'"
			'.$internal_search.'
			'.$internal_search_count.'
			'.$omni_camp.'
		    '.$omni_loggedin.'
		    '.$omni_events.'

			/************* DO NOT ALTER ANYTHING BELOW THIS LINE ! **************/
			var s_code=s.t();if(s_code)document.write(s_code) //omniture variable
			-->
			</script>

	
			';
    }

  return $result;
}

function omni_wp_footer_track($OMNISluggo) {
  omni_insert_html_once('footer', omni_get_tracker());
  return $OMNISluggo;
}
// **************
// initialization
global $omni_footer_hooked;
$omni_footer_hooked=false;
add_action('admin_menu', 'omni_admin');
add_action('wp_footer', 'omni_wp_footer_track');
add_action('comment_post', 'omni_track_comment');
?>