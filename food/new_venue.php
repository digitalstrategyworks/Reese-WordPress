<?php require_once('includes/connection.php'); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
	//only do form processing if submitted
	if ( isset($_POST['submit']) ) {
	
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
		
		$video_url = mysql_prep($_POST['video_url']);
		$tags = $_POST['tags'];
		
		$links = $_POST['links'];
		$linknames = $_POST['linknames'];
		
		$menus = $_POST['menus'];
		$menunames = $_POST['menunames'];
				
		$query = "INSERT INTO venues (
				id,
				name,
				category_id,
				address,
				website,
				hours,
				phone,
				price,
				location,
				description,
				image
			) VALUES (
				NULL,
				'{$name}',
				{$category_id},
				'{$address}',
				'{$website}',
				'{$hours}',
				'{$phone}',
				{$price},
				{$location},
				'{$description}',
				'{$image}'
			)";
												
		$result = mysql_query($query, $connection);

		$id = mysql_insert_id();
		
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
				$message = "The tags were successfully updated.";
			} else {
				// bad
				$message = "The tag update failed.";
				$message .= "<br />". mysql_error();
			}	
		
		}
		
		if( count($links) > 0 and $links[0] != '' ) {
			
			$query = "INSERT INTO links (
						id,
						venue_id,
						name,
						link
					) VALUES ";
						
			for ($counter = 0; $counter < count($links); $counter+=1) {
				if($counter > 0) {
					$query .= ",";
				}
			
				$link = mysql_prep($links[$counter]);
				$linkname = mysql_prep($linknames[$counter]);
				
				$query .= "( NULL, {$id}, '{$linkname}', '{$link}' )";
				
			}
			
			$result = mysql_query($query, $connection);
			
		}
		
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
			//works
		}
	}
?>

<?php include_once('includes/header.php'); ?>

		<?php include_once('includes/sidebar.php'); ?>
		
		<div id="content">
			<h2>Create New Venue</h2>
			<?php echo $message; ?>	
			<form enctype="multipart/form-data" action="new_venue.php" method="post">
				<?php include "venue_form.php" ?>
				<input type="submit" name="submit" value="Add" />
			</form>
			<br />
			<a href="content.php">Cancel</a><br />
		</div>

<?php include_once('includes/footer.php'); ?>