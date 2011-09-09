<?php $featuredcat3excerptlength=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat3excerptlength'];?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_featuredcat3howmany']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_featuredcat3howmany'])){$featured3howmany=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat3howmany'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_featuredcat3thumbwidth']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_featuredcat3thumbwidth'])){$featuredcat3thumbnailwidth=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat3thumbwidth'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_featuredcat3thumbheight']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_featuredcat3thumbheight'])){$featuredcat3thumbnailheight=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat3thumbheight'];}?>
<?php if(!isset($featuredcat3thumbnailwidth) || empty($featuredcat3thumbnailwidth)){$featuredcat3thumbnailwidth = 270;}?>
<?php if(!isset($featuredcat3thumbnailheight) || empty($featuredcat3thumbnailheight)){$featuredcat3thumbnailheight = 125;}?>
<?php global $featuredcatimageszoomcrop,$featuredcatimagesquality;?>
<?php if(!isset($featured3howmany) || empty($featured3howmany)){$featured3howmany=5;} ?>

<div class="top">

<h2><a href="<?php echo get_category_link($featuredpostscat3);?>"><?php echo $featuredpostscatname3; ?> </a></h2>

<?php if (have_posts()) : ?>

<?php $feat3 = new WP_Query('cat='.$featuredpostscat3.'&showposts='.$featured3howmany); ?>

<?php while($feat3->have_posts()) : $feat3->the_post(); ?>
	

	<div class="featured3">	
	<?php $thecimage = get_image_for_crop($post->ID,$thumborno=2);?>
	<?php if (isset($thecimage) && !empty($thecimage)) { $thecimgloc=antisnews_crop_img($thecimage,$featuredcat3thumbnailwidth,$featuredcat3thumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
	<?php if(isset($thecimgloc) && !empty($thecimgloc)){?>
	<div class="imgstyle">
	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to","Antisnews");?> <?php the_title_attribute(); ?>"><img src="<?php echo $thecimgloc;?>" width="<?php echo $featuredcat3thumbnailwidth;?>" height="<?php echo $featuredcat3thumbnailheight;?>" alt="<?php the_title(); ?>" border="0"/>
	</div>	
	<?php } else {if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
	<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
	<?php $thecimgloc=antisnews_crop_img($noimg,$featuredcat3thumbnailwidth,$featuredcat3thumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
	<div class="imgstyle">
	<img src="<?php echo $thecimgloc; ?>" width="<?php echo $featuredcat3thumbnailwidth;?>" height="<?php echo $featuredcat3thumbnailheight;?>" alt="<?php the_title(); ?>" border="0"/>
	</div>	
	<?php } } ?>
	<?php } else { if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
	<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
	<?php $thecimgloc=antisnews_crop_img($noimg,$featuredcat3thumbnailwidth,$featuredcat3thumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
	<div class="imgstyle">
	<img src="<?php echo $thecimgloc; ?>" width="<?php echo $featuredcat3thumbnailwidth;?>" height="<?php echo $featuredcat3thumbnailheight;?>" alt="<?php the_title(); ?>" border="0"/>
	</div>	
	<?php } } ?>
	

	<?php $rcsspthec = get_the_excerpt(); ?>
	<?php if (!isset($rcsspthec) || empty($rcsspthec)){ $rcsspthec = get_the_content(); }?>
	<?php $rcsspthec = strip_tags($rcsspthec);?>
	<?php $rcsspthec = str_replace(' ',' ',$rcsspthec );?>
	<?php $rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );?>
	<?php if(!isset($featuredcat3excerptlength) || empty($featuredcat3excerptlength) || !is_numeric($featuredcat3excerptlength)){ $featuredcat3excerptlength=275; } ?>
	<?php if(strlen($rcsspthec) > $featuredcat3excerptlength){$rcsspthec=LimitText(trim($rcsspthec),10,$featuredcat3excerptlength,""); }?>
	
	<h3><a href="<?php the_permalink() ?>"><?php the_title();?></a></h3>
	
	<p>
	<?php echo $rcsspthec;?>
	[<a class="morelink" href="<?php the_permalink() ?>" rel="bookmark"><em><?php _e("Read More","Antisnews");?></em></a>]
	</p>
	</div>

<?php endwhile; ?>
<?php endif; ?>

</div>

