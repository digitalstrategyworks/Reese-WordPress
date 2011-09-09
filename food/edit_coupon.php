<?php require_once('includes/connection.php'); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php

	//make sure a coupon has been selected
	if (intval($_GET['coupon']) == 0) {
		redirect_to('content.php');
	}
	
	$back = "Cancel";
		
	//only do form processing if submitted
	if ( isset($_POST['submit']) ) {
	
		$id = mysql_prep($_GET['coupon']);
		$name = mysql_prep($_POST['name']);
		$venue_id = mysql_prep($_GET['venue']);
		$content = mysql_prep($_POST['content']);
					
		$query = "UPDATE coupons SET 
					name = '{$name}',
					venue_id = {$venue_id},
					content = '{$content}'
					WHERE id = {$id}";
												
		$result = mysql_query($query, $connection);
				
		if (mysql_affected_rows() == 1) {
			// good
			$message .= "The coupon was successfully updated.";
			$back = "Back";
		} else {
			// bad
			$message .= "The coupon update failed.";
			$message .= "<br />". mysql_error();
		}
	}
?>

<?php include_once('includes/header.php'); ?>

<?php find_selected_page(); ?>

		<?php include_once('includes/sidebar.php'); ?>
		
		<div id="content">
			<?php echo $message; ?>
			<h2>Edit coupon for <?php echo $the_venue['name']; ?>:</h2>
			<form action="edit_coupon.php?coupon=<?php echo $the_coupon['id']; ?>&venue=<?php echo $the_venue['id']; ?>" method="post">
				
				<?php include_once('coupon_form.php'); ?>
				
				<br />
				<input type="submit" name="submit" value="Update" />&nbsp;&nbsp;
				
			</form>
			
			<a href="delete_coupon.php?venue=<?php echo $the_venue['id']; ?>&coupon=<?php echo $the_coupon['id']; ?>" onclick="return confirm('Are you sure you want to delete this coupon?');">Delete Coupon</a>
			
			<a href="edit_venue.php?venue=<?php echo $the_venue['id']; ?>"><?php echo $back; ?></a>
		</div>

<?php include_once('includes/footer.php'); ?>