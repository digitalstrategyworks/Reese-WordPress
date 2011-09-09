<?php bf_doctype() ?><html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bf_document_title() ?></title>

<meta name="generator" content="WordPress" />
<meta name="description" content="<?php bloginfo('description') ?>" />
<?php if ( is_search() || is_author() ) : ?>
<meta name="robots" content="noindex, nofollow" />
<?php endif ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />

<link rel="alternate" type="application/rss+xml" href="<?php bf_rss_url() ?>" title="<?php printf( __( '%s latest posts', 'arras' ), wp_specialchars( get_bloginfo('name'), 1 ) ) ?>" />
<link rel="alternate" type="application/rss+xml" href="<?php bf_comments_rss_url() ?>" title="<?php printf( __( '%s latest comments', 'arras' ), wp_specialchars( get_bloginfo('name'), 1 ) ) ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php
if ( is_singular() ) {
	wp_enqueue_script('comment-reply');
	wp_enqueue_script('jquery-validate', get_template_directory_uri() . '/includes/js/jquery.validate.min.js', 'jquery', '1.5.1');
}

wp_head();
bf_head();
?>


<script type="text/javascript">
	jQuery(document).ready(function($) {
	<?php bf_jquery() ?>
	<?php if (is_single()) : ?>$('#commentform').validate();<?php endif ?>
	});
</script>

<!--[if IE 6]>
<![endif]-->
</head>

<body class="<?php bf_body_class() ?>">
<?php bf_body() ?>
<div id="wrapper">

    <div id="header">
		<div id="branding" class="clearfix">
	        <div class="logo">
				<?php if ( is_home() || is_front_page() ) : ?>
		            <h1 class="blog-name"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
					<h2 class="blog-description"><?php bloginfo('description'); ?></h2>
				<?php else: ?>
		            <span class="blog-name"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></span>
					<span class="blog-description"><?php bloginfo('description'); ?></span>			
				<?php endif; ?>
	        </div><!-- .logo -->
			<div id="searchbar">
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>  
			</div><!-- #searchbar -->
		</div><!-- #branding -->
    </div><!-- #header -->
    
	<?php bf_above_nav() ?>
	<?php bf_nav() ?>
	<?php bf_below_nav() ?>
    
	<div id="main">
	    <div id="container" class="clearfix">
