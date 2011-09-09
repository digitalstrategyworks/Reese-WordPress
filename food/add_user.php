<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
	
	// START FORM PROCESSING
	if (isset($_POST['submit'])) { // Form has been submitted.
		
		$username = trim(mysql_prep($_POST['username']));
		$admin = trim(mysql_prep($_POST['admin']));
		$password = trim(mysql_prep($_POST['password']));
		
		$hashed_password = sha1($password);

		
		$query = "INSERT INTO users (
						user_name, admin, hashed_password
					) VALUES (
						'{$username}', {$admin}, '{$hashed_password}'
					)";
		$result = mysql_query($query, $connection);
		if ($result) {
			$message = "The user was successfully created.";
			$back = "Back";
		} else {
			$message = "The user could not be created.";
			$message .= "<br />" . mysql_error();
		}
		
	} else { // Form has not been submitted.
		$username = "";
		$password = "";
		
	}
	
?>
<?php include_once('includes/header.php'); ?>
	<?php include_once('includes/sidebar.php'); ?>
		<div id="content">
			<?php echo $message; ?>
			<h2>Add New User</h2>
						
			<form action="add_user.php" method="post">
				<p>Username: <input type="text" name="username" /></p>
				<p>Password: <input type="password" name="password" /></p>
				<p><input type="checkbox" name="admin" value="1" /> Admin</p>
				
				<input type="submit" name="submit" value="Add" />
			</form>
			<br />
			<a href="content.php"><?php if( isset($back) ) { echo $back; } else { echo "Cancel"; } ?></a><br />
		</div>
<?php include_once('includes/footer.php'); ?>