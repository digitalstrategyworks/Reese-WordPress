<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
  <meta name="description" content="<?php bloginfo('description'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link href="http://cloud.webtype.com/css/c627f6fc-a07a-4bd6-8fa5-e26d70bbecb1.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/jquery-mobile-min.css" />
	<script src="<?php bloginfo('template_directory'); ?>/jquery-1.4.3.min.js"></script>
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<script type='text/javascript'>
	function websitez_extendMenu(){
		$('.exMenu').toggle("fast");
	}
	
	function changeScreen() {
		window.resizeTo(320, 440);
	}
	</script>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head() ?>
</head>

<body <?php body_class(); ?>>
	<div id="wrapper_mobile" data-role="page">
		<div id="logo">
			<img src="<?php bloginfo('template_directory'); ?>/images/dm_logo_mobile.png" height="30%" width="30%" />
		</div>
		<div id="powered">
			<img src="<?php bloginfo('template_directory'); ?>/images/poweredby_reese.png" />
		</div>
		<div class="ui-grid-e" data-role="header" data-theme="e" style="margin-bottom: 5px;">
			<h1><a href="<?php bloginfo('url'); ?>" title="UNC Dance Marathon Live"><?php bloginfo('name'); ?></a></h1>
			
			<?php wp_nav_menu( array('menu' => 'main_menu') ); ?>
		</div><!-- /grid-b -->
		
		<div id="contact">
			<p>919.448.5405 | <a href="mailto:social@reesenews.org">social@reesenews.org</a></p>
		</div>