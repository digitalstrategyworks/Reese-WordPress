<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
	$id = mysql_prep($_GET['coupon']);
	$venue = mysql_prep($_GET['venue']);
?>

<?php
	if ($coupon = get_coupon_by_id($id)) {
		
		$query = "DELETE FROM coupons WHERE id = {$id} LIMIT 1";
				
		$result = mysql_query($query, $connection);
		
		if (mysql_affected_rows() == 1) {
			redirect_to("edit_venue.php?venue=" . $venue);
		} else {
			// Deletion Failed
			echo "<p>Coupon deletion failed.</p>";
			echo "<p>" . mysql_error() . "</p>";
			echo "<a href=\"content.php\">Return to Main Page</a>";
		}
	} else {
		// subject didn't exist in database
		redirect_to("content.php");
	}
?>

<?php mysql_close($connection); ?>