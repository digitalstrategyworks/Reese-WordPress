<?php $pageexcerptsexcerptlength=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat7excerptlength1'];?>
<?php $pageexcerptsshowmany=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat7howmany1'];?>
<?php $pageexcerptsthumbnailwidth=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat7thumbwidth1'];?>
<?php $pageexcerptsthumbnailheight=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat7thumbheight1'];?>
<?php if(!isset($pageexcerptsthumbnailwidth) || empty($pageexcerptsthumbnailwidth)){$pageexcerptsthumbnailwidth = 75;}?>
<?php if(!isset($pageexcerptsthumbnailheight) || empty($pageexcerptsthumbnailheight)){$pageexcerptsthumbnailheight = 75;}?>
<?php global $featuredcatimageszoomcrop,$featuredcatimagesquality;?>
<?php if(!isset($pageexcerptsshowmany) || empty($pageexcerptsshowmany)){$pageexcerptsshowmany=5;} ?>

<?php 

//The Query
$week = date('W');
$year = date('Y');
query_posts('year=' . $year .'&w=' .$week );
?>
				
<?php if ( have_posts() ) : ?>

	<h2><?php _e("New This Week","Antisnews");?></h2>
	
	<?php while ( have_posts() ) : the_post();?>
	<div class="pageexcerpts">

	<?php $thecimage = get_image_for_crop($post->ID,$thumborno=1);?>
	<?php if (isset($thecimage) && !empty($thecimage)) { ?>
	<div class="imgstyle">
	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to","Antisnews");?> <?php the_title_attribute(); ?>"><img src="<?php echo bloginfo('template_url'); ?>/cropper.php?src=<?php echo $thecimage; ?>&amp;h=<?php echo $pageexcerptsthumbnailheight; ?>&amp;w=<?php echo $pageexcerptsthumbnailwidth; ?>&amp;zc=<?php echo $featuredcatimageszoomcrop; ?>&amp;q=<?php echo $featuredcatimagesquality; ?>" alt="<?php the_title(); ?>" /></a>
	</div>	
	<?php } else { if($AntisnewsOptions[$themeoptionsprefix.'_noimagethumbnailstate'] != 'off'){ ?>
	<?php $noimg=get_bloginfo('template_url').'/images/noimg.gif';?>
	<div class="imgstyle">
	<img src="<?php echo bloginfo('template_url'); ?>/cropper.php?src=<?php echo $noimg;?>&amp;h=<?php echo $pageexcerptsthumbnailheight; ?>&amp;w=<?php echo $pageexcerptsthumbnailwidth; ?>&amp;zc=0&amp;q=100" alt="<?php the_title(); ?>" border="0"/>
	</div>	
	<?php } } ?>
		
		<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title();?></a></h3>
		
		<?php $rcsspthec = get_the_excerpt(); ?>		
		<?php if (!isset($rcsspthec) || empty($rcsspthec)){ $rcsspthec = get_the_content(); }?>
		<?php $rcsspthec = strip_tags($rcsspthec);?>
		<?php $rcsspthec = str_replace(' ',' ',$rcsspthec );?>
		<?php $rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );?>
		<?php if(!isset($pageexcerptsexcerptlength) || empty($pageexcerptsexcerptlength) || !is_numeric($pageexcerptsexcerptlength)){ $pageexcerptsexcerptlength=150; } ?>
		<?php if(strlen($rcsspthec) > $pageexcerptsexcerptlength){$rcsspthec=LimitText(trim($rcsspthec),10,$pageexcerptsexcerptlength,""); }?>
		
		<p>
		<?php echo $rcsspthec; ?>
		[<a class="morelink" href="<?php the_permalink() ?>" rel="bookmark">Read More</a>]
 		</p>
 		
	 </div>
	 <div class="clear"></div>
	 
<?php endwhile; ?>
<?php endif; ?>