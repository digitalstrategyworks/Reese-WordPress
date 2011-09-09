<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/layout.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/960.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/button-style.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style/slider-style.css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/ticker-style.css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/flashblock.css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/page-player.css" media="screen" />
	
	<link href="http://cloud.webtype.com/css/c627f6fc-a07a-4bd6-8fa5-e26d70bbecb1.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/jquery-1.4.2.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/button-script.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/fontSize.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/scripts/jquery.ticker.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_directory'); ?>/scripts/jquery.scrollTo.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_directory'); ?>/scripts/elementdrop.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_directory'); ?>/scripts/slidy.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/captions.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/soundmanager2/soundmanager2-jsmin.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/soundmanager2/page-player.js"></script>
	<script type="text/javascript">
	
		$(function () {
			$('#js-news').ticker();
		});
		
	</script>
	
	<script type="text/javascript">
		$(function() {
     var offset = $("#box").offset();
     var topPadding = 50;
     $(window).scroll(function() {
         if ($(window).scrollTop() > offset.top) {
             $("#box").stop().animate({
                 marginTop: $(window).scrollTop() - offset.top + topPadding
             });
         } else {
             $("#box").stop().animate({
                 marginTop: 0
             });
         };
     });
 	});
	</script>
	
	<script type="text/javascript">

		soundManager.url = "<?php bloginfo('template_directory'); ?>/scripts/soundmanager2/swf/";
		soundManager.debugMode = false;
			
	</script>
	
	
	<meta name="googlebot" content="noindex,noarchive,follow" /> 
	<meta name="robots" content="noindex,follow" /> 
	<meta name="msnbot" content="noindex,follow" /> 
	
	<title>ReeseNews.org</title>
	
	<?php wp_head(); ?>
	
</head>

<body>
<div id="wrapper" class="container_16">
	<div id="page-wrap">
	
		<!-- ******************** begin header ******************** -->
		<div id="header" class="grid_16">	
			
			<!--begin toolbar -->
			<div id="toolbar" class="grid_3">
			</div><!--end toolbar-->
				
			<div id="headerLogo" class="grid_9">
				<a href="<?php bloginfo('url'); ?>"><div class="reese"></div><div class="category-label"><?php
					$header = get_category_header();
					
					?>
					
					<img src="<?php bloginfo("template_directory"); echo '/images/'; echo $header; echo '.png'; ?>" /> 
					</div>
				</a>
			</div>
			
			<!--begin mission -->
			<div id="mission" class="grid_10">
				<?php if( $header == "wire" ) {
					echo '<p>powered by ' . '<img src="http://www.reesenews.org/wp-content/themes/reesenews/images/cnn.png" /></p>';
				} else {
					echo "<p>powered by students at UNC's School of Journalism and Mass Communication</p>";
				} ?>
			</div><!-- end mission-->
			
			<div id="search" class="grid_4">
				<?php get_search_form(); ?>
			</div>
			
			<div id="below_header" class="grid_13">
				<div id="reeseNav">
					<div id="topNavButton">
						<img src="<?php bloginfo('template_directory'); ?>/images/navbutton.jpg" />
					</div>
					
					<div id="topNavDrawer">
						<div id="drawerTop">
							
						</div>
						
						<div id="drawerMiddle">
							<ul class="navLinks">
								<li><a href="<?php bloginfo('url'); ?>"><div class="menuSection">Home</div></a></li>
									
									<?php 
										$category_id = get_cat_ID('U');
										$category_link = get_category_link($category_id);
									?>
								
								<li><a href="<?php echo $category_link; ?>"><div class="menuSection">U</div></a></li>
									
									<?php 
										$category_id = get_cat_ID('Town');
										$category_link = get_category_link($category_id);
									?>
								
								<li><a href="<?php echo $category_link; ?>"><div class="menuSection">Town</div></a></li>
									
									<?php 
										$category_id = get_cat_ID('Biz');
										$category_link = get_category_link($category_id);
									?>
								
								<li><a href="<?php echo $category_link; ?>"><div class="menuSection">Biz</div></a></li>
									
									<?php 
										$category_id = get_cat_ID('Sport');
										$category_link = get_category_link($category_id);
									?>
								
								<li><a href="<?php echo $category_link; ?>"><div class="menuSection">Sport</div></a></li>
									
									<?php 
										$category_id = get_cat_ID('CHill');
										$category_link = get_category_link($category_id);
									?>
								
								<li><a href="<?php echo $category_link; ?>"><div class="menuSection">CHill</div></a></li>
									
									<?php 
										$category_id = get_cat_ID('Wire');
										$category_link = get_category_link($category_id);
									?>
								
								<li><a href="<?php echo $category_link; ?>"><div class="menuSection">Wire</div></a></li>
									
									<?php 
										$category_id = get_cat_ID('Med');
										$category_link = get_category_link($category_id);
									?>
								
								<li><a href="<?php echo $category_link; ?>"><div class="menuSection">Med</div></a></li>
									
									<?php 
										//$category_id = get_cat_ID('Blogs');
										//$category_link = get_category_link($category_id);
									?>
								
								<li><a href="#"><div class="menuSection">Blogs</div></a></li>
								
									<?php 
										//$category_id = get_cat_ID('Community');
										//$category_link = get_category_link($category_id);
									?>
								
								<li><a href="#"><div class="menuSection">Sport</div></a></li>
							</ul>
						</div>
						
						<div id="drawerBottom">
							
						</div>
					</div>
				</div>
				
				<div id="navOverlay">
				</div>
				
				<script type="text/javascript">
				
					$("div#topNavDrawer").hide();
					$("div#navOverlay").css('opacity', 0.05);
					
					$("div#navOverlay").hover( function() {
						$(this).css('opacity', 0);
					}, function() {
						$(this).css('opacity', 0.05);	
						
					});
						
					$("div#navOverlay").click(
					  function () {
						$("div#topNavDrawer").stop(true, true).slideToggle();
					});
				
			
				</script>
				
				<div id="date_time" class="grid_3">
					<div id="date"><script type="text/javascript">
						var d = new Date();
						var curr_date = d.getDate();
						var curr_month = d.getMonth();
						var curr_year = d.getFullYear();
						
						var month_name=new Array(12);
						month_name[0]="Jan";
						month_name[1]="Feb";
						month_name[2]="Mar";
						month_name[3]="Apr";
						month_name[4]="May";
						month_name[5]="June";
						month_name[6]="July";
						month_name[7]="Aug";
						month_name[8]="Sept";
						month_name[9]="Oct";
						month_name[10]="Nov";
						month_name[11]="Dec";
						
						document.write(month_name[curr_month] + " " + curr_date + " <br />" + curr_year);
					
						</script>
					</div>
					
					<div id="time"><span class="blue" id="clock"><script type="text/javascript">
						
						function start_clock() {
							var curr_time = new Date();
							var hours = curr_time.getHours();
							var minutes = curr_time.getMinutes();
							
							if (minutes < 10){
								minutes = "0" + minutes;
							}
											
							if (hours > 12 && hours < 24) {
								hours = hours - 12;
								display = hours + "." + minutes + "p";
							} else if (hours == 12) {
								display = hours + "." + minutes + "p";
							} else if (hours == 0) {
								hours = 12;
								display = hours + "." + minutes + "a";
							} else if (hours < 12 && hours > 0) {
								display = hours + "." + minutes + "a";
							} else {
								//impossible
							}
							
							document.getElementById('clock').innerHTML = display;
							
							setTimeout("start_clock()", 60000);
						}
						
						start_clock();
					
						</script></span>
					</div>
					
				</div>
				
				<div id="ticker-wrapper" class="no-js grid_10">
					<ul id="js-news" class="js-hidden">
						<!-- pulls a list of 4 posts from category 'ticker' into list items -->
						 <?php
						 global $post;
						 $tmp_post = $post;
						 $myposts = get_posts('numberposts=4&offset=0&category_name=ticker');
						 foreach($myposts as $post) :
						   setup_postdata($post);
						 ?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						 <?php endforeach; ?>
						 <?php $post = $tmp_post; ?>
					</ul>
				</div>				
			
			</div><!--end below_header -->
			
			<div id="headerResources">
				<div id="forecastButton">
						<img src="<?php bloginfo('template_directory'); ?>/images/5daybutton.jpg" />
				</div>
				<div id="forecastOverlay">
				</div>
				<?php include 'weather.php' ?>	
			</div>
			
			<script>
				$("div#weatherDrawer").hide();
					
				$("div#forecastOverlay").click(
				  function () {
					$("div#weatherDrawer").stop(true, true).slideToggle();
				  }
				);
				
				$("div#forecastOverlay").css('opacity', 0.05);
					
				$("div#forecastOverlay").hover( function() {
					$(this).css('opacity', 0);
				}, function() {
					$(this).css('opacity', 0.05);	
					
				});
				
			</script>
				
				
		</div><!-- end header --><div class="clear"></div>
		<?php
			if(function_exists('the_breadcrumb') && !is_front_page())
			{ ?>
		<div id="crumbs">
		<?php
		    	the_breadcrumb();
		?>
		</div>
		<?php	}
		?>
