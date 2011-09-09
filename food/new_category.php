<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include_once('includes/header.php'); ?>
<?php find_selected_page(); ?>

		<?php include_once('includes/sidebar.php'); ?>
		
		<div id="content">
			<h2>Add Category</h2>
			<form action="create_category.php" method="post">
				
				<?php include_once('category_form.php'); ?>
				
				<input type="submit" value="Add" />
			</form>
			
			<a href="content.php">Cancel</a>
		</div>

<?php include_once('includes/footer.php'); ?>