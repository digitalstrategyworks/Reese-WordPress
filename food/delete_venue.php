<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
	$id = mysql_prep($_GET['venue']);
?>
<?php
	if ($venue = get_venue_by_id($id)) {
		
		$query = "DELETE FROM venues WHERE id = {$id} LIMIT 1";
		
		$result = mysql_query($query, $connection);
		
		$query = "DELETE FROM coupons WHERE venue_id = {$id}";
		
		$result = mysql_query($query, $connection);
		
		$query = "DELETE FROM venues_tags WHERE venue_id = {$id}";
		
		$result = mysql_query($query, $connection);
		
		$query = "DELETE FROM links WHERE venue_id = {$id}";
		
		$result = mysql_query($query, $connection);
		
		$query = "DELETE FROM menus WHERE venue_id = {$id}";
		
		$result = mysql_query($query, $connection);
		
		//if (mysql_affected_rows() == 1) {
			redirect_to("content.php");
		/*} else {
			// Deletion Failed
			echo "<p>Category deletion failed.</p>";
			echo "<p>" . mysql_error() . "</p>";
			echo "<a href=\"content.php\">Return to Main Page</a>";
		}*/
	} else {
		// subject didn't exist in database
		redirect_to("content.php");
	}
?>

<?php mysql_close($connection); ?>