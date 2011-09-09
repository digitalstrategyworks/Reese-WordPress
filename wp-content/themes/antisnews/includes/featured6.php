<?php $featuredcat6excerptlength=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat6excerptlength'];?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_featuredcat6howmany']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_featuredcat6howmany'])){ $featured6showmany=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat6howmany'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_featuredcat6thumbwidth']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_featuredcat6thumbwidth'])){ $featuredcat6thumbnailwidth=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat6thumbwidth'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_featuredcat6thumbheight']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_featuredcat6thumbheight'])){ $featuredcat6thumbnailheight=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat6thumbheight'];}?>
<?php if(!isset($featuredcat6thumbnailwidth) || empty($featuredcat6thumbnailwidth)){$featuredcat6thumbnailwidth = 100;}?>
<?php if(!isset($featuredcat6thumbnailheight) || empty($featuredcat6thumbnailheight)){$featuredcat6thumbnailheight = 75;}?>
<?php global $featuredcatimageszoomcrop,$featuredcatimagesquality;?>
<?php if(!isset($featured6showmany) || empty($featured6showmany)){$featured6showmany=3;} ?>

<div class="bottom">
<h2><a href="<?php echo get_category_link($featuredpostscat6);?>"><?php echo $featuredpostscatname6; ?> </a></h2>

<?php if (have_posts()) : ?>

<?php $featured6postquery = new WP_Query('cat='.$featuredpostscat6.'&showposts='.$featured6showmany); ?>
<?php $count=0; while($featured6postquery->have_posts()) : $featured6postquery->the_post(); ?>

	<div class="featured6">

	<?php $thecimage = get_image_for_crop($post->ID,$thumborno=1);?>
	<?php if (isset($thecimage) && !empty($thecimage)) { $thecimgloc=antisnews_crop_img($thecimage,$featuredcat6thumbnailwidth,$featuredcat6thumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID); ?>
	<?php if(isset($thecimgloc) && !empty($thecimgloc)){?>
	<div class="imgstyle">
	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to","Antisnews");?> <?php the_title_attribute(); ?>"><img src="<?php echo $thecimgloc;?>" width="<?php echo $featuredcat6thumbnailwidth;?>" height="<?php echo $featuredcat6thumbnailheight;?>" alt="<?php the_title(); ?>" border="0"/>
	</div>
	<?php } else {if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
	<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
	<?php $thecimgloc=antisnews_crop_img($noimg,$featuredcat6thumbnailwidth,$featuredcat6thumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
	<div class="imgstyle">
	<img src="<?php echo $thecimgloc; ?>" width="<?php echo $featuredcat6thumbnailwidth;?>" height="<?php echo $featuredcat6thumbnailheight;?>" alt="<?php the_title(); ?>" border="0"/>
	</div>	
	<?php } } ?>	
	<?php } else { if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
	<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
	<?php $thecimgloc=antisnews_crop_img($noimg,$featuredcat6thumbnailwidth,$featuredcat6thumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
	<div class="imgstyle">
	<img src="<?php echo $thecimgloc;?>" width="<?php echo $featuredcat6thumbnailwidth;?>" height="<?php echo $featuredcat6thumbnailheight;?>" alt="<?php the_title(); ?>" border="0"/>
	</div>	
	<?php } } ?>

		<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title();?></a></h3>
		
		<?php $rcsspthec = get_the_excerpt(); ?>		
		<?php if (!isset($rcsspthec) || empty($rcsspthec)){ $rcsspthec = get_the_content(); }?>
		<?php $rcsspthec = strip_tags($rcsspthec);?>
		<?php $rcsspthec = str_replace(' ',' ',$rcsspthec );?>
		<?php $rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );?>
		<?php if(!isset($featuredcat6excerptlength) || empty($featuredcat6excerptlength) || !is_numeric($featuredcat6excerptlength)){ $featuredcat6excerptlength=150; } ?>
		<?php if(strlen($rcsspthec) > $featuredcat6excerptlength){$rcsspthec=LimitText(trim($rcsspthec),10,$featuredcat6excerptlength,""); }?>
		
		<p>
		<?php echo $rcsspthec; ?>
		[<a class="morelink" href="<?php the_permalink() ?>" rel="bookmark">Read More</a>]
 		</p>
	</div>
	<div class="clear"></div>
	
<?php $count++;?>
<?php endwhile; ?>
<?php endif; ?>
</div>