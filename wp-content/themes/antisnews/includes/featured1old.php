<?php if($AntisnewsOptions[$themeoptionsprefix.'_deactivateslideshow'] == 'deactivate'){ $featuredmainhowmany=1;} else { $featuredmainhowmany=$AntisnewsOptions[$themeoptionsprefix.'_numpostsfeatured']; } if(!isset($featuredmainhowmany) || empty($featuredmainhowmany)){$featuredmainhowmany=5;} ?>
<?php $featuredquery = new WP_Query("showposts=".$featuredmainhowmany."&cat=".$featuredpostscat); ?>
<?php $featuredcatimageszoomcrop=$AntisnewsOptions[$themeoptionsprefix.'_featuredcatimageszoomcrop'];?>
<?php $featuredcatimagesquality=$AntisnewsOptions[$themeoptionsprefix.'_featuredcatimagesquality'];?>

<div id="featured"> <span class="featured-badge"></span>
	<div id="featured-content">
		<div class="container">
			<?php if($AntisnewsOptions[$themeoptionsprefix.'_deactivateslideshow'] != 'deactivate'){?>
			<div class="slides">
			<?php }?>
			<?php while ($featuredquery->have_posts()) : $featuredquery->the_post(); ?>
			<?php if($AntisnewsOptions[$themeoptionsprefix.'_deactivateslideshow'] == 'deactivate'){?>
			<div style="visibility: show;">
			<?php } else { ?>
			<div style="visibility: hidden;">
			<?php } ?>
			<div class="featured-slides">
				<div class="featured-image">
				<?php $thef1image = get_image_for_crop($post->ID,$thumborno=''); if (isset($thef1image) && !empty($thef1image)) { $thecimglocf1=antisnews_crop_img($img=$thef1image,$w=598,$h=324,$featuredcatimagesquality,$featuredcatimageszoomcrop,$post->ID);?>
				<?php if(isset($thecimglocf1) && !empty($thecimglocf1)){?>
				<img src="<?php echo $thecimglocf1;?>" alt="<?php the_title(); ?>" width="598" height="324" /><?php } ?>
				<?php }?>
				</div>
				<div class="featured-title">
					<div class="overlay"></div>
					<div class="featured-title-content">
						<p><span class="featured-post-date"><?php the_time('l, F j, Y') ?></span></p>
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					</div>
				</div>
			</div>
			</div><!-- close style visibility: show|hide-->
			<?php endwhile; ?>
			<?php if($AntisnewsOptions[$themeoptionsprefix.'_deactivateslideshow'] != 'deactivate'){?>
			</div><!-- close class slides if applicable-->
			<?php } ?>
		</div>
	</div>
</div>
