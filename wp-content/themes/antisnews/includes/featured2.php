<?php $featuredcat2excerptlength=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat2excerptlength'];?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_featuredcat2howmany']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_featuredcat2howmany'])){$featured2showmany=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat2howmany'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_featuredcat2thumbwidth']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_featuredcat2thumbwidth'])){$featuredcat2thumbnailwidth=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat2thumbwidth'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_featuredcat2thumbheight']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_featuredcat2thumbheight'])){$featuredcat2thumbnailheight=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat2thumbheight'];}?>
<?php if(!isset($featuredcat2thumbnailwidth) || empty($featuredcat2thumbnailwidth)){$featuredcat2thumbnailwidth = 100;}?>
<?php if(!isset($featuredcat2thumbnailheight) || empty($featuredcat2thumbnailheight)){$featuredcat2thumbnailheight = 75;}?>
<?php global $featuredcatimageszoomcrop,$featuredcatimagesquality;?>
<?php if(!isset($featured2showmany) || empty($featured2showmany)){$featured2showmany=4;} ?>
<h2><a href="<?php echo get_category_link($featuredpostscat2);?>"><?php echo $featuredpostscatname2; ?> </a></h2>

<?php if (have_posts()) : ?>

<?php $featured2postquery = new WP_Query('cat='.$featuredpostscat2.'&showposts='.$featured2showmany); ?>

<?php $count=0; while($featured2postquery->have_posts()) : $featured2postquery->the_post(); ?>

	<div class="featured2">

	<?php $thecimage = get_image_for_crop($post->ID,$thumborno=1);?>
	<?php if (isset($thecimage) && !empty($thecimage)) { $thecimgloc=antisnews_crop_img($thecimage,$featuredcat2thumbnailwidth,$featuredcat2thumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
	<?php if(isset($thecimgloc) && !empty($thecimgloc)){?>
	<div class="imgstyle">
	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to","Antisnews");?> <?php the_title_attribute(); ?>"><img src="<?php echo $thecimgloc;?>" width="<?php echo $featuredcat2thumbnailwidth;?>" height="<?php echo $featuredcat2thumbnailheight;?>" alt="<?php the_title(); ?>" border="0"/>
	</div>	
	<?php } else {if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
	<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
	<?php $thecimgloc=antisnews_crop_img($noimg,$featuredcat2thumbnailwidth,$featuredcat2thumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
	<div class="imgstyle">
	<img src="<?php echo $thecimgloc; ?>" width="<?php echo $featuredcat2thumbnailwidth;?>" height="<?php echo $featuredcat2thumbnailheight;?>" alt="<?php the_title(); ?>" border="0"/>
	</div>	
	<?php } } ?>
	<?php } else { if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != "off"){ ?>
	<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
	<?php $thecimgloc=antisnews_crop_img($noimg,$featuredcat2thumbnailwidth,$featuredcat2thumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
	<div class="imgstyle">
	<img src="<?php echo $thecimgloc;?>" width="<?php echo $featuredcat2thumbnailwidth;?>" height="<?php echo $featuredcat2thumbnailheight;?>" alt="<?php the_title(); ?>" border="0"/>
	</div>	
	<?php } } ?>

		
		<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title();?></a></h3>
		
		<?php $rcsspthec = get_the_excerpt(); ?>		
		<?php if (!isset($rcsspthec) || empty($rcsspthec)){ $rcsspthec = get_the_content(); }?>
		<?php $rcsspthec = strip_tags($rcsspthec);?>
		<?php $rcsspthec = str_replace(' ',' ',$rcsspthec );?>
		<?php $rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );?>
		<?php if(!isset($featuredcat2excerptlength) || empty($featuredcat2excerptlength) || !is_numeric($featuredcat2excerptlength)){ $featuredcat2excerptlength=150; } ?>
		<?php if(strlen($rcsspthec) > $featuredcat2excerptlength){$rcsspthec=LimitText(trim($rcsspthec),10,$featuredcat2excerptlength,""); }?>
		
		<p>
		<?php echo $rcsspthec; ?>
		[<a class="morelink" href="<?php the_permalink() ?>" rel="bookmark">Read More</a>]
 		</p>
 		
	 </div>
	 <div class="clear"></div>
	 
<?php $count++;?>
<?php endwhile; ?>
<?php endif; ?>