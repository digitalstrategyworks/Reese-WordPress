<?php 

if ( !function_exists('displayUserLogins' ) ){
		function displayUserLogins(){
   $logLimit = $_GET['logLimit'];
   if($logLimit == ""){$logLimit = ".5";}
 if ( $logins = getUserLogins($logLimit * 50) ){ ?>
					
                    <form name="deleteSingleLogin" method="post" action="<?php $_SERVER['REQUEST_URI'];?>">
					<table class="widefat">
						<tr><td><strong>Username</strong></td><td align="center"><strong>Date / Time</strong></td><td></td></tr>
					<?php
					foreach ( $logins as $key => $value ){
						?><tr><td><?php echo $value->login_username;?></td><td align="center"><?php echo mysql2date( 'M d, Y / g:i A' , $value->login_date );?></td><td><input type="submit" onclick="return confirm('Press OK to delete <?php echo $value->login_username;?> on <?php echo mysql2date( 'M d, Y \\a\t g:i A' , $value->login_date );?>.');" name="deleteSingleID" value="<?php echo $value->login_ID ?>" class="deleteSingleLog" /></td></tr><?php
					}
					?><tr><td colspan="3" align="center"><a href="<?php $logLimit ++; echo get_bloginfo(wpurl).'/wp-admin/options-general.php?page=PassExpire&logLimit='.$logLimit; ?>"><strong>- Show 50 More -</strong></a></td></tr></table></form><?php
				}else{
					?>
<table class="widefat">
						<tr><td><strong>Username</strong></td><td align="center"><strong>Date / Time</strong></td><td></td></tr><tr><td colspan="3">There are currently no user logins recorded.</td></tr></table>

<?php
				} }}?>
