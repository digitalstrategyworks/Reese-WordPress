<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/layout.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/960.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/ticker-style.css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/flashblock.css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/page-player.css" media="screen" />
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
	
	
	<!--[if IE 7]> <link href="<?php bloginfo('template_directory'); ?>/style/ie.css" rel="stylesheet" type="text/css"> <![endif]-->
	
	<link href="http://cloud.webtype.com/css/c627f6fc-a07a-4bd6-8fa5-e26d70bbecb1.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/jquery-1.4.2.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/fontSize.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/scripts/jquery.ticker.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_directory'); ?>/scripts/jquery.scrollTo.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_directory'); ?>/scripts/elementdrop.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_directory'); ?>/scripts/jquery.orbit.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/captions.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/soundmanager2/soundmanager2-jsmin.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/soundmanager2/page-player.js"></script>
	
	<style type="text/css">
	  		#featured { width: 940px; height: 273px; margin-left:10px; margin-bottom:20px; background: #b9cfe1 url('<?php bloginfo('template_directory'); ?>/images/orbit/loading.gif') no-repeat center center; overflow: hidden; }
	  		
	  	</style>
	  	
	<!--[if IE]>
			<style type="text/css">
				.timer { display: none !important; }
				div.caption { background:transparent; filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000,endColorstr=#99000000);zoom: 1; }
			</style>
		<![endif]-->
		
	<script type="text/javascript">
			$(document).ready(function() {
				$('#featured').orbit({
					'bullets': true,
					'timer' : true,
					'animation' : 'fade'
				});
			});
		</script>
	
	<script type="text/javascript"> 
		var $buoop = {vs:{i:7,f:2,o:10.01,s:3,n:9}} 
		$buoop.ol = window.onload; 
		window.onload=function(){ 
		 if ($buoop.ol) $buoop.ol(); 
		 var e = document.createElement("script"); 
		 e.setAttribute("type", "text/javascript"); 
		 e.setAttribute("src", "http://browser-update.org/update.js"); 
		 document.body.appendChild(e); 
		} 
	</script> 

	<script type="text/javascript">
	
		$(function () {
			$('#js-news').ticker();
		});
		
	</script>
	
	<?php if ( is_single() ) : ?>
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
	<?php endif; ?>
	
	<script type="text/javascript">

		soundManager.url = "<?php bloginfo('template_directory'); ?>/scripts/soundmanager2/swf/";
		soundManager.debugMode = false;
			
	</script>
	
	<title>Reesenews</title>
	<meta name="google-site-verification" content="Kw9LwWk0_aLRFpSMklHTfILWk5zOA8ZLY_xtkd2KOI0" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo get_permalink($post->ID); ?>" />
	<meta property="og:site_name" content="reesenews" />
	<meta property="fb:admins" content="tonyzeoli, noel.cody, 1396140343 " />
	
	<?php wp_head(); ?>
	
</head>

<body>
<div id="topics">
	<div id="rLogo"><a href="http://reesenews.org/"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" /></a></div>
	
	<?php wp_nav_menu(array('menu' => 'top_menu')); ?>
	
</div>


<div id="wrapper" class="container_16">
	<div id="page-wrap">
		<div id="IEFix" style="visibility:hidden">&nbsp;</div>
		<!-- ******************** begin header ******************** -->
		<div id="header" class="grid_16">	
							
			<div id="headerLogo" class="grid_9">
				<a href="<?php bloginfo('url'); ?>"><div class="reese"></div><div class="category-label"><?php
					$header = get_category_header();
					
					?>
					
					<img src="<?php bloginfo("template_directory"); echo '/images/'; echo $header; echo '.png'; ?>" /> 
					</div>
				</a>
			</div>
			
			<div id="beta"><p>beta</p></div>
			
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
					
				$("div#headerResources").click(
				  function () {
					$("div#weatherDrawer").stop(true, true).slideToggle();
				  }
				);
				
				$("div#forecastOverlay").css('opacity', 0.05);
					
				$("div#headerResources").hover( function() {
					$("div#forecastOverlay").css('opacity', 0);
				}, function() {
					$("div#forecastOverlay").css('opacity', 0.05);	
					
				});
				
			</script>
				
				
		</div><!-- end header --><div class="clear"></div>
