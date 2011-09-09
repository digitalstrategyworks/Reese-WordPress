<?php
	// This file is the place to store all basic functions

	function mysql_prep( $value ) {
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists( "mysql_real_escape_string" ); // i.e. PHP >= v4.3.0
		if( $new_enough_php ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}
	
	function get_category_by_id($category_id) {
		global $connection;
		
		$query = "SELECT * ";
		$query .= "FROM categories ";
		$query .= "WHERE id = " . $category_id ." ";
		$query .= "LIMIT 1";
		
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
		
		if ($category = mysql_fetch_array($result_set)) {
			return $category;
		} else {
			return NULL;
		}
	}
	
	function get_venue_by_id($venue_id) {
		global $connection;
		
		$query = "SELECT * ";
		$query .= "FROM venues ";
		$query .= "WHERE id = " . $venue_id ." ";
		$query .= "LIMIT 1";
		
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
		
		if ($venue = mysql_fetch_array($result_set)) {
			return $venue;
		} else {
			return NULL;
		}
	}

	function get_coupon_by_id($coupon_id) {
		global $connection;
		
		$query = "SELECT * ";
		$query .= "FROM coupons ";
		$query .= "WHERE id = " . $coupon_id ." ";
		$query .= "LIMIT 1";
		
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
		
		if ($coupon = mysql_fetch_array($result_set)) {
			return $coupon;
		} else {
			return NULL;
		}
	}
	
	function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed: " . mysql_error());
		}
	}
	
	function get_all_categories() {
		global $connection;
		$query = "SELECT * 
				FROM categories 
				ORDER BY id ASC";
		$category_set = mysql_query($query, $connection);
		confirm_query($category_set);
		return $category_set;
	}
	
	function get_all_venues_for_category($category_id) {
		global $connection;
		$query = "SELECT *
				FROM venues
				WHERE category_id = {$category_id}
				ORDER BY name ASC";
		
		$venue_set = mysql_query($query, $connection);
		confirm_query($venue_set);
		return $venue_set;
	}
	
	function get_all_venues() {
		global $connection;
		$query = "SELECT *
				FROM venues";
		
		$venue_set = mysql_query($query, $connection);
		confirm_query($venue_set);
		
		$arr = array();
		
		while( $venue = mysql_fetch_assoc($venue_set)) {
			array_push($arr, $venue);
		}
		
		return $arr;
	}
	
	function get_location_by_id($id) {
		global $connection;
		$query = "SELECT description, number
				FROM positions
				WHERE id={$id}";
				
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
		
		if ($location = mysql_fetch_assoc($result_set)) {
			return $location;
		} else {
			return NULL;
		}
	}

	
	function find_selected_page() {
		global $the_cat;
		global $the_venue;
		global $the_coupon;
		
		if( isset($_GET['cat'] ) ) {
			$sel_cat = $_GET['cat'];
			$the_cat = get_category_by_id($sel_cat);
			$sel_venue = NULL;
			$the_venue = NULL;
		}
		
		elseif( isset($_GET['venue'] ) ) {
			$sel_venue = $_GET['venue'];
			$the_venue = get_venue_by_id($sel_venue);
			$sel_cat = NULL;
			$the_cat = NULL;
			
			if( isset($_GET['coupon'] ) ) {
				$sel_coupon = $_GET['coupon'];
				$the_coupon = get_coupon_by_id($sel_coupon);
			}
		}
		
		else {
			$sel_venue = NULL;
			$sel_cat = NULL;
			$sel_coupon = NULL;
		}
	}
	
	function get_coupons_xml($id) {
		
		global $connection;
				
		$query = "SELECT name, content
				FROM coupons
				WHERE venue_id = {$id}
				ORDER BY id ASC";
		
		$coupon_set = mysql_query($query, $connection);
		
		$arr = array();
		
		while( $coupon = mysql_fetch_assoc($coupon_set)) {
			array_push($arr, $coupon);
		}
				
		return $arr;
	
	}
	
	function get_all_coupons_for_venue($venue_id) {
		global $connection;
				
		$query = "SELECT *
				FROM coupons
				WHERE venue_id = {$venue_id}
				ORDER BY id ASC";
		
		$coupon_set = mysql_query($query, $connection);
		confirm_query($coupon_set);
		return $coupon_set;
	}
	
	function get_all_tags() {
		global $connection;
		
		$query = "SELECT *
				FROM tags";
				
		$tag_set = mysql_query($query, $connection);
		$arr = array();
		
		while( $tag = mysql_fetch_assoc($tag_set) ) {
			array_push($arr, $tag);
		}
		
		return $arr;
	}
	
	function get_all_locations() {
		global $connection;
		
		$query = "SELECT *
				FROM positions";
				
		$location_set = mysql_query($query, $connection);
		$arr = array();
		
		while( $loc = mysql_fetch_assoc($location_set) ) {
			array_push($arr, $loc);
		}
		
		return $arr;
	}
	
	function get_all_links($venue_id) {
		global $connection;
		
		$query = "SELECT *
					FROM links
					WHERE venue_id = {$venue_id}
					ORDER BY id ASC";
		
		$link_set = mysql_query($query, $connection);
		$arr = array();
		
		while( $link = mysql_fetch_assoc($link_set) ) {
			array_push($arr, $link);
		}
		
		return $arr;
	}
	
	function get_all_menus($venue_id) {
		global $connection;
		
		$query = "SELECT *
					FROM menus
					WHERE venue_id = {$venue_id}
					ORDER BY id ASC";
		
		$menu_set = mysql_query($query, $connection);
		$arr = array();
		
		while( $menu = mysql_fetch_assoc($menu_set) ) {
			array_push($arr, $menu);
		}
		
		return $arr;
	}
	
	function get_all_tags_for_venue($venue_id) {
		global $connection;
				
		$query = "SELECT *
				FROM venues_tags
				WHERE venue_id = {$venue_id}";
		
		$tag_set = mysql_query($query, $connection);
		$arr = array();
		
		while( $tag = mysql_fetch_assoc($tag_set) ) {
			array_push($arr, $tag);
		}
		
		return $arr;
	}

	function navigation() {
		$output = "<ul class=\"categories\">";
		$category_set = get_all_categories();
		
		while ( $category = mysql_fetch_array($category_set) ) {
			$output .= "<li><a href=\"edit_category.php?cat=" . urlencode($category['id']) . "\">" . $category['name'] . "</a></li>";
			
			$output .= "<ul class=\"restaurants\">";
			$venue_set = get_all_venues_for_category($category['id']);
			
			while( $venue = mysql_fetch_array($venue_set) ) {
				$output .= "<li><a href=\"edit_venue.php?venue=" . urlencode($venue['id']) . "\">" . $venue['name'] . "</a></li>";
			}
			
			$output .= "</ul>";
		}
		
		$output .= "</ul>";
		
		return $output;
	}
	
	function display_coupons($id) {
		$output = "<ul class=\"coupons\">";
				
		$coupon_set = get_all_coupons_for_venue($id);
		
		while( $coupon = mysql_fetch_array($coupon_set) ) {
			$output .= "<li><a href=\"edit_coupon.php?coupon=" . urlencode($coupon['id']) . "&venue=" . urlencode($id) . "\">" . $coupon['name'] . "</a></li>";
		}
		
			$output .= "<li><a href=\"new_coupon.php?venue=" . urlencode($id) . "\">" . "Add New Coupon" . "</a></li>";
		
		$output .= "</ul>";
		
		return $output;
	}

?>