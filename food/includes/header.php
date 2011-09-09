<?php require_once('includes/connection.php'); ?>
<?php include_once('includes/functions.php'); ?>
<html>
	<head>
		<link rel="stylesheet" href="style/admin.css" />
		<title>Chapel Hill | A CMS</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
		<script>
			$(document).ready(function() {
				init();
			})
			
			function init() {
				$('span.plus_link').live('click', function() {
					$(this).html('-');
					$(this).removeClass('plus_link');
					$(this).addClass('minus_link');
				
					var html = '<p>Link: <input type="text" name="links[]" size="30" class="link" value="" /> Description: <input type="text" name="linknames[]" size="30" value="" /> <span class="plus_link">+</span></p>';
					
					$('div#links').append(html);
				});
				
				$('span.minus_link').live('click', function() {
					$(this).parent().remove();
					$(this).remove();
				});
				
				$('span.plus_menu').live('click', function() {
					$(this).html('-');
					$(this).removeClass('plus_menu');
					$(this).addClass('minus_menu');
				
					var html = '<p>Link: <input type="text" name="menus[]" size="30" class="link" value="" /> Description: <input type="text" name="menunames[]" size="30" value="" /> <span class="plus_menu">+</span></p>';
					
					$('div#menus').append(html);
				});
				
				$('span.minus_menu').live('click', function() {
					$(this).parent().remove();
					$(this).remove();
				});
			}
			
		</script>
	</head>

	<body>
	<div id="wrapper">
		<div id="header">
			<a href="content.php"><img src="images/reese.png" /><h1>Everything Chapel Hill</h1></a>
			<?php if( logged_in() ) { ?><a class="logout" href="logout.php">Log out</a><?php } ?>
		</div>