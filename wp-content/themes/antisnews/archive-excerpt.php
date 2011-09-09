


		<div class="excerpt">

 		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?>	</a>	</h2>
		<div class="byline"><?php  the_time('d M, Y'); ?>  |  <?php _e("Author","Antisnews");?>: <?php  the_author(); ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div>

		<?php $operationmode=$AntisnewsOptions[$themeoptionsprefix.'_operationmode'];?>
		<?php if(!isset($operationmode) || empty($operationmode)||($operationmode != 'Live')){?>
		<div class="imgstyle">
		<?php bdw_get_images($post->ID,$width=$archivepagethumbnailwidth,$height='',$thumborno=1);?>
		</div>
		<?php } else {?>
		
		<?php $thecimage = get_image_for_crop($post->ID,$thumborno=2);?>
		<?php if (isset($thecimage) && !empty($thecimage)){ $thecimgloc=antisnews_crop_img($thecimage,$archivepagethumbnailwidth,$archivepagethumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
		<?php if(isset($thecimgloc) && !empty($thecimgloc)){?>
		<div class="imgstyle">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to","Antisnews");?> <?php the_title_attribute(); ?>"><img src="<?php echo $thecimgloc;?>" width="<?php echo $archivepagethumbnailwidth;?>" height="<?php echo $archivepagethumbnailheight;?>" alt="<?php the_title(); ?>" /></a>
		</div>	
		<?php } else {if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
		<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
		<?php $thecimgloc=antisnews_crop_img($noimg,$archivepagethumbnailwidth,$archivepagethumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
		<div class="imgstyle">
		<img src="<?php echo $thecimgloc; ?>" width="<?php echo $archivepagethumbnailwidth;?>" height="<?php echo $archivepagethumbnailheight;?>" alt="<?php the_title(); ?>" border="0"/>
		</div>	
		<?php } } ?>
		<?php } else { if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
		<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
		<?php $thecimgloc=antisnews_crop_img($noimg,$archivepagethumbnailwidth,$archivepagethumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
		<div class="imgstyle">
		<img src="<?php echo $thecimgloc; ?>" width="<?php echo $archivepagethumbnailwidth;?>" height="<?php echo $archivepagethumbnailheight;?>" alt="<?php the_title(); ?>" border="0"/>
		</div>	
		<?php } } ?>
		
		<?php }?>

		<?php $rcsspthec = get_the_excerpt(); ?>		
		<?php if (!isset($rcsspthec) || empty($rcsspthec)){ $rcsspthec = get_the_content(); }?>
		<?php $rcsspthec = strip_tags($rcsspthec);?>
		<?php $rcsspthec = str_replace(' ',' ',$rcsspthec );?>
		<?php $rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );?>
		<?php if(!isset($archivepageexcerptlength) || empty($archivepageexcerptlength) || !is_numeric($archivepageexcerptlength)){ $archivepageexcerptlength=275; } ?>
		<?php if(strlen($rcsspthec) > $archivepageexcerptlength){$rcsspthec=LimitText(trim($rcsspthec),10,$archivepageexcerptlength,""); }?>
		
		<p>
		<?php echo $rcsspthec; ?>
		[<a class="morelink" href="<?php the_permalink() ?>" rel="bookmark"><?php _e("Read More","Antisnews");?></a>]
 		</p>
		<div class="clear"></div>
		</div><!--close div class excerpt-->

		<div class="clear"></div>



