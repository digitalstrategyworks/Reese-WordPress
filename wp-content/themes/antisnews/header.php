<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?> charset=<?php bloginfo('charset'); ?>" />
<?php $AntisnewsOptions=get_antisnewsoptions();?>

<title><?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php bloginfo('description'); ?><?php } ?><?php if ( is_search() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Search Results for  <?php printf(__('\'%s\''), $s); } ?><?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?><?php if ( is_page() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php wp_title(''); ?><?php } ?><?php if ( is_category() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Archive&nbsp;|&nbsp;<?php single_cat_title(); ?><?php } ?><?php if ( is_month() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Archive&nbsp;|&nbsp;<?php the_time('F'); ?><?php } ?><?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Tag Archive&nbsp;|&nbsp;<?php  single_tag_title("", true); } } ?></title>

<?php global $themeoptionsprefix; if($AntisnewsOptions[$themeoptionsprefix.'_deactivatethememeta'] != 'deactivate'){ ?>
<meta name="keywords" content="<?php if (have_posts() && is_single()) { while(have_posts()) { the_post(); if(has_tag()) { $posttags = get_the_tags();if ($posttags) {foreach($posttags as $tag) {echo $tag->name . ','; }}} } } else { $tags = get_tags(array('orderby' => 'count', 'order' => 'DESC')); $xt = 1; foreach ($tags as $tag) { if ($xt <= 20) { echo $tag->name.", "; } $xt++; } }?><?php if($AntisnewsOptions[$themeoptionsprefix.'_metakeywords']){echo $AntisnewsOptions[$themeoptionsprefix.'_metakeywords'];} ?>" />
<meta name="description" content="<?php if (have_posts() && is_single() OR is_page()):while(have_posts()):the_post();$out_excerpt = str_replace(array("\r\n", "\r", "\n"), "", get_the_excerpt());echo apply_filters('the_excerpt_rss', $out_excerpt);endwhile;elseif(is_category() OR is_tag()):if(is_category()):echo "Posts related to Category:".ucfirst(single_cat_title("", FALSE));elseif(is_tag()):echo "Posts related to Tag:".ucfirst(single_tag_title("", FALSE));endif;else: ?><?php global $themeoptionsprefix; if($AntisnewsOptions[$themeoptionsprefix.'_metadescription']){echo $AntisnewsOptions[$themeoptionsprefix.'_metadescription'];}elseif(get_bloginfo('description')){echo get_bloginfo('description');}?><?php endif; ?>" />
<?php } ?>
<link rel="stylesheet" href="<?php echo get_option('home');?>?antisnews-my-style=load-style-antisnews" type="text/css"/>
<!--[if lte IE 6]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style-ie6.css" type="text/css" media="screen" /><![endif]-->
<!--[if gt IE 6]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style-ie.css" type="text/css" media="screen" /><![endif]-->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/pagenavi-css.css" type="text/css" media="screen" />


<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" type="image/x-icon" href="<?php get_option('home'); ?>/favicon.ico">

<!--[if lte IE 7]>
	<script defer type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/pngfix.js"></script>
	<![endif]-->

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_enqueue_script('jquery'); ?>
<?php wp_head(); ?>
<script type="text/javascript">
jQuery(window).load(function(){
		jQuery("#featured-content").loopedSlider({
			autoStart: 6000, 
			slidespeed: 500, 
			containerClick: false,
			autoHeight: false
		});
});
</script>
</head>

<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />

<body>

<div id="wrapper">

<div id="maincontainer">

<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_style_position_tagline']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_style_position_tagline'])){$taglineposition=$AntisnewsOptions[$themeoptionsprefix.'_style_position_tagline'];}else {$taglineposition="right";}?>

<div id="sitetitle">
		
	<?php if(($taglineposition == "right") || ($taglineposition == "")){?><?php $showhideslogan=''; if(isset($AntisnewsOptions[$themeoptionsprefix.'_style_showhide_tagline']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_style_showhide_tagline'])){$showhideslogan=$AntisnewsOptions[$themeoptionsprefix.'_style_showhide_tagline'];} if($showhideslogan != 'hide') { $blogdescription=get_bloginfo('description'); if(!empty($blogdescription)){ ?> <div class="tagline"> <?php bloginfo('description');?> </div> <?php } } ?><?php }?>

	<div class="logo">
	<?php global $themeoptionsprefix; if($AntisnewsOptions[$themeoptionsprefix.'_sitelogo']){ ?>
	<a href="<?php echo get_option('home'); ?>"><img src="<?php echo $AntisnewsOptions[$themeoptionsprefix.'_sitelogo']; ?>" alt="<?php bloginfo('name'); ?>" border="0"></a>
	<?php } else { ?>
	<h1><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1>
	<?php } ?>
	</div>
	
	<?php if(($taglineposition == "left") || ($taglineposition == "center")){?><?php $showhideslogan=$AntisnewsOptions[$themeoptionsprefix.'_style_showhide_tagline']; if($showhideslogan != 'hide') { $blogdescription=get_bloginfo('description'); if(!empty($blogdescription)){ ?> <div class="tagline"> <?php bloginfo('description');?> </div> <?php } } ?><?php }?>

	<div class="clear"></div>

</div>
<div id="antisnav-navbar">

	<ul id="antisnav">
		<li<?php if ( is_home() ) { ?> class="current_page_item"<?php } ?>><a href="<?php echo get_option('home'); ?>"><?php _e("Home",'Antisnews');?></a></li>
		<?php if( current_user_can('manage_options')  && $AntisnewsOptions[$themeoptionsprefix.'_hideaddpostlink'] == 'show' )  { ?> <li><a href="<?php echo get_option('home'); ?>/wp-admin/post-new.php"><?php _e("Add Post","Antisnews");?></a></li> </a> <?php } ?>
		<?php $excludepagepostid=$AntisnewsOptions[$themeoptionsprefix.'_pagecatidstoexclude']; if(!isset($excludepagepostid) || empty($excludepagepostid)){$excludepagepostid='';}?>
		<?php 	if( $AntisnewsOptions[$themeoptionsprefix.'_pagesorcategories'] == 'pages'){ wp_list_pages('title_li=&sort_column=menu_order&exclude='.$excludepagepostid); } 	elseif( $AntisnewsOptions[$themeoptionsprefix.'_pagesorcategories'] == 'categories'){ wp_list_categories('title_li=&sort_column=menu_order&exclude='.$excludepagepostid);} else{ wp_list_pages('title_li=&sort_column=menu_order&exclude='.$excludepagepostid);}?>
	</ul>
<div class="clear"></div>
</div>
<div class="clear"></div>
<div class="datesearch">
<div class="date"><?php echo date('l F jS Y'); ?></div>
<div class="search"><?php include (TEMPLATEPATH . '/includes/mysearchform.php'); ?></div>
<div class="clear"></div>
</div>
<div class="clear"></div>

<?php $breakingnewspostID=get_option($themeoptionsprefix.'_breakingnews'); if(isset($breakingnewspostID) && !empty($breakingnewspostID))
{
	if(is_single($breakingnewspostID)) { } else { ?>
	<div id="breakingnews">
	<?php

		include('includes/breakingnews.php');

		$breakingnewsheadline=configure_breakingnews_headline($breakingnewspostID);
		echo "<div class=\"bnewsheadline\">";
		echo $breakingnewsheadline;
		echo "</div>";

	?>
	<?php if(current_user_can('manage_options')) { ?><span class="clearbhlink"><a href="<?php echo get_option('home'); ?>/wp-admin/admin.php?action=clearbreakingnews"><?php _e("Clear breaking headline"); ?></a></span><?php } ?>
	<div class="clear"></div></div>
<?php } } ?>

<?php global $themeoptionsprefix; $showhideleader=$AntisnewsOptions[$themeoptionsprefix.'_showhideleader']; if( isset($showhideleader) && !empty($showhideleader) && ($showhideleader != 'hide') ) { ?>
<?php $showhideleadercode=$AntisnewsOptions[$themeoptionsprefix.'_leadercode']; if( isset($showhideleadercode) && !empty($showhideleadercode) ){?>
<div id="leaderboardspace" style="text-align:<?php $textalignlc=$AntisnewsOptions[$themeoptionsprefix.'_showhideleadercontentposition']; if(!isset($textalignlc) || empty($textalignlc)){ $textalignlc="center";}  echo $textalignlc; ?>;">
<?php if($AntisnewsOptions[$themeoptionsprefix.'_leadercode'] <> "") {  echo stripslashes($AntisnewsOptions[$themeoptionsprefix.'_leadercode']); } else { ?> <img src="<?php bloginfo('template_url'); ?>/images/fsplash728.jpg" alt="" border=""/><?php } ?>
</div>
<?php } ?>
<?php } ?>

<div id="contentcontainer">
