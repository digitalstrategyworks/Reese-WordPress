<?php //venue form ?>
<p>Venue name: <input type="text" name="name" size="25" value="<?php echo $the_venue['name']; ?>" id="menu" /></p>

<p>Category: <select name="category">
	<?php
		$category_set = get_all_categories();
		$category_count = mysql_num_rows($category_set);
						
		while ( $category = mysql_fetch_array($category_set) ) {
			echo "<option value=\"{$category['id']}\"";
			if( $the_venue['category_id'] == $category['id'] ) { echo " selected"; }
			echo ">{$category['name']}</option>";
		}
	?>
</select></p>

<p>Address: <textarea name="address" rows="5" cols="50"><?php echo $the_venue['address']; ?></textarea></p>
<p>Website: <input type="text" name="website" size="30" value="<?php echo $the_venue['website']; ?>" /></p>
<p>Hours: <textarea name="hours" rows="10" cols="60"><?php echo $the_venue['hours']; ?></textarea></p>
<p>Phone: <input type="text" name="phone" size="15" maxlength="12" value="<?php echo $the_venue['phone']; ?>" /> (xxx-xxx-xxxx)</p>
<p>Price: <select name="price">
			<option value="1" <?php if($the_venue['price'] == 1) { echo "selected"; } ?>>$</option>
			<option value="2" <?php if($the_venue['price'] == 2) { echo "selected"; } ?>>$$</option>
			<option value="3" <?php if($the_venue['price'] == 3) { echo "selected"; } ?>>$$$</option>
			<option value="4" <?php if($the_venue['price'] == 4) { echo "selected"; } ?>>$$$$</option>
			</select></p>
			
<p>Tags:</p>
<?php $tags = get_all_tags(); ?>
<?php $selected = get_all_tags_for_venue($the_venue['id']); ?>

<p><?php foreach($tags as $tag) { ?>
	<input type="checkbox" name="tags[]" <?php foreach($selected as $select) {
		if( $tag['id'] == $select['tag_id'] ) {
			print 'checked';
			break;
		}		
	} ?> value="<?php echo $tag['id']; ?>" > <?php echo $tag['name']; ?><br />
<?php } ?></p>

<?php $locations = get_all_locations(); ?>
<p>Location: <select name="location">
				<option>Select</option>
				<?php foreach($locations as $loc) { ?>
					<option value="<?php echo $loc['id']; ?>" <?php if($the_venue['location'] == $loc['id']) { echo "selected"; } ?>><?php echo $loc['description']; ?></option>
				<?php } ?>
				</select></p>
			
<p>Description: <textarea name="description" rows="6" cols="60"><?php echo $the_venue['description']; ?></textarea></p>

<p>Image: <input type="hidden" name="MAX_FILE_SIZE" value="100000" /><input type="file" name="image" /><?php if( $the_venue['image'] ) { echo "<img src=\"images/".$the_venue['image']."\" />"; } ?></p>
<br />
<div id="links">
	<h3>Links</h3>
	<?php $links = get_all_links($the_venue['id']); ?>
	<?php foreach($links as $link) { ?>
		<p>Link: <input type="text" name="links[]" class="link" size="30" value="<?php echo $link['link']; ?>" /> Description: <input type="text" name="linknames[]" size="30" value="<?php echo $link['name']; ?>" /> <span class="minus_link">-</span></p>
	<?php } ?>
	<p>Link: <input type="text" name="links[]" size="30" class="link" value="" /> Description: <input type="text" name="linknames[]" size="30" value="" /> <span class="plus_link">+</span></p>
</div>
<br />
<div id="menus">
	<h3>Menus</h3>
	<?php $menus = get_all_menus($the_venue['id']); ?>
	<?php foreach($menus as $menu) { ?>
		<p>Menu Link: <input type="text" name="menus[]" class="link" size="30" value="<?php echo $menu['link']; ?>" /> Name: <input type="text" name="menunames[]" size="30" value="<?php echo $menu['description']; ?>" /> <span class="minus_menu">-</span></p>
	<?php } ?>
	<p>Menu Link: <input type="text" name="menus[]" size="30" class="link" value="" /> Description: <input type="text" name="menunames[]" size="30" value="" /> <span class="plus_menu">+</span></p>
</div>