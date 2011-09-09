<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
	$id = mysql_prep($_GET['cat']);
?>

<?php
	if ($category = get_category_by_id($id)) {
		
		$query = "DELETE FROM categories WHERE id = {$id} LIMIT 1";
		
		$result = mysql_query($query, $connection);
		
		if (mysql_affected_rows() == 1) {
			redirect_to("content.php");
		} else {
			// Deletion Failed
			echo "<p>Category deletion failed.</p>";
			echo "<p>" . mysql_error() . "</p>";
			echo "<a href=\"content.php\">Return to Main Page</a>";
		}
	} else {
		// subject didn't exist in database
		redirect_to("content.php");
	}
?>

<?php mysql_close($connection); ?>