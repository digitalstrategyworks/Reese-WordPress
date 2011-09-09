<?php $featuredcat4excerptlength=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat4excerptlength'];?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_featuredcat4howmany']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_featuredcat4howmany'])){$featured4howmany=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat4howmany'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_featuredcat4thumbwidth']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_featuredcat4thumbwidth'])){$featuredcat4thumbnailwidth=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat4thumbwidth'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_featuredcat4thumbheight']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_featuredcat4thumbheight'])){$featuredcat4thumbnailheight=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat4thumbheight'];}?>
<?php if(!isset($featuredcat4thumbnailwidth) || empty($featuredcat4thumbnailwidth)){$featuredcat4thumbnailwidth = 100;}?>
<?php if(!isset($featuredcat4thumbnailheight) || empty($featuredcat4thumbnailheight)){$featuredcat4thumbnailheight = 75;}?>
<?php global $featuredcatimageszoomcrop,$featuredcatimagesquality;?>
<?php if(!isset($featured4howmany) || empty($featured4howmany)){$featured4howmany=3;} ?>

<div class="bottom">
<h2><a href="<?php echo get_category_link($featuredpostscat4);?>"><?php echo $featuredpostscatname4; ?> </a></h2>

<?php if (have_posts()) : ?>

<?php $featured4postquery = new WP_Query('cat='.$featuredpostscat4.'&showposts='.$featured4howmany); ?>
<?php $count=0; while($featured4postquery->have_posts()) : $featured4postquery->the_post(); ?>

	<div class="featured4">

	<?php $thecimage = get_image_for_crop($post->ID,$thumborno=1);?>
	<?php if (isset($thecimage) && !empty($thecimage)) { $thecimgloc=antisnews_crop_img($thecimage,$featuredcat4thumbnailwidth,$featuredcat4thumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID); ?>
	<?php if(isset($thecimgloc) && !empty($thecimgloc)){?>
	<div class="imgstyle">
	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to","Antisnews");?> <?php the_title_attribute(); ?>"><img src="<?php echo $thecimgloc;?>" width="<?php echo $featuredcat4thumbnailwidth;?>" height="<?php echo $featuredcat4thumbnailheight;?>" alt="<?php the_title(); ?>" border="0"/>
	</div>
	<?php } else {if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
	<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
	<?php $thecimgloc=antisnews_crop_img($noimg,$featuredcat4thumbnailwidth,$featuredcat4thumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
	<div class="imgstyle">
	<img src="<?php echo $thecimgloc; ?>" width="<?php echo $featuredcat4thumbnailwidth;?>" height="<?php echo $featuredcat4thumbnailheight;?>" alt="<?php the_title(); ?>" border="0"/>
	</div>	
	<?php } } ?>	
	<?php } else { if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
	<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
	<?php $thecimgloc=antisnews_crop_img($noimg,$featuredcat4thumbnailwidth,$featuredcat4thumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
	<div class="imgstyle">
	<img src="<?php echo $thecimgloc;?>" width="<?php echo $featuredcat4thumbnailwidth;?>" height="<?php echo $featuredcat4thumbnailheight;?>" alt="<?php the_title(); ?>" border="0"/>
	</div>	
	<?php } } ?>

		<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title();?></a></h3>
		
		<?php $rcsspthec = get_the_excerpt(); ?>		
		<?php if (!isset($rcsspthec) || empty($rcsspthec)){ $rcsspthec = get_the_content(); }?>
		<?php $rcsspthec = strip_tags($rcsspthec);?>
		<?php $rcsspthec = str_replace(' ',' ',$rcsspthec );?>
		<?php $rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );?>
		<?php if(!isset($featuredcat4excerptlength) || empty($featuredcat4excerptlength) || !is_numeric($featuredcat4excerptlength)){ $featuredcat4excerptlength=150; } ?>
		<?php if(strlen($rcsspthec) > $featuredcat4excerptlength){$rcsspthec=LimitText(trim($rcsspthec),10,$featuredcat4excerptlength,""); }?>
		
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