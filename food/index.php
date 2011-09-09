<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php

	if( logged_in() ) {
		redirect_to('content.php');
	}

	if (isset($_POST['submit'])) { // Form has been submitted.
	
		print_r($_POST['submit']);
	
		$username = trim(mysql_prep($_POST['username']));
		$password = trim(mysql_prep($_POST['password']));
		$hashed_password = sha1($password);
		
		// Check database to see if username and the hashed password exist there.
		$query = "SELECT id, user_name, admin ";
		$query .= "FROM users ";
		$query .= "WHERE user_name = '{$username}' ";
		$query .= "AND hashed_password = '{$hashed_password}' ";
		$query .= "LIMIT 1";
		$result_set = mysql_query($query);
		
		confirm_query($result_set);
		if (mysql_num_rows($result_set) == 1) {
			
			$found_user = mysql_fetch_array($result_set);
			$_SESSION['user_id'] = $found_user['id'];
			$_SESSION['admin'] = $found_user['admin'];
			$_SESSION['user_name'] = $found_user['user_name'];
			
			redirect_to("content.php");
		} else {
			// username/password combo was not found in the database
			$message = "Username/password combination incorrect.<br />
				Please make sure your caps lock key is off and try again.";
		}
		
	} else { // Form has not been submitted.
		if (isset($_GET['logout']) && $_GET['logout'] == 1) {
			$message = "You are now logged out.";
		} 
		$username = "";
		$password = "";
	}
?>

<?php include("includes/header.php"); ?>
		
		<div id="content">
			<?php echo $message; ?>
		
			<h2>Login</h2>
			
			<form action="index.php" method="post">
			
				<p>Username: <input type="text" name="username" maxlength="30" value="<?php echo htmlentities($username); ?>" /></p>
				<p>Password: <input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>" /></p><br />
							
				<input type="submit" name="submit" value="Login" />
			
			</form>
			
		</div>
				
<?php include("includes/footer.php"); ?>