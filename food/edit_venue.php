<?php require_once('includes/connection.php'); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
	 
	//make sure a venue has been selected
	if (intval($_GET['venue']) == 0) {
		redirect_to('content.php');
	}
		
	//only do form processing if submitted
	if ( isset($_POST['submit']) ) {
	
		$id = mysql_prep($_GET['venue']);
		$name = mysql_prep($_POST['name']);
		$category_id = mysql_prep($_POST['category']);
		$address = mysql_prep($_POST['address']);
		$website = mysql_prep($_POST['website']);
		$hours = mysql_prep($_POST['hours']);
		$phone = mysql_prep($_POST['phone']);
		$price = mysql_prep($_POST['price']);
		$location = mysql_prep($_POST['location']);
		$description = mysql_prep($_POST['description']);
		$image = mysql_prep(basename($_FILES['image']['name']));
		
		$photo_target = "images/";
		$photo_target = $photo_target . basename($_FILES['image']['name']);
				
		$tags = $_POST['tags'];
		
		$links = $_POST['links'];
		$linknames = $_POST['linknames'];
		
		$menus = $_POST['menus'];
		$menunames = $_POST['menunames'];
				
		$query = "UPDATE venues SET 
					name = '{$name}',
					category_id = {$category_id},
					address = '{$address}',
					website = '{$website}',
					hours = '{$hours}',
					phone = '{$phone}',
					price = {$price},
					location = {$location},
					description = '{$description}',
					image = '{$image}'
					WHERE id={$id}";
												
		$result = mysql_query($query, $connection);
		
		if (mysql_affected_rows() == 1) {
			// good
			$message .= "The venue was successfully updated.";
		} else {
			// bad
		}
		
		$query = "DELETE FROM venues_tags
						WHERE venue_id = {$id}";
						
		$result = mysql_query($query, $connection);
		
		if( count($tags) > 0 ) {		
			
			$query = "INSERT INTO venues_tags (
							id,
							venue_id,
							tag_id
						) VALUES ";			
			
			for ($counter = 0; $counter < count($tags); $counter+=1) {
				if($counter > 0) {
					$query .= ",";
				}
			
				$tag = $tags[$counter];
				
				$query .= "( NULL, '{$id}', '{$tag}' )";
				
			}
		
			$result = mysql_query($query, $connection);
			
			if (mysql_affected_rows() > 0) {
				// good
				$message .= "The tags were successfully updated.";
			} else {
				// bad
				$message .= "The tag update failed.";
				$message .= "<br />". mysql_error();
			}	
		
		}
		
		$query = "DELETE FROM links
						WHERE venue_id = {$id}";
						
		$result = mysql_query($query, $connection);
		
		
		if( count($links) > 0 and $links[0] != '' ) {
			
			$query = "INSERT INTO links (
						id,
						venue_id,
						name,
						link
					) VALUES ";
						
			for ($counter = 0; $counter < count($links); $counter+=1) {
				if($links[$counter] != "") {
					if($counter > 0) {
						$query .= ",";
					}
				
					$link = mysql_prep($links[$counter]);
					$linkname = mysql_prep($linknames[$counter]);
					
					$query .= "( NULL, {$id}, '{$linkname}', '{$link}' )";
				}
			}
			
			$result = mysql_query($query, $connection);
			
		}
		
		$query = "DELETE FROM menus
						WHERE venue_id = {$id}";
						
		$result = mysql_query($query, $connection);
		
		if( count($menus) > 0 and $menus[0] != '' ) {
			
			$query = "INSERT INTO menus (
						id,
						venue_id,
						link,
						description
					) VALUES ";
						
			for ($counter = 0; $counter < count($menus); $counter+=1) {
				if($menus[$counter] != "") {
					if($counter > 0) {
						$query .= ",";
					}
				
					$menu = mysql_prep($menus[$counter]);
					$menuname = mysql_prep($menunames[$counter]);
					
					$query .= "( NULL, {$id}, '{$menu}', '{$menuname}' )";
				}
			}
			
			$result = mysql_query($query, $connection);
			
		}
			
				
		//check to make sure the file can move, and move it
		if(move_uploaded_file($_FILES['image']['tmp_name'], $photo_target)) 
		{ 
		 
		} else { 
		 		 
		} 
							
	}
?>

<?php include_once('includes/header.php'); ?>

<?php find_selected_page(); ?>

		<?php include_once('includes/sidebar.php'); ?>
		
		<div id="content">
			<?php if( isset($message) ) { echo '<p>'.$message.'</p>'; } ?>
			<h2>Edit Venue: <?php echo $the_venue['name']; ?></h2>
			<form enctype="multipart/form-data" action="edit_venue.php?venue=<?php echo $the_venue['id']; ?>" method="post">
				
				<?php include_once('venue_form.php'); ?>
				
				<input type="submit" name="submit" value="Update" />&nbsp;&nbsp;
				
			</form>
			
			<h3 class="coupons">Coupons for this venue:</h3>
			
			<?php echo display_coupons($the_venue['id']); ?>
			
			<br />
			<a href="delete_venue.php?venue=<?php echo $the_venue['id']; ?>" onclick="return confirm('Are you sure you want to delete this venue?');">Delete Venue</a>
			
			<a href="content.php">Cancel</a>
		</div>

<?php include_once('includes/footer.php'); ?>