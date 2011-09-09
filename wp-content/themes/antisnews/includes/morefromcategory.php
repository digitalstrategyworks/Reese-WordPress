<?php $morefromthiscatexcerptlength=$AntisnewsOptions[$themeoptionsprefix.'_morefromthiscatexcerptlength'];?>
<?php $morefromthiscathowmany=$AntisnewsOptions[$themeoptionsprefix.'_morefromthiscathowmany'];?>
<?php $morefromthiscatthumbnailwidth=$AntisnewsOptions[$themeoptionsprefix.'_morefromthiscatthumbwidth'];?>
<?php $morefromthiscatthumbnailheight=$AntisnewsOptions[$themeoptionsprefix.'_morefromthiscatthumbheight'];?>
<?php $morefromthiscattitle=$AntisnewsOptions[$themeoptionsprefix.'_morefromthiscattitle'];?>

<?php if(!isset($morefromthiscatthumbnailwidth) || empty($morefromthiscatthumbnailwidth)){$morefromthiscatthumbnailwidth = 75;}?>
<?php if(!isset($morefromthiscatthumbnailheight) || empty($morefromthiscatthumbnailheight)){$morefromthiscatthumbnailheight = 50;}?>
<?php $featuredcatimageszoomcrop=$AntisnewsOptions[$themeoptionsprefix.'_featuredcatimageszoomcrop'];?>
<?php $featuredcatimagesquality=$AntisnewsOptions[$themeoptionsprefix.'_featuredcatimagesquality'];?>
<?php if(!isset($morefromthiscathowmany) || empty($morefromthiscathowmany)){$morefromthiscathowmany=5;} ?>

<?php if(!isset($morefromthiscattitle) || empty($morefromthiscattitle)){$morefromthiscattitle=__("More from this category","Antisnews");} ?>


		<?php
		// get the category by post ID
		global $post;
		$category = get_the_category();
		$thispostid=$post->ID;
		?>


<?php $morefromthiscat = new WP_Query('showposts='.$morefromthiscathowmany.'&cat='.$category[0]->cat_ID); ?>

<?php if ($morefromthiscat->have_posts()) : ?>
<h2><a href="<?php echo get_category_link($category[0]->cat_ID);?>"><?php echo $morefromthiscattitle;?></a></h2>

<?php while($morefromthiscat->have_posts()) : $morefromthiscat->the_post(); if(!($thispostid == $post->ID)) : $mftcpID = $post->ID; ?>

		<div class="excerpt">

		<?php $operationmode=$AntisnewsOptions[$themeoptionsprefix.'_operationmode'];?>
		<?php if(!isset($operationmode) || empty($operationmode)||($operationmode != 'Live')){?>
		<div class="imgstyle">
		<?php bdw_get_images($post->ID,$width=$morefromthiscatthumbnailwidth,$height='',$thumborno=1);?>
		</div>
		<?php } else {?>
		
		<?php $thecimage = get_image_for_crop($post->ID,$thumborno=1);?>
		<?php if (isset($thecimage) && !empty($thecimage)) { $thecimgloc=antisnews_crop_img($thecimage,$morefromthiscatthumbnailwidth,$morefromthiscatthumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
		<div class="imgstyle">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to","Antisnews");?> <?php the_title_attribute(); ?>"><img src="<?php echo $thecimgloc;?>" alt="<?php the_title(); ?>" /></a>
		</div>	
		<?php } else { if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
		<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
		<?php $thecimgloc=antisnews_crop_img($noimg,$morefromthiscatthumbnailwidth,$morefromthiscatthumbnailheight,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
		<div class="imgstyle">
		<img src="<?php echo $thecimgloc;?>" alt="<?php the_title(); ?>" border="0"/>
		</div>	
		<?php } } ?>
		
		<?php } ?>
		

		<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title();?></a>

		<?php if($AntisnewsOptions[$themeoptionsprefix.'_morefromthiscatshowexcerpt'] == 'show'){?>
		<?php $rcsspthec = get_the_excerpt(); ?>		
		<?php if (!isset($rcsspthec) || empty($rcsspthec)){ $rcsspthec = get_the_content(); }?>
		<?php $rcsspthec = strip_tags($rcsspthec);?>
		<?php $rcsspthec = str_replace(' ',' ',$rcsspthec );?>
		<?php $rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );?>
		<?php if(!isset($morefromthiscatexcerptlength1) || empty($morefromthiscatexcerptlength1) || !is_numeric($morefromthiscatexcerptlength1)){ $morefromthiscatexcerptlength1=120; } ?>
		<?php if(strlen($rcsspthec) > $morefromthiscatexcerptlength1){$rcsspthec=LimitText(trim($rcsspthec),10,$morefromthiscatexcerptlength1,""); }?>
		
		<p>
		<?php echo $rcsspthec; ?>
		[<a class="morelink" href="<?php the_permalink() ?>" rel="bookmark">Read More</a>]
 		</p>
 		<?php } ?>
 				 
 				 
 		 </div><div class="clear"></div>

<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>




