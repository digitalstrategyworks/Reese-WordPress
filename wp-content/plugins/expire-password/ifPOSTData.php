<?php
//sets the users pasword to new password.
if(isset($_POST['customChangePassword'])) {
global $wpdb;
$cNP1 = $_POST['pass1'];
$cNP2 = $_POST['pass2'];
$user_id = $_POST['current_user'];
	if(strlen($cNP1) < "8" || strlen($cNP2) < "8"){add_action('wp_head', 'toShort');
		} else {
			if($cNP1 == $cNP2 && $cNP1 != "" && $cNP2 != ""){
	
			$hash = wp_hash_password($cNP1);
			$wpdb->update($wpdb->users, array('user_pass' => $hash, 'user_activation_key' => ''), array('user_login' => $user_id) );
			$orInjection = "UPDATE ".$wpdb->prefix."users SET ExpDate = '0', PwdDate = NOW() WHERE user_login = '$user_id'";
			$wpdb->query($orInjection);
			my_user_login("$user_id","$cNP1");
			} else {
				//if anything fails, show it again
				add_action('wp_head', 'noMatch');
				add_action("wp_footer", "ErrorDisplayContent");
			}
		}
}

if(isset($_POST['activationForm'])){
global $wpdb;
$combineParts = array($_POST['pK1'], $_POST['pK2'], $_POST['pK3'], $_POST['pK4'], $_POST['pK5']);

$combined = implode("-", $combineParts);
$inputKeyEncrypted = sha1($combined);

$fullKey = $_POST['uK1'].$_POST['uK2'].$inputKeyEncrypted;

$keyResults = validateCode($fullKey);

$oldSettingsQuery = mysql_query("SELECT * FROM `".$wpdb->prefix."options` WHERE `option_name` = 'PassExpireSettings'");
$OldSettings = mysql_fetch_array($oldSettingsQuery);
$array = unserialize($OldSettings['option_value']);

$cancelURL = get_bloginfo('url') . '/wp-admin/admin.php?page=PassExpire';
if($keyResults == "1"){
	array_splice($array, 1, -1);array_splice($array, 1, 0, "1");
	$insert = serialize($array);
	$wpdb->query("UPDATE ".$wpdb->prefix."options SET option_value = '$insert' WHERE option_name = 'PassExpireSettings'");
	$whatHappened = '<div id="whatHappened"><p><strong>Personal License | Key installation = Success</strong><span><a href="'.$cancelURL.'"><strong>Close</strong></a></p></div>';
} else if($keyResults == "2"){
	array_splice($array, 1, -1);array_splice($array, 1, 0, "2");
	$insert = serialize($array);
	$wpdb->query("UPDATE ".$wpdb->prefix."options SET option_value = '$insert' WHERE option_name = 'PassExpireSettings'");
	$whatHappened = '<div id="whatHappened"><p><strong>Business License | Key installation = Success</strong><span><a href="'.$cancelURL.'"><strong>Close</strong></a></p></div>';
} else {
	$ifFailed = '<div id="ifFailed"><p>'.$buda.'<strong>Key not valid!</strong> Please check that you typed everything in correctly and try again.</p></div>';
}



}
//expires a single user.
if(isset($_POST['ExpID'])) {
	global $wpdb;
	$ExpID = $_POST['ExpID'];
	$orInjection = "UPDATE ".$wpdb->prefix."users SET ExpDate = '1' WHERE ID = '$ExpID'";
	$wpdb->query($orInjection);
}

//disables a single user
if(isset($_POST['DisableID'])) {
	global $wpdb;
	$DisableID = $_POST['DisableID'];
	$orInjection = "UPDATE ".$wpdb->prefix."users SET ExpDate = '2' WHERE ID = '$DisableID'";
	$wpdb->query($orInjection);
}

//sets how many days a password is good.
if(isset($_POST['passDaysGood'])) {
global $wpdb;
$passDaysGood = $_POST['passDaysGood'];
if($passDaysGood <= "-15"){
		$Injection = "UPDATE ".$wpdb->prefix."users SET PwdSettings=$passDaysGood WHERE ID > 0";
		$wpdb->query($Injection);
	} else {
		$orInjection = "UPDATE ".$wpdb->prefix."users SET ExpDate = 1 WHERE ID > 0";
		$wpdb->query($orInjection);
	}
}
?>
