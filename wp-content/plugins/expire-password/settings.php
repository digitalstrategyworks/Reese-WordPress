<?php $GetDays = mysql_query("SELECT * FROM ".$wpdb->prefix."users WHERE user_email='".$wpdb->prepare($current_user->user_email)."'");
		$GotQuery = mysql_fetch_array($GetDays);
		$lengthOfDays = $GotQuery['PwdSettings'];	?>

			<table class="widefat"><tr><td>
		<form name="updateDays" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>">
			<p>Expire passwords after: <select name="passDaysGood" class="nudgeUp">
			<option <?php if($lengthOfDays == '-15'){echo 'selected="selected"';}?> value="-15">15 Days</option>
			<option <?php if($lengthOfDays == '-30'){echo 'selected="selected"';}?> value="-30">30 Days</option>
			<option <?php if($lengthOfDays == '-60'){echo 'selected="selected"';}?> value="-60">60 Days</option>
			<option <?php if($lengthOfDays == '-90'){echo 'selected="selected"';}?> value="-90">90 Days</option>
			<option <?php if($lengthOfDays == '-120'){echo 'selected="selected"';}?> value="-120">120 Days</option> 
			<option <?php if($lengthOfDays == '-240'){echo 'selected="selected"';}?> value="-240">240 Days</option>
			<option <?php if($lengthOfDays == '-14'){echo 'selected="selected"';}?> value="-14">Expire All Now</option> 
			</select><input type="submit" name="Submit" value="Change" class="nudgeUp"/><p>
		</form>
</td></tr><tr><td>
<form action="<?php $_SERVER['REQUEST_URI'];?>" method="post" name="deleteAllLogins"><p>User Access Log: <input type="submit" name="deleteAllLogins" value="Delete All Logins" /></p></form>
</td></tr></table>
