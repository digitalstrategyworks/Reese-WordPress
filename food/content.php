<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include_once('includes/header.php'); ?>
<?php find_selected_page(); ?>

		<?php include_once('includes/sidebar.php'); ?>
		
		<div id="content">
			<h2>Welcome to Chapel Hill, <?php echo $_SESSION['user_name']; ?></h2>
			<p>To begin, select a category or venue to edit in the left sidebar. Or, you can add a new venue or category by clicking the plus buttons below.</p>
		</div>
		
		<div class="clear"></div>
<?php include_once('includes/footer.php'); ?>