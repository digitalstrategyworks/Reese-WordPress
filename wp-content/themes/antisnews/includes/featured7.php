<?php $featuredcat7excerptlength1=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat7excerptlength1'];?>
<?php $featuredcat7excerptlength2=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat7excerptlength2'];?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_featuredcat7howmany1']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_featuredcat7howmany1'])){$featured7showmany1=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat7howmany1'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_featuredcat7howmany2']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_featuredcat7howmany2'])){$featured7showmany2=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat7howmany2'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_featuredcat7thumbwidth1']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_featuredcat7thumbwidth1'])){$featuredcat7thumbnailwidth1=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat7thumbwidth1'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_featuredcat7thumbheight1']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_featuredcat7thumbheight1'])){$featuredcat7thumbnailheight1=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat7thumbheight1'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_featuredcat7thumbwidth2']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_featuredcat7thumbwidth2'])){$featuredcat7thumbnailwidth2=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat7thumbwidth2'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_featuredcat7thumbheight2']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_featuredcat7thumbheight2'])){$featuredcat7thumbnailheight2=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat7thumbheight2'];}?>
<?php if(!isset($featuredcat7thumbnailwidth2) || empty($featuredcat7thumbnailwidth2)){$featuredcat7thumbnailwidth2 = 100;}?>
<?php if(!isset($featuredcat7thumbnailheight2) || empty($featuredcat7thumbnailheight2)){$featuredcat7thumbnailheight2 = 75;}?>
<?php if(!isset($featuredcat7thumbnailwidth1) || empty($featuredcat7thumbnailwidth1)){$featuredcat7thumbnailwidth1 = 255;}?>
<?php if(!isset($featuredcat7thumbnailheight1) || empty($featuredcat7thumbnailheight1)){$featuredcat7thumbnailheight1 = 142;}?>
<?php global $featuredcatimageszoomcrop,$featuredcatimagesquality;?>
<?php if(!isset($featured7showmany1) || empty($featured7showmany1)){$featured7showmany1=1;} ?>
<?php if(!isset($featured7showmany2) || empty($featured7showmany2)){$featured7showmany2=3;} ?>
<?php $featured7showhowmanytotal=($featured7showmany1 + $featured7showmany2);?>
<h2><a href="<?php echo get_category_link($featuredpostscat7);?>"><?php echo $featuredpostscatname7; ?> </a></h2>


<div class="tier3mainleft">

<?php if (have_posts()) : ?>

<?php $featured71 = new WP_Query('showposts='.$featured7showmany1.'&cat='.$featuredpostscat7); ?>
<?php $f7idsusing=array();?>
<?php while($featured71->have_posts()) : $featured71->the_post(); $f7idsusing[] = $post->ID; ?>
<div class="featured7">
	<?php $thecimage = get_image_for_crop($post->ID,$thumborno=2);?>
	<?php if (isset($thecimage) && !empty($thecimage)) { $thecimgloc=antisnews_crop_img($thecimage,$featuredcat7thumbnailwidth1,$featuredcat7thumbnailheight1,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
	<?php if(isset($thecimgloc) && !empty($thecimgloc)){?>
	<div class="imgstyle">
	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to","Antisnews");?> <?php the_title_attribute(); ?>"><img src="<?php echo $thecimgloc;?>" width="<?php echo $featuredcat7thumbnailwidth1;?>" height="<?php echo $featuredcat7thumbnailheight1;?>" alt="<?php the_title(); ?>" /></a>
	</div>
	<?php } else {if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
	<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
	<?php $thecimgloc=antisnews_crop_img($noimg,$featuredcat7thumbnailwidth1,$featuredcat7thumbnailheight1,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
	<div class="imgstyle">
	<img src="<?php echo $thecimgloc; ?>" width="<?php echo $featuredcat7thumbnailwidth1;?>" height="<?php echo $featuredcat7thumbnailheight1;?>" alt="<?php the_title(); ?>" border="0"/>
	</div>	
	<?php } } ?>	
	<?php } else { if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
	<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
	<?php $thecimgloc=antisnews_crop_img($noimg,$featuredcat7thumbnailwidth1,$featuredcat7thumbnailheight1,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
	<div class="imgstyle">
	<img src="<?php echo $thecimgloc;?>" width="<?php echo $featuredcat7thumbnailwidth1;?>" height="<?php echo $featuredcat7thumbnailheight1;?>" alt="<?php the_title(); ?>" border="0"/>
	</div>	
	<?php } } ?>

	<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title();?></a></h3>
		<?php $rcsspthec = get_the_excerpt(); ?>		
		<?php if (!isset($rcsspthec) || empty($rcsspthec)){ $rcsspthec = get_the_content(); }?>
		<?php $rcsspthec = strip_tags($rcsspthec);?>
		<?php $rcsspthec = str_replace(' ',' ',$rcsspthec );?>
		<?php $rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );?>
		<?php if(!isset($featuredcat7excerptlength1) || empty($featuredcat7excerptlength1) || !is_numeric($featuredcat7excerptlength1)){ $featuredcat7excerptlength1=275; } ?>
		<?php if(strlen($rcsspthec) > $featuredcat7excerptlength1){$rcsspthec=LimitText(trim($rcsspthec),10,$featuredcat7excerptlength1,""); }?>
		
		<p>
		<?php echo $rcsspthec; ?>
		[<a class="morelink" href="<?php the_permalink() ?>" rel="bookmark"><?php _e("Read More","Antisnews");?></a>]
 		</p>
 </div>	
 		
<?php endwhile; ?>
</div><!--close div class tier3mainright-->
<?php endif; ?>

<div class="tier3mainright">


<?php if (have_posts()) : ?>

<?php $featured7showmany2calc1=($featured7showmany1 + $featured7showmany2);?>
<?php $featured72 = new WP_Query('showposts='.$featured7showmany2calc1.'&cat='.$featuredpostscat7); ?>
<?php while($featured72->have_posts()) : $featured72->the_post(); if(!in_array($post->ID,$f7idsusing)) : ?>
<div class="featured7">
	<?php $thecimage = get_image_for_crop($post->ID,$thumborno=1);?>
	<?php if (isset($thecimage) && !empty($thecimage)) { $thecimgloc=antisnews_crop_img($thecimage,$featuredcat7thumbnailwidth2,$featuredcat7thumbnailheight2,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
	<?php if(isset($thecimgloc) && !empty($thecimgloc)){?>
	<div class="imgstyle">
	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to","Antisnews");?> <?php the_title_attribute(); ?>"><img src="<?php echo $thecimgloc;?>" width="<?php echo $featuredcat7thumbnailwidth2;?>" height="<?php echo $featuredcat7thumbnailheight2;?>" alt="<?php the_title(); ?>" /></a>
	</div>	
	<?php } else {if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
	<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
	<?php $thecimgloc=antisnews_crop_img($noimg,$featuredcat7thumbnailwidth2,$featuredcat7thumbnailheight2,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
	<div class="imgstyle">
	<img src="<?php echo $thecimgloc; ?>" width="<?php echo $featuredcat7thumbnailwidth2;?>" height="<?php echo $featuredcat7thumbnailheight2;?>" alt="<?php the_title(); ?>" border="0"/>
	</div>	
	<?php } } ?>	
	<?php } else { if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
	<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
	<?php $thecimgloc=antisnews_crop_img($noimg,$featuredcat7thumbnailwidth2,$featuredcat7thumbnailheight2,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
	<div class="imgstyle">
	<img src="<?php echo $thecimgloc;?>" width="<?php echo $featuredcat7thumbnailwidth2;?>" height="<?php echo $featuredcat7thumbnailheight2;?>" alt="<?php the_title(); ?>" border="0"/>
	</div>	
	<?php } } ?>

	<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title();?></a></h3>
	
		<?php $rcsspthec = get_the_excerpt(); ?>		
		<?php if (!isset($rcsspthec) || empty($rcsspthec)){ $rcsspthec = get_the_content(); }?>
		<?php $rcsspthec = strip_tags($rcsspthec);?>
		<?php $rcsspthec = str_replace(' ',' ',$rcsspthec );?>
		<?php $rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );?>
		<?php if(!isset($featuredcat7excerptlength2) || empty($featuredcat7excerptlength2) || !is_numeric($featuredcat7excerptlength2)){ $featuredcat7excerptlength2=150; } ?>
		<?php if(strlen($rcsspthec) > $featuredcat7excerptlength2){$rcsspthec=LimitText(trim($rcsspthec),10,$featuredcat7excerptlength2,""); }?>
		
		<p>
		<?php echo $rcsspthec; ?>
		[<a class="morelink" href="<?php the_permalink() ?>" rel="bookmark">Read More</a>]
 		</p>
</div><!--close div class featured7-->
<div class="clear"></div>	
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>
 				

	
</div>
