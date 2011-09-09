<?php get_header(); ?>
<?php $AntisnewsOptions=get_antisnewsoptions();?>

<?php global $themeoptionsprefix;?>
<?php if($AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] == 1){ get_sidebar(); } ?>

<?php $archivepageexcerptlength=$AntisnewsOptions[$themeoptionsprefix.'_archivesearchexcerptlength'];?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_archivesearchthumbnailwidth']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_archivesearchthumbnailwidth'])){$archivepagethumbnailwidth=$AntisnewsOptions[$themeoptionsprefix.'_archivesearchthumbnailwidth'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_archivesearchthumbnailheight']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_archivesearchthumbnailheight'])){$archivepagethumbnailheight=$AntisnewsOptions[$themeoptionsprefix.'_archivesearchthumbnailheight'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_archivepagetitle']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_archivepagetitle'])){$archivepagetitle=$AntisnewsOptions[$themeoptionsprefix.'_archivepagetitle'];}?>
<?php if(!isset($archivepagethumbnailwidth) || empty($archivepagethumbnailwidth)){$archivepagethumbnailwidth = 100;}?>
<?php if(!isset($archivepagethumbnailheight) || empty($archivepagethumbnailheight)){$archivepagethumbnailheight = 100;}?>
<?php $featuredcatimageszoomcrop=$AntisnewsOptions[$themeoptionsprefix.'_featuredcatimageszoomcrop'];?>
<?php $featuredcatimagesquality=$AntisnewsOptions[$themeoptionsprefix.'_featuredcatimagesquality'];?>
<?php if(!isset($archivepagetitle) || empty($archivepagetitle)){$archivepagetitle=__("Archives","Antisnews");} ?>


<div id="content">


<div class="postarea">

		<?php is_tag(); ?>
		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; ?>
 	  <?php if (is_category()) { ?>
		<h1> &#8216;<?php single_cat_title(); ?>&#8217; <?php echo $archivepagetitle;?></h1>
 	  <?php  } elseif( is_tag() ) { ?>
		<h1><?php _e("Posts Tagged","Antisnews");?> &#8216;<?php single_tag_title(); ?>&#8217;</h1>
 	  <?php  } elseif (is_day()) { ?>
		<h1><?php _e("Archive for","Antisnews");?> <?php the_time('F jS, Y'); ?></h1>
 	  <?php  } elseif (is_month()) { ?>
		<h1><?php _e("Archive for","Antisnews");?> <?php the_time('F, Y'); ?></h1>
 	  <?php  } elseif (is_year()) { ?>
		<h1><?php _e("Archive for","Antisnews");?> <?php the_time('Y'); ?></h1>
	  <?php  } elseif (is_author()) { ?>
		<h1><?php _e("Author Archive","Antisnews");?></h1>
 	  <?php  } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1><?php _e("Blog Archives","Antisnews");?></h1>
 	  <?php } ?>



		<?php while (have_posts()) : the_post(); ?>


		<?php if($AntisnewsOptions[$themeoptionsprefix.'_archiveexcerptorfull'] == 'excerpt'){include(TEMPLATEPATH.'/archive-excerpt.php');} elseif($AntisnewsOptions[$themeoptionsprefix.'_archiveexcerptorfull'] == 'full'){include(TEMPLATEPATH.'/archive-full.php');}else{include(TEMPLATEPATH.'/archive-excerpt.php');}?>



		<?php endwhile; ?>


			<div class="paginav">
				<?php
					include('wp-pagenavi.php');
					if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
				?>
			</div>


	<?php else : ?>

		<h2 class="center"><?php _e("Not Found","Antisnews");?></h2>
		

	<?php endif; ?>


</div><!--end postarea-->

<?php include (TEMPLATEPATH . '/includes/sidebar2.php'); ?>
 <?php if($AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] == 2) { get_sidebar(); } ?>
  <?php if($AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] != 2 || $AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] != 1 )  { get_sidebar(); } ?>
</div><!--end content-->
<?php get_footer(); ?>