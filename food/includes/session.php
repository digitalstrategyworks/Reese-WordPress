<?php
	
	session_start();
	
	function logged_in() {
		return isset($_SESSION['user_id']);
	}
	
	function is_admin() {
		return isset($_SESSION['admin']);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to("index.php");
		}
	}
?>
