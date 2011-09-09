<div id="left">
	<?php
		echo navigation();
	?>
	
	<a class="add_new" href="new_category.php">+ a new category</a>
	<a class="add_new" href="new_venue.php">+ a new venue</a>
	<?php if( is_admin() ) { ?>
	<a class="add_new" href="add_user.php">+ a new user</a>
	<?php } ?>
</div>