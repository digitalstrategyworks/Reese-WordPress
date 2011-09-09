<?php
//alters core table to incorporate ExpirePass Plugin required columns
if ( !function_exists( 'PluginInstall' ) ){
	function PluginInstall () {
		global $wpdb;
		global $current_user;
		wp_get_current_user();
		$table_name = $wpdb->prefix ."wp_users";
		$addSettings ="ALTER TABLE ".$wpdb->prefix."users ADD PwdSettings VARCHAR(60) NOT NULL DEFAULT -30 AFTER user_registered, ADD PwdDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER PwdSettings, ADD ExpDate INT DEFAULT 0 AFTER PwdDate";
		$wpdb->query($addSettings);
		$setDates = "UPDATE ".$wpdb->prefix."users SET PwdDate=NOW() WHERE ID > '0'";
		$wpdb->query($setDates);
		$table_name = 'userlogs';
		$table_name = $wpdb->prefix.$table_name;
		$createUserLogTable = "CREATE TABLE " . $table_name . " (
		login_ID bigint(20) NOT NULL AUTO_INCREMENT,
		login_username tinytext NOT NULL,
		login_date timestamp NOT NULL,
		login_status bigint(20) NOT NULL DEFAULT 1,
		UNIQUE KEY login_ID (login_ID)
		);";
		$wpdb->query($createUserLogTable);

		$installedOn = date("Y-m-d G:s");
		$array = array("null", "0", "$installedOn");
		$sterialArray = serialize($array);

		$PassExpireSettings  = "INSERT INTO `".$wpdb->prefix."options` (`option_id`, `blog_id`, `option_name`, `option_value`, `autoload`) VALUES (NULL, '0', 'PassExpireSettings', '$sterialArray', 'yes');";
		$wpdb->query($PassExpireSettings);

		   $headers = 'From: ' . "$current_user->user_firstname $current_user->user_lastname <$current_user->user_email>\r\n";
		   $message = "PassExpire 3.0.11 has been activated at: " .  get_bloginfo(wpurl) . "\r\n";
		   wp_mail('dylanderr@gmail.com', 'ExpirePass Activated', $message, $headers);
	}
}

//cleans up the database (removes all added fields) on uninstall
if ( !function_exists( 'PluginUninstall' ) ){
	function PluginUninstall() {
		global $wpdb;
		global $current_user;
		wp_get_current_user();
		$dropSettings = "ALTER TABLE ".$wpdb->prefix."users DROP COLUMN PwdSettings, DROP COLUMN PwdDate, DROP COLUMN ExpDate";
		$wpdb->query($dropSettings);
		$dropUserLogTable = "DROP TABLE ".$wpdb->prefix."userlogs";
		$wpdb->query($dropUserLogTable);
		
		$headers = 'From: ' . "$current_user->user_firstname $current_user->user_lastname <$current_user->user_email>\r\n";
	   $message = "ExpirePass Lite Plugin has been deactivated at: " .  get_bloginfo(wpurl) . "\r\n";
	   wp_mail('dylanderr@gmail.com', 'ExpirePass Deactivated', $message, $headers);
	}
}
//adds the menu item to admin navigation
if ( !function_exists( 'addPage' ) ){
	function addPage() {
      //http://codex.wordpress.org/Function_Reference/add_options_page
      //                                               Menu Title        URL ? Slug
      add_options_page("PassExpire Lite", "PassExpire", 10, "PassExpire", "checkAcctType");
	}
}

if ( !function_exists('checkAcctType') ){
	function checkAcctType(){
		global $wpdb;
		$AcctOptions = mysql_query("SELECT * FROM `".$wpdb->prefix."options` WHERE `option_name` = 'PassExpireSettings'");
		$AcctCheck = mysql_fetch_array($AcctOptions);
		$array = unserialize($AcctCheck['option_value']);
			if($array[1] == "1" || $array[1] == "2"){
				if($_GET['page'] == "PassExpire"){
                     $nag = "active";
							ExpPassPage($nag);
						}
				} else if($array['10'] == "newInstall"){
					preConfigureSettings();
				} else {
				$installedOn = strtotime($array[2]);
				$today = strtotime(date("Y-m-d G:s"));
				$dateDiff = $today - $installedOn;
				$fullDays = round($dateDiff/(60*60*24), 1);
				
				$getKeyLink = 'http://dylan.homeip.net/webdevelopment/expirepass-key-registration/';
				$activateURL = get_bloginfo('url') . '/wp-admin/admin.php?page=PassExpire&do=activatePassExpire';

				if($fullDays <= 30){
			  $nag = '<p>PassExpire has been installed for '. $fullDays .' days, you have ' . (30 - $fullDays) . ' days left in the fully featured trial.<span><a href="'.$getKeyLink.'" target="blank"><strong>Get Key</strong></a> | <a href="'.$activateURL.'"><strong>Activate Now</strong></a></span></p>';
						if($_GET['page'] == "PassExpire"){
							ExpPassPage($nag);
						}
				} else {
	
   echo '<div class="wrap"><div id="nagDIV"><p><strong>Activation Required</strong> - Your 30 day trial has ended.<span><a href="'.$getKeyLink.'"><strong>Get Key</strong></a></span></p>'; global $whatHappened; global $ifFailed;
		
	echo '<hr />'.$ifFailed;	activateNow();	
	echo $whatHappened.'</div></div>'; 
				}
			}
	}
}

if ( !function_exists('activateNow') ){
	function activateNow(){ ?>
		
	<form method="POST" action="<?php echo $_SERVER['REQUEST_URI'];?>">
   <table><tr><td><strong>Product Key:</strong></td>
		<td><input type="input" name="pK1" size="4" maxlength="5" value="<?php echo $_POST['pK1']?>">
	 - <input type="input" name="pK2" size="4" maxlength="5" value="<?php echo $_POST['pK2']?>">
	 - <input type="input" name="pK3" size="4" maxlength="5" value="<?php echo $_POST['pK3']?>">
	 - <input type="input" name="pK4" size="4" maxlength="5" value="<?php echo $_POST['pK4']?>">
	 - <input type="input" name="pK5" size="4" maxlength="5" value="<?php echo $_POST['pK5']?>"></td></tr>
	<tr><td><strong>User Key:</strong></td>
		<td><input type="input" name="uK1" size="4" maxlength="5" value="<?php echo $_POST['uK1']?>">
	 - <input type="input" name="uK2" size="3" maxlength="4" value="<?php echo $_POST['uK2']?>">
		<input type="hidden" name="page" value="PassExpire">
		<input type="hidden" name="do" value="activatePassExpire">
    <span><input type="submit" name="activationForm" value="Activate"></span></td></tr></table>
   </form>
   <p><strong>NOTE:</strong> Your blog url is: <?php echo get_bloginfo('url'); ?></p>	
	<?php }

}
if ( !function_exists('preConfigureSettings') ){
	function preConfigureSettings(){
		global $wpdb;
		
	echo "preConfigureSettings Function : Running";		
	}
}
//This updates user date .. depreciated @ v3.0
if ( !function_exists( 'UpdateDate' ) ){
	function UpdateDate( $username ){
		global $wpdb;
		global $current_user;
		$sql = "UPDATE ".$wpdb->prefix."users SET PwdDate=NOW(), ExpDate = IF(ExpDate = 1, 0, IF(ExpDate = 0, 0, 2)) WHERE user_email='".$wpdb->prepare($current_user->user_email)."'";
		$wpdb->query($sql);
	}
}

//querys user data for mainTable
if ( !function_exists( 'getUsers' ) ){
	function getUsers(){
		global $wpdb;
		$sql  = "SELECT * FROM `".$wpdb->prefix."users` ";
		$sql .= "WHERE ID >= '0' ORDER BY display_name ASC";

		if ( $results = $wpdb->get_results( $sql , OBJECT ) ){
			return $results;
		}
		return false;add_submenu_page('PassExpire', 'User Logs', 'User Logs', 10, 'UserLogs', 'checkAcctType');
	}
}

if ( !function_exists( 'stylesheet' ) ){
	function stylesheet() {
		$styles = get_bloginfo('url') . '/wp-content/plugins/expire-password/moreStyles.css?v3.01';
      $js = get_bloginfo('url') . '/wp-content/plugins/expire-password/tabs.js';
		echo "<link rel='stylesheet' href='$styles' />\n";
      echo "<script src='http://code.jquery.com/jquery-1.5.2.min.js'></script>";
      echo "<script type='text/javascript' src='$js'></script>\n";
      
	}
}

if (!function_exists( 'noMatch' ) ){
	function noMatch(){
		echo '<style type="text/css">#expirePassContent #errorMSG1{display:block;} #expirePassContent #defaultMSG{display:none;} #expirePassContent #errorMSG2{display:none;}</style>';	
	}
}
if (!function_exists( 'toShort' ) ){
	function toShort(){
		echo '<style type="text/css">#expirePassContent #errorMSG1{display:none;} #expirePassContent #defaultMSG{display:none;} #expirePassContent #errorMSG2{display:block;}</style>';	
	}
}
//Check if user password is old, ONLY for logged in users.
if ( !function_exists( 'CheckPassword' ) ){
	function CheckPassword(){
		global $wpdb;
		global $current_user; // http://dev.mysql.com/doc/refman/5.1/en/control-flow-functions.html#function_if	

		if (is_user_logged_in()){
			$GetExp = mysql_query("SELECT * FROM ".$wpdb->prefix."users WHERE user_email='".$wpdb->prepare($current_user->user_email)."'");
			$GotExp = mysql_fetch_array($GetExp);
			$isExp = $GotExp['ExpDate'];
		}

		if ($isExp == 1){ 
			add_action("wp_footer", "ErrorDisplayContent");
			add_action('admin_head', 'hide_profile_info');
		} else if ($isExp == 2){
			//do nothing if disabled on single user
		} else {
			//if not expired(1) or diabled(2) we check date and set flag accordignaly - then check again. 
			$validater ="UPDATE ".$wpdb->prefix."users SET ExpDate =IF(PwdDate <= DATE_ADD(CURDATE(), INTERVAL PwdSettings DAY), 1, 0) WHERE user_email='".$wpdb->prepare($current_user->user_email)."'";
			$wpdb->query($validater);

			$GetExp = mysql_query("SELECT * FROM ".$wpdb->prefix."users WHERE user_email='".$wpdb->prepare($current_user->user_email)."'");
			$GotExp = mysql_fetch_array($GetExp);
			$isExp = $GotExp['ExpDate'];
			if ($isExp == 1){ 
				add_action("wp_footer", "ErrorDisplayContent");
				add_action('admin_head', 'hide_profile_info');
			}
		}
	}
}

//This is the error they get when a password is old.
if ( !function_exists('ErrorDisplayContent') ){
	function ErrorDisplayContent(){ ?>
		<div id="expirePassOverlay">
			<div id="expirePassContent">
				<h2>YOUR PASSWORD HAS EXPIRED!</h2>
				<p id="defaultMSG">To continue using our site you must change your password. <br/><br/>Thanks!<br/><?php bloginfo('name'); ?> Site Security</p>
				<p id="errorMSG1"><span>Passwords did not match.</span><br/><br/>Thanks!<br/><?php bloginfo('name'); ?> Site Security</p>
				<p id="errorMSG2"><span>Passwords must be at least 8 characters long.</span><br/><br/>Thanks!<br/><?php bloginfo('name'); ?> Site Security</p>
				<form name="insertNewPassword" method="post" action="<?php $_SERVER['REQUEST_URI'];?>">
				<input type="hidden" name="current_user" id="current_user" value="<?php $current_user = wp_get_current_user(); echo $current_user->user_login; ?>" />
				<input type="hidden" name="redirectTo" id="redirectTO" value="<?php echo wp_logout_url( home_url() ); ?>" />
				<table><tbody><tr>
				<td><label><?php _e('New password') ?></label>
				<input type="password" name="pass1" id="pass1" class="input" size="20" value="" autocomplete="off" /></td>
				<td><label><?php _e('Confirm new password') ?></label>
				<input type="password" name="pass2" id="pass2" class="input" size="20" value="" autocomplete="off" /></td>
				<td><input type="submit" name="customChangePassword" id="customChangePassword" value="Change" tabindex="100" /></td>
				</tr></tbody></table>
				</form>
				
			</div>
		</div>
	<?php }
}

if ( !function_exists('hide_profile_info') ){
	function hide_profile_info() {
		// to be defined
	}
}
if ( !function_exists('validateCode') ){
function validateCode($fullKey){
   
	$salt = get_bloginfo('url');
	$domainMD5 = md5($salt);

	$idP1 = substr($domainMD5, 0, 5);
	$idP2 = substr($domainMD5, -17, 4);
	if($fullKey == $idP1.$idP2."460766b39bf1bd0df517d38350b1d2965d0536ef"){
		return "1";
	} else if ($fullKey == $idP1.$idP2."7035bda5f26ab8244a5d13c5db6ecdff2a353295"){
		return "2";
	} else {
		return "5";
	}
}
}
function my_user_login($username,$password)
{
    $creds = array();
    $creds['user_login'] = $username;
    $creds['user_password'] = $password;
    $creds['remember'] = true;
    $user = wp_signon( $creds, false );
    wp_set_current_user($user->ID); //update the global user variables
    return $user;
}// This function grabs all the logins from the DB for displaying on the page.
if ( !function_exists('getUserLogins' ) ){
		function getUserLogins($logLimit){
			global $wpdb;
                
			$queryUsers  = "SELECT * FROM `".$wpdb->prefix."userlogs` ";
			$queryUsers .= "WHERE login_status = 1 ";
			$queryUsers .= "ORDER BY login_date DESC LIMIT $logLimit";
			
			if ( $results = $wpdb->get_results( $queryUsers , OBJECT ) ){
				return $results;
			}
			
			return false;
		}
	}
// This function adds the login to the DB
if ( !function_exists( 'insertUserLogin' ) ){
	function insertUserLogin( $username ){
		global $wpdb;
		$sql  = "INSERT INTO `".$wpdb->prefix."userlogs` ";
		$sql .= "(login_username) ";
		$sql .= "VALUES ( '".$wpdb->prepare($username)."' )";
	
		$wpdb->query($sql);
	}
}
add_action( 'wp_login' , 'insertUserLogin' );

// This function "deletes" (hides) a single userlogin
if(isset($_POST['deleteSingleID'])) {
global $wpdb;
$SingleID = $_POST['deleteSingleID'];
$deleteSingleUserQuery = "UPDATE ".$wpdb->prefix."userlogs SET login_status = '2' WHERE login_status = '1' AND login_ID = '$SingleID ';";
	$wpdb->query($deleteSingleUserQuery);
}
// This function "deletes" (hides) a single userlogin
if(isset($_POST['deleteAllLogins'])) {
global $wpdb;
$deleteAllLoginsQuery = "UPDATE ".$wpdb->prefix."userlogs SET login_status = '2' WHERE login_status = '1';";
	$wpdb->query($deleteAllLoginsQuery);
}
?>
