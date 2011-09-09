		<form name="makeOld_single" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>">
			<table class='widefat' >
			<tr><td><strong>Name</strong></td><td align="left"><strong>E-Mail</strong></td><td align="left"><strong>Changed Password On</strong></td><td></td></tr>
			<?php
			foreach ( $data as $key => $value ){ ?>
			<tr><td><a href="user-edit.php?user_id=<?php echo $value->ID;?>"><?php echo $value->display_name;?></a></td><td align="left"><a href="mailto:<?php echo $value->user_email;?>"><?php echo $value->user_email;?></a></td><td align="left"><?php echo mysql2date( 'M d, Y \\a\t g:i A' , $value->PwdDate );?></td><td><input title="Expire password now" type="submit" onclick="return confirm('Press OK to expire <?php echo $value->display_name;?>s password now.');" name="ExpID" value="<?php echo $value->ID ?>" class="useLockImage"/>

			<input type="submit" title="Disable PassExpire" onclick="return confirm('Press OK to disable plugin for: <?php echo $value->display_name;?>. To renable the plugin for this user click the lock on the List Users page.');" name="DisableID" value="<?php echo $value->ID ?>" class="useDisableImage"/>
			</td></tr>
			<?php	} ?>
			</table>
		</form>
		
