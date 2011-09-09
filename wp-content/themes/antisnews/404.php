<?php get_header(); ?>
<?php $AntisnewsOptions=get_antisnewsoptions();?>

<?php global $themeoptionsprefix;?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_archivesearchthumbnailwidth']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_archivesearchthumbnailwidth'])){$page404thumbnailwidth=$AntisnewsOptions[$themeoptionsprefix.'_archivesearchthumbnailwidth'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_archivesearchthumbnailheight']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_archivesearchthumbnailheight'])){$page404thumbnailheight=$AntisnewsOptions[$themeoptionsprefix.'_archivesearchthumbnailheight'];}?>
<?php if(!isset($page404thumbnailwidth) || empty($page404thumbnailwidth)){$page404thumbnailwidth = 100;}?>
<?php if(!isset($page404thumbnailheight) || empty($page404thumbnailheight)){$page404thumbnailheight = 100;}?>
<?php $featuredcatimageszoomcrop=$AntisnewsOptions[$themeoptionsprefix.'_featuredcatimageszoomcrop'];?>
<?php $featuredcatimagesquality=$AntisnewsOptions[$themeoptionsprefix.'_featuredcatimagesquality'];?>

<?php if($AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] == 1){ get_sidebar(); } ?>

<div id="content">


<div class="postarea">


	<h1><?php _e("Page Not Found","Antisnews");?></h1>


	<div class="excerpt">

	<p><?php _e("The page you were trying to reach could not be found.","Antisnews");?></p>
	<br/>
	<h3><?php _e("Maybe you might be interested in one of the topics below","Antisnews");?></h3>

	<p>
	<ol class="list404">
	<?php wp_get_archives('type=postbypost&limit=10'); ?>
	</ol>
	</p>

	<?php $arrImages =& get_children('post_type=attachment&post_mime_type=image');
	// If images exist
   	 if($arrImages) {?>
	<p>
	<h3><?php _e("Or you might prefer to browse by photo?","Antisnews");?></h3>
	</p>
	<br/>
	<?php } ?>

	<?php $recent = new WP_Query("showposts=9"); while($recent->have_posts()) : $recent->the_post(); ?>
	
		<?php $operationmode=$AntisnewsOptions[$themeoptionsprefix.'_operationmode'];?>
		<?php if(!isset($operationmode) || empty($operationmode)||($operationmode != 'Live')){?>
		<div class="imgstyle">
		<?php bdw_get_images($post->ID,$width=$page404thumbnailwidth,$height='',$thumborno=2);?>
		</div>
		<?php } else {?>	
		<?php $thecimage = get_image_for_crop($post->ID,$thumborno=2);?>
		<?php if (isset($thecimage) && !empty($thecimage)) { $thecimgloc=antisnews_crop_img($thecimage,$page404thumbnailwidth,$page404thumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
		<?php if(isset($thecimgloc) && !empty($thecimgloc)){?>
		<div class="imgstyle" style="margin-bottom:5px;float:left;margin-right:5px;">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to","Antisnews");?> <?php the_title_attribute(); ?>"><img src="<?php echo $thecimgloc; ?>" alt="<?php the_title(); ?>" /></a>
		</div>	
		<?php }  ?>
		<?php }  ?>
		<?php }?>
	<?php endwhile; ?>


	</div><!--clos div excerpt-->
</div><!--end postarea-->

<?php include (TEMPLATEPATH . '/includes/sidebar2.php'); ?>
 <?php if($AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] == 2) { get_sidebar(); } ?>
  <?php if($AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] != 2 || $AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] != 1 )  { get_sidebar(); } ?>
</div><!--end content-->
<?php get_footer(); ?>