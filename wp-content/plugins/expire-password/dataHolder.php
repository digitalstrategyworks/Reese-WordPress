<?php
if ( !function_exists('ExpPassPage') ){
   function ExpPassPage($nag){
   global $wpdb;
   global $current_user;?>
<div class="wrap">
<?php if ( $data = getUsers() ){	?>
   <?php if($nag != "active") {echo '<div id="nagDIV">'.$nag; global $ifFailed;
   $cancelURL = get_bloginfo('url') . '/wp-admin/admin.php?page=PassExpire';

   if ($_GET['do'] == "activatePassExpire" && $whatHappened == ""){ echo '<hr /><span><a href="'.$cancelURL.'">Cancel</a></span>'.$ifFailed;	activateNow();	}
   echo '</div>';} global $whatHappened; echo $whatHappened; ?>

   <?php } ?>
   <ul class="tabs">
      <li><a href="#tab1">PassExpire</a></li>
      <li><a href="#tab2">User Log</a></li>
      <li><a href="#tab3">Settings</a></li>
   </ul>
   <div class="tab_container">
    <div id="tab1" class="tab_content">
      <?php include('passExpireTable.php'); ?>
    </div>
    <div id="tab2" class="tab_content">
      <?php include('userLogsTable.php'); displayUserLogins();?>
    </div>
    <div id="tab3" class="tab_content">
      <?php include('settings.php'); ?>
    </div>
</div>
</div>
<?php } } ?>
