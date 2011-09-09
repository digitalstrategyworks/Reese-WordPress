<?php $AntisnewsOptions=get_antisnewsoptions();?>
<?php $stickyexcerptlength=$AntisnewsOptions[$themeoptionsprefix.'_stickyexcerptlength'];?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_stickyhowmany']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_stickyhowmany'])){$stickyhowmany=$AntisnewsOptions[$themeoptionsprefix.'_stickyhowmany'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_stickythumbwidth']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_stickythumbwidth'])){ $stickythumbnailwidth=$AntisnewsOptions[$themeoptionsprefix.'_stickythumbwidth'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_stickythumbheight']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_stickythumbheight'])){$stickythumbnailheight=$AntisnewsOptions[$themeoptionsprefix.'_stickythumbheight'];}?>
<?php $stickytitle=$AntisnewsOptions[$themeoptionsprefix.'_stickytitle'];?>
<?php if(!isset($stickythumbnailwidth) || empty($stickythumbnailwidth)){$stickythumbnailwidth = 75;}?>
<?php if(!isset($stickythumbnailheight) || empty($stickythumbnailheight)){$stickythumbnailheight = 75;}?>
<?php global $featuredcatimageszoomcrop,$featuredcatimagesquality;?>
<?php if(!isset($stickyhowmany) || empty($stickyhowmany)){$stickyhowmany=1;} ?>
<?php if(!isset($stickytitle) || empty($stickytitle)){$stickytitle=__("Sticky","Antisnews");} ?>

<div class="stickyout">
<h2><?php echo $stickytitle;?></h2>

<?php query_posts(array('post__in'=>get_option('sticky_posts')),'showposts='.$stickyhowmany); ?>
				
<?php if ( have_posts() ) : ?>


<?php while ( have_posts() ) : the_post();?>


	<div class="sticky">
	<?php $thestickyimage = get_image_for_crop($post->ID,$thumborno=1);?>
	<?php if (isset($thestickyimage) && !empty($thestickyimage)) { $thestickyimgloc=antisnews_crop_img($thestickyimage,$stickythumbnailwidth,$stickythumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID); ?>
	<?php if(isset($thestickyimgloc) && !empty($thestickyimgloc)){?>
	<div class="imgstyle">
	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to","Antisnews");?> <?php the_title_attribute(); ?>"><img src="<?php echo $thestickyimgloc;?>" alt="<?php the_title(); ?>" /></a>
	</div>
	<?php } else {if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
	<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
	<?php $thestickyimgloc=antisnews_crop_img($noimg,$stickythumbnailwidth,$stickythumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
	<div class="imgstyle">
	<img src="<?php echo $thestickyimgloc; ?>" width="<?php echo $stickythumbnailwidth;?>" height="<?php echo $stickythumbnailheight;?>" alt="<?php the_title(); ?>" border="0"/>
	</div>	
	<?php } } ?>	
	<?php } else { if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
	<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
	<?php $thestickyimgloc=antisnews_crop_img($noimg,$stickythumbnailwidth,$stickythumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>

	<div class="imgstyle">
	<img src="<?php echo $thestickyimgloc;?>" alt="<?php the_title(); ?>" border="0"/>
	</div>	
	<?php } } ?>
		
		<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title();?></a></h3>
		
		<?php $rcsspthec = get_the_excerpt(); ?>		
		<?php if (!isset($rcsspthec) || empty($rcsspthec)){ $rcsspthec = get_the_content(); }?>
		<?php $rcsspthec = strip_tags($rcsspthec);?>
		<?php $rcsspthec = str_replace(' ',' ',$rcsspthec );?>
		<?php $rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );?>
		<?php if(!isset($stickyexcerptlength) || empty($stickyexcerptlength) || !is_numeric($stickyexcerptlength)){ $stickyexcerptlength=150; } ?>
		<?php if(strlen($rcsspthec) > $stickyexcerptlength){$rcsspthec=LimitText(trim($rcsspthec),10,$stickyexcerptlength,""); }?>
		
		<p>
		<?php echo $rcsspthec; ?>
		[<a class="morelink" href="<?php the_permalink() ?>" rel="bookmark">Read More</a>]
 		</p>
 	</div>

	 <div class="clear"></div>
	 
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_query();?>
</div>