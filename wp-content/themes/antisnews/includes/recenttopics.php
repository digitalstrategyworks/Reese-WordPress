<?php global $themeoptionsprefix;?>
<?php $latesttopicsexcerptlength=$AntisnewsOptions[$themeoptionsprefix.'_latesttopicsexcerptlength'];?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_numlatesttopics']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_numlatesttopics'])){$latesttopicshowmany=$AntisnewsOptions[$themeoptionsprefix.'_numlatesttopics'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_latesttopicsthumbwidth']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_latesttopicsthumbwidth'])){$latesttopicsthumbnailwidth=$AntisnewsOptions[$themeoptionsprefix.'_latesttopicsthumbwidth'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_latesttopicsthumbheight']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_latesttopicsthumbheight'])){$latesttopicsthumbnailheight=$AntisnewsOptions[$themeoptionsprefix.'_latesttopicsthumbheight'];}?>
<?php $latesttopicstitle=$AntisnewsOptions[$themeoptionsprefix.'_latesttopicstitle'];?>

<?php if(!isset($latesttopicsthumbnailwidth) || empty($latesttopicsthumbnailwidth)){$latesttopicsthumbnailwidth = 75;}?>
<?php if(!isset($latesttopicsthumbnailheight) || empty($latesttopicsthumbnailheight)){$latesttopicsthumbnailheight = 50;}?>
<?php $featuredcatimageszoomcrop=$AntisnewsOptions[$themeoptionsprefix.'_featuredcatimageszoomcrop'];?>
<?php $featuredcatimagesquality=$AntisnewsOptions[$themeoptionsprefix.'_featuredcatimagesquality'];?>
<?php if(!isset($latesttopicshowmany) || empty($latesttopicshowmany)){$latesttopicshowmany=5;} ?>

<?php if(!isset($latesttopicstitle) || empty($latesttopicstitle)){$latesttopicstitle=__("Latest Topics","Antisnews");} ?>


<?php $numlatesttopics=$latesttopicshowmany; if(!isset($numlatesttopics) || empty($numlatesttopics) ){ $numlatesttopics=3;} ?>

<?php $recenttopics = new WP_Query('showposts='.$numlatesttopics); ?>

<?php if ($recenttopics->have_posts()) : ?>

<h2><?php echo $latesttopicstitle;?></h2>


<?php while($recenttopics->have_posts()) : $recenttopics->the_post(); if(!is_sticky()): ?>

		<div class="excerpt">

		<?php $operationmode=$AntisnewsOptions[$themeoptionsprefix.'_operationmode'];?>
		<?php if(!isset($operationmode) || empty($operationmode)||($operationmode != 'Live')){?>
		<div class="imgstyle">
		<?php bdw_get_images($post->ID,$width=$latesttopicsthumbnailwidth,$height='',$thumborno=1);?>
		</div>
		<?php } else {?>

		<?php $thecimage = get_image_for_crop($post->ID,$thumborno=1);?>
		<?php if (isset($thecimage) && !empty($thecimage)) { $thecimgloc=antisnews_crop_img($thecimage,$latesttopicsthumbnailwidth,$latesttopicsthumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID); ?>
		<?php if(isset($thecimgloc) && !empty($thecimgloc)){?>
		<div class="imgstyle">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to","Antisnews");?> <?php the_title_attribute(); ?>"><img src="<?php echo $thecimgloc; ?>" width="<?php echo $latesttopicsthumbnailwidth;?>" height="<?php echo $latesttopicsthumbnailheight;?>" alt="<?php the_title(); ?>" /></a>
		</div>	
		<?php } else {if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
		<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
		<?php $thecimgloc=antisnews_crop_img($noimg,$latesttopicsthumbnailwidth,$latesttopicsthumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
		<div class="imgstyle">
		<img src="<?php echo $thecimgloc; ?>" width="<?php echo $archivepagethumbnailwidth;?>" height="<?php echo $archivepagethumbnailheight;?>" alt="<?php the_title(); ?>" border="0"/>
		</div>	
		<?php } } ?>
		<?php } else { if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
		<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
		<?php $thecimgloc=antisnews_crop_img($noimg,$latesttopicsthumbnailwidth,$latesttopicsthumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
		<div class="imgstyle">
		<img src="<?php echo $thecimgloc;?>" width="<?php echo $latesttopicsthumbnailwidth;?>" height="<?php echo $latesttopicsthumbnailheight;?>" alt="<?php the_title(); ?>" border="0"/>
		</div>	
		<?php } } ?>
		
		<?php } ?>
		
		<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title();?></a></h3>
		
		<?php if($AntisnewsOptions[$themeoptionsprefix.'_latesttopicsshowexcerpt'] != 'hide'){?>
		<?php $rcsspthec = get_the_excerpt(); ?>		
		<?php if (!isset($rcsspthec) || empty($rcsspthec)){ $rcsspthec = get_the_content(); }?>
		<?php $rcsspthec = strip_tags($rcsspthec);?>
		<?php $rcsspthec = str_replace(' ',' ',$rcsspthec );?>
		<?php $rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );?>
		<?php if(!isset($latesttopicsexcerptlength) || empty($latesttopicsexcerptlength) || !is_numeric($latesttopicsexcerptlength)){ $latesttopicsexcerptlength=120; } ?>
		<?php if(strlen($rcsspthec) > $latesttopicsexcerptlength){$rcsspthec=LimitText(trim($rcsspthec),10,$latesttopicsexcerptlength,""); }?>
		
		<p>
		<?php echo $rcsspthec; ?>
		[<a class="morelink" href="<?php the_permalink() ?>" rel="bookmark">Read More</a>]
 		</p>
 		<?php } ?>
 				 
 				 
 		 </div>
 		 <div class="clear"></div>
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>




