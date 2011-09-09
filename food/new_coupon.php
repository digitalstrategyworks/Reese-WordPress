<?php require_once('includes/connection.php'); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
	 
	//make sure a coupon has been selected
	if (intval($_GET['venue']) == 0) {
		redirect_to('content.php');
	}
		
	//only do form processing if submitted
	if ( isset($_POST['submit']) ) {
	
		$name = mysql_prep($_POST['name']);
		$venue_id = mysql_prep($_GET['venue']);
		$content = mysql_prep($_POST['content']);
					
		$query = "INSERT INTO coupons (
					id,
					venue_id,
					name,
					content
				) VALUES (
					NULL,
					{$venue_id},
					'{$name}',
					'{$content}'
				)";
												
		$result = mysql_query($query, $connection);
		
		if (mysql_affected_rows() == 1) {
			// good
			$message .= "The coupon was successfully added.";
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
			
			<h2>Add a new coupon for <?php echo $the_venue['name']; ?>:</h2>
			<form action="new_coupon.php?venue=<?php echo $the_venue['id']; ?>" method="post">
				
				<?php include_once('coupon_form.php'); ?>
				
				<br />
				<input type="submit" name="submit" value="Add" />&nbsp;&nbsp;
				
			</form>
						
			<a href="edit_venue.php?venue=<?php echo $the_venue['id']; ?>"><?php echo $back; ?></a>
		</div>

<?php include_once('includes/footer.php'); ?>