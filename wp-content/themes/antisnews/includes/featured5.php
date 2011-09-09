<?php $featuredcat5excerptlength=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat5excerptlength'];?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_featuredcat5howmany']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_featuredcat5howmany'])){ $featured5showmany=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat5howmany'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_featuredcat5thumbwidth']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_featuredcat5thumbwidth'])){$featuredcat5thumbnailwidth=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat5thumbwidth'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_featuredcat5thumbheight']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_featuredcat5thumbheight'])){$featuredcat5thumbnailheight=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat5thumbheight'];}?>
<?php if(!isset($featuredcat5thumbnailwidth) || empty($featuredcat5thumbnailwidth)){$featuredcat5thumbnailwidth = 270;}?>
<?php if(!isset($featuredcat5thumbnailheight) || empty($featuredcat5thumbnailheight)){$featuredcat5thumbnailheight = 125;}?>
<?php global $featuredcatimageszoomcrop,$featuredcatimagesquality;?>
<?php if(!isset($featured5showmany) || empty($featured5showmany)){$featured5showmany=2;} ?>

<div class="top">
<h2><a href="<?php echo get_category_link($featuredpostscat5);?>"><?php echo $featuredpostscatname5; ?> </a></h2>

<?php if (have_posts()) : ?>

<?php $feat3 = new WP_Query('cat='.$featuredpostscat5.'&showposts='.$featured5showmany); ?>
<?php while($feat3->have_posts()) : $feat3->the_post(); ?>	

	<div class="featured5">
	
	<?php $thecimage = get_image_for_crop($post->ID,$thumborno=2);?>
	<?php if (isset($thecimage) && !empty($thecimage)) { $thecimgloc=antisnews_crop_img($thecimage,$featuredcat5thumbnailwidth,$featuredcat5thumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
	<?php if(isset($thecimgloc) && !empty($thecimgloc)){?>
	<div class="imgstyle">
	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to","Antisnews");?> <?php the_title_attribute(); ?>"><img src="<?php echo $thecimgloc;?>" width="<?php echo $featuredcat5thumbnailwidth;?>" height="<?php echo $featuredcat5thumbnailheight;?>" alt="<?php the_title(); ?>" border="0"/>
	</div>	
	<?php } else {if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
	<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
	<?php $thecimgloc=antisnews_crop_img($noimg,$featuredcat5thumbnailwidth,$featuredcat5thumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
	<div class="imgstyle">
	<img src="<?php echo $thecimgloc; ?>" width="<?php echo $featuredcat5thumbnailwidth;?>" height="<?php echo $featuredcat5thumbnailheight;?>" alt="<?php the_title(); ?>" border="0"/>
	</div>	
	<?php } } ?>	
	<?php } else { if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
	<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
	<?php $thecimgloc=antisnews_crop_img($noimg,$featuredcat5thumbnailwidth,$featuredcat5thumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
	<div class="imgstyle">
	<img src="<?php echo $thecimgloc;?>" width="<?php echo $featuredcat5thumbnailwidth;?>" height="<?php echo $featuredcat5thumbnailheight;?>" alt="<?php the_title(); ?>" border="0"/>
	</div>	
	<?php } } ?>
	

	<?php $rcsspthec = get_the_excerpt(); ?>
	<?php if (!isset($rcsspthec) || empty($rcsspthec)){ $rcsspthec = get_the_content(); }?>
	<?php $rcsspthec = strip_tags($rcsspthec);?>
	<?php $rcsspthec = str_replace(' ',' ',$rcsspthec );?>
	<?php $rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );?>
	<?php if(!isset($featuredcat5excerptlength) || empty($featuredcat5excerptlength) || !is_numeric($featuredcat5excerptlength)){ $featuredcat2excerptlength=275; } ?>
	<?php if(strlen($rcsspthec) > $featuredcat5excerptlength){$rcsspthec=LimitText(trim($rcsspthec),10,$featuredcat5excerptlength,""); }?>
	
	<h3><a href="<?php the_permalink() ?>"><?php the_title();?></a></h3>
	
	<p>
	<?php echo $rcsspthec;?>
	[<a class="morelink" href="<?php the_permalink() ?>" rel="bookmark"><em><?php _e("Read More","Antisnews");?></em></a>]
	</p>
	</div>
	
	

<?php endwhile; ?>
<?php endif; ?>

</div>