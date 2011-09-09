<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
	$name = mysql_prep($_POST['name']);
?>

<?php
	$query = "INSERT INTO categories (
				id,
				name
			) VALUES (
				NULL,
				'{$name}'
			)";
			
	$result = mysql_query($query, $connection);
	if ($result) {
		// Success!
		redirect_to("content.php");
	} else {
		// Display error message.
		echo "<p>Subject creation failed.</p>";
		echo "<p>" . mysql_error() . "</p>";
	}
?>

<?php mysql_close($connection); ?>