<?php get_header(); ?>
<?php $AntisnewsOptions=get_antisnewsoptions();?>

<?php global $themeoptionsprefix;?>
<?php if($AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] == 1){ get_sidebar(); } ?>

<?php $searchpageexcerptlength=$AntisnewsOptions[$themeoptionsprefix.'_archivesearchexcerptlength'];?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_archivesearchthumbnailwidth']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_archivesearchthumbnailwidth'])){$searchpagethumbnailwidth=$AntisnewsOptions[$themeoptionsprefix.'_archivesearchthumbnailwidth'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_archivesearchthumbnailheight']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_archivesearchthumbnailheight'])){$searchpagethumbnailheight=$AntisnewsOptions[$themeoptionsprefix.'_archivesearchthumbnailheight'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_searchpagetitle']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_searchpagetitle'])){$searchpagetitle=$AntisnewsOptions[$themeoptionsprefix.'_searchpagetitle'];}?>
<?php if(!isset($searchpagethumbnailwidth) || empty($searchpagethumbnailwidth)){$searchpagethumbnailwidth = 100;}?>
<?php if(!isset($searchpagethumbnailheight) || empty($searchpagethumbnailheight)){$searchpagethumbnailheight = 100;}?>
<?php $featuredcatimageszoomcrop=$AntisnewsOptions[$themeoptionsprefix.'_featuredcatimageszoomcrop'];?>
<?php $featuredcatimagesquality=$AntisnewsOptions[$themeoptionsprefix.'_featuredcatimagesquality'];?>


<div id="content">

<div class="postarea">


	<?php if (have_posts()) : ?>

		<h1><?php _e("Search Results for","Antisnews");?>  <?php printf(__('\'%s\''), $s) ?></h1>

		<?php while (have_posts()) : the_post(); ?>


		<div class="excerpt">

 		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?>	</a>	</h2>
		<div class="byline"><?php  the_time('d M, Y'); ?>  |  <?php _e("Author","Antisnews");?>: <?php  the_author(); ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div>

		<?php $operationmode=$AntisnewsOptions[$themeoptionsprefix.'_operationmode'];?>
		<?php if(!isset($operationmode) || empty($operationmode)||($operationmode == "Magazine Off")){?>
		<div class="imgstyle">
		<?php bdw_get_images($post->ID,$width=$searchpagethumbnailwidth,$height='',$thumborno=2);?>
		</div>
		<?php } else {?>
		
		<?php $thecimage = get_image_for_crop($post->ID,$thumborno=2);?>
		<?php if (isset($thecimage) && !empty($thecimage)) { $thecimgloc=antisnews_crop_img($thecimage,$searchpagethumbnailwidth,$searchpagethumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
		<div class="imgstyle">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to","Antisnews");?> <?php the_title_attribute(); ?>"><img src="<?php echo $thecimgloc;?>" width="<?php echo $searchpagethumbnailwidth;?>" height="<?php echo $searchpagethumbnailheight;?>" alt="<?php the_title(); ?>" /></a>
		</div>	
		<?php } else { if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
		<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
		<?php $thecimgloc=antisnews_crop_img($noimg,$searchpagethumbnailwidth,$searchpagethumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
		<div class="imgstyle">
		<img src="<?php echo $thecimgloc; ?>" width="<?php echo $searchpagethumbnailwidth;?>" height="<?php echo $searchpagethumbnailheight;?>" alt="<?php the_title(); ?>" border="0"/>
		</div>	
		<?php } } ?>
		
		<?php }?>

		<?php $rcsspthec = get_the_excerpt(); ?>		
		<?php if (!isset($rcsspthec) || empty($rcsspthec)){ $rcsspthec = get_the_content(); }?>
		<?php $rcsspthec = strip_tags($rcsspthec);?>
		<?php $rcsspthec = str_replace(' ',' ',$rcsspthec );?>
		<?php $rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );?>
		<?php if(!isset($searchpageexcerptlength) || empty($searchpageexcerptlength) || !is_numeric($searchpageexcerptlength)){ $searchpageexcerptlength=275; } ?>
		<?php if(strlen($rcsspthec) > $searchpageexcerptlength){$rcsspthec=LimitText(trim($rcsspthec),10,$searchpageexcerptlength,""); }?>
		
		<p>
		<?php echo $rcsspthec; ?>
		[<a class="morelink" href="<?php the_permalink() ?>" rel="bookmark"><?php _e("Read More","Antisnews");?></a>]
 		</p>
		<div class="clear"></div>
		</div><!--close div class excerpt-->

		<div class="clear"></div>


		<?php endwhile; ?>

			<div class="paginav">
				<?php
					include('wp-pagenavi.php');
					if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
				?>
			</div>

	<?php else : ?>
<?php $hidelatest=1; ?>
		<div class="npfsearchmsg">
		<h2><?php _e("No posts found","Antisnews");?></h2>

		<?php _e("You searched for","Antisnews");?> "<?php the_search_query() ?>". <?php _e("Unfortunately there were no posts found that match what you are looking for. Please try a different search.","Antisnews");?>

		<div class="entry"><br/>

<h3><?php _e("Maybe you might be interested in one of the topics below",'Antisnews');?></h3>

	<p>
	<ol class="list404">
	<?php wp_get_archives('type=postbypost&limit=10'); ?>
	</ol>
	</p>

		<?php $arrImages =& get_children('post_type=attachment&post_mime_type=image');
		// If images exist
	   	 if($arrImages) {?>
		<p>
		<h3><?php _e("Or you might prefer to browse by photo?",'Antisnews');?></h3>
											</p>
											<br/>
		<?php } ?>

		<?php $recent = new WP_Query("showposts=9"); while($recent->have_posts()) : $recent->the_post(); ?>
		<?php $operationmode=$AntisnewsOptions[$themeoptionsprefix.'_operationmode'];?>
		<?php if(!isset($operationmode) || empty($operationmode)||($operationmode == "Magazine Off")){?>
		<div class="imgstyle" style="margin-bottom:5px;float:left;margin-right:5px;">
		<?php bdw_get_images($post->ID,$width='',$height=$searchpagethumbnailheight,$thumborno=2);?>
		</div>
		<?php } else {?>		
		<?php $thecimage = get_image_for_crop($post->ID,$thumborno=2);?>
		<?php if (isset($thecimage) && !empty($thecimage)) { $thecimgloc=antisnews_crop_img($thecimage,$searchpagethumbnailwidth,$searchpagethumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
		<div class="imgstyle" style="margin-bottom:5px;float:left;margin-right:5px;">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to","Antisnews");?> <?php the_title_attribute(); ?>"><img src="<?php echo $thecimgloc; ?>" alt="<?php the_title(); ?>" /></a>
		</div>	
		<?php }  ?>
		<?php } ?>

		<?php endwhile; ?>


	</div><!--clos div entry-->
		</div>

	<?php endif; ?>

</div><!--end postarea-->


<?php include (TEMPLATEPATH . '/includes/sidebar2.php'); ?>
 <?php if($AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] == 2) { get_sidebar(); } ?>
  <?php if($AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] != 2 || $AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] != 1 )  { get_sidebar(); } ?>
</div><!--end content-->
<?php get_footer(); ?>