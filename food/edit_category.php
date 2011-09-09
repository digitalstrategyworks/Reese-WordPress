<?php require_once('includes/connection.php'); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
	 
	//make sure a category has been selected
	if (intval($_GET['cat']) == 0) {
		redirect_to('content.php');
	}
	
	//only do form processing if submitted
	if ( isset($_POST['submit']) ) {
		$id = mysql_prep($_GET['cat']);
		$name = mysql_prep($_POST['name']);
		
		$query = "UPDATE categories SET 
					name = '{$name}' 
					WHERE id={$id}";
							
		$result = mysql_query($query, $connection);
		
		if (mysql_affected_rows() == 1) {
			// good
			$message = "The subject was successfully updated.";
		} else {
			// bad
			$message = "The subject update failed.";
			$message .= "<br />". mysql_error();
		}
	}
?>


<?php include_once('includes/header.php'); ?>
<?php find_selected_page(); ?>

		<?php include_once('includes/sidebar.php'); ?>
		
		<div id="content">
		
			<?php if( isset($message) ) {
				echo '<p>'.$message.'</p>';
			}
			?>
			
			<?php if( !is_null($the_cat) ) {?><h2>Edit Category: <?php
					
					echo $the_cat['name'];
										
			?></h2> <?php } ?>
			
			<form action="edit_category.php?cat=<?php echo $the_cat['id']; ?>" method="post">	
				<?php include_once('category_form.php'); ?>
				
				<input type="submit" name="submit" value="Update" />&nbsp;&nbsp;
				<br />
				<a href="delete_category.php?cat=<?php echo $the_cat['id']; ?>" onclick="return confirm('Are you sure you want to delete this category? You are probably making a huge mistake.');">Delete Category</a>
			</form>
			<br />
			<a href="content.php">Cancel</a><br />
		</div>

<?php include_once('includes/footer.php'); ?>