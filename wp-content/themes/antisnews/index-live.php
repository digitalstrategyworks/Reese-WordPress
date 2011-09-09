<?php get_header(); ?>
<?php global $wpdb, $themeoptionsprefix; ?>
<?php $featuredcatimageszoomcrop=$AntisnewsOptions[$themeoptionsprefix.'_featuredcatimageszoomcrop'];?>
<?php $featuredcatimagesquality=$AntisnewsOptions[$themeoptionsprefix.'_featuredcatimagesquality'];?>
<div id="tier1">
<div class="tier1main">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Featured 1 Filler Space Top') ) : ?>
		<?php endif; ?>

			<?php $featuredpostscatname=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat'];
			$featuredpostscatname=str_replace("&","&amp;",$featuredpostscatname);

			$featuredpostscat = get_cat_id($featuredpostscatname);

			if(isset($featuredpostscat) && !empty($featuredpostscat))
			{
				include (TEMPLATEPATH . '/includes/featured1.php');
			}
			?>

		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Featured 1 Filler Space Bottom') ) : ?>
		<?php endif; ?>
</div>
<div class="tier1side">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Featured 2 Filler Space Top') ) : ?>
		<?php endif; ?>
		<?php $stickypostsarray=get_option('sticky_posts'); if(isset($stickypostsarray) && !empty($stickypostsarray) && ( count($stickypostsarray) <= 3)){ include (TEMPLATEPATH . '/includes/sticky.php'); } ?>

			<?php $featuredpostscatname2=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat2'];?>
			<?php $featuredpostscatname2=str_replace("&","&amp;",$featuredpostscatname2);?>
			<?php $featuredpostscat2 = get_cat_id($featuredpostscatname2);?>

			<?php if(isset($featuredpostscat2) && !empty($featuredpostscat2)){ include (TEMPLATEPATH . '/includes/featured2.php'); } ?>
		
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Featured 2 Filler Space Bottom') ) : ?>
		<?php endif; ?>
</div>
</div><!--close tier1-->
<div class="clear"></div>

<div id="tier2">
<div class="tier2a">


		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Magazine Sidebar Home One') ) : ?>

			<div class="widget"><div class="widgetinside">
				<h2><?php _e("Categories","Antisnews");?></h2>
				<ul>
				 <?php wp_list_categories('title_li='); ?>
				</ul>
				</div></div>
		<?php endif; ?>

</div>
<div class="tier2b">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Magazine Sidebar Home Two') ) : ?>
		<div class="widget"><div class="widgetinside"><h2><?php _e("Pages","Antisnews");?></h2>
				<ul><?php wp_list_pages('title_li=');?></ul>
		</div></div>
	<?php endif; ?>
</div>
<div class="tier2c">
		<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Featured 3 Filler Space Top') ) : ?>
		<?php endif; ?>	
		
			<?php $featuredpostscatname3=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat3'];?>
			<?php $featuredpostscatname3=str_replace("&","&amp;",$featuredpostscatname3);?>
			<?php $featuredpostscat3 = get_cat_id($featuredpostscatname3);?>
			<?php if(isset($featuredpostscat3) && !empty($featuredpostscat3)){ include (TEMPLATEPATH . '/includes/featured3.php'); } ?>

			<?php $featuredpostscatname4=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat4'];?>
			<?php $featuredpostscatname4=str_replace("&","&amp;",$featuredpostscatname4);?>
			<?php $featuredpostscat4 = get_cat_id($featuredpostscatname4);?>

			<?php if(isset($featuredpostscat4) && !empty($featuredpostscat4)){ include (TEMPLATEPATH . '/includes/featured4.php'); } ?>

		<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Featured 4 Filler Space Bottom') ) : ?>
		<?php endif; ?>	
</div>
<div class="tier2d">
		<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Featured 5 Filler Space Top') ) : ?>
		<?php endif; ?>	
		
			<?php $featuredpostscatname5=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat5'];?>
			<?php $featuredpostscatname5=str_replace("&","&amp;",$featuredpostscatname5);?>
			<?php $featuredpostscat5 = get_cat_id($featuredpostscatname5);?>

			<?php if(isset($featuredpostscat5) && !empty($featuredpostscat5)){ include (TEMPLATEPATH . '/includes/featured5.php'); } ?>


			<?php $featuredpostscatname6=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat6'];?>
			<?php $featuredpostscatname6=str_replace("&","&amp;",$featuredpostscatname6);?>
			<?php $featuredpostscat6 = get_cat_id($featuredpostscatname6);?>

			<?php if(isset($featuredpostscat6) && !empty($featuredpostscat6)){ include (TEMPLATEPATH . '/includes/featured6.php'); } ?>

		<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Featured 6 Filler Space Bottom') ) : ?>
		<?php endif; ?>	
</div>
</div><!--close tier2-->
<div class="clear"></div>

<div id="tier3">

	<div class="tier3main">

			<?php $featuredpostscatname7=$AntisnewsOptions[$themeoptionsprefix.'_featuredcat7'];?>
			<?php $featuredpostscatname7=str_replace("&","&amp;",$featuredpostscatname7);?>
			<?php $featuredpostscat7 = get_cat_id($featuredpostscatname7);?>

			<?php if(isset($featuredpostscat7) && !empty($featuredpostscat7)){ include (TEMPLATEPATH . '/includes/featured7.php'); } ?>
		<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Featured 7 Filler Space Bottom') ) : ?>
		<?php endif; ?>				
	</div>
	<div class="tier3side">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Magazine Sidebar Home Three') ) : ?>
		<?php endif; ?>
	</div>
</div>
<!--close tier3 div-->
<div class="clear"></div>

<div id="tier4">
<div class="tier4a">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Magazine Sidebar Home Four') ) : ?>
<?php endif; ?>
</div>
<div class="tier4b">
	<div class="tier4btop">
		<div class="tier4btopleft">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Magazine Sidebar Home Five') ) : ?>
			<?php endif; ?>
		</div>
		<div class="tier4btopright">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Magazine Sidebar Home Six') ) : ?>
			<?php endif; ?>
		</div>
	</div><!--close tier4btop-->
	<div class="tier4bbottom">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Magazine Sidebar Home Seven') ) : ?>
	<?php endif; ?>
	</div>
</div>
</div><!--close tier 4-->

<?php get_footer(); ?>
