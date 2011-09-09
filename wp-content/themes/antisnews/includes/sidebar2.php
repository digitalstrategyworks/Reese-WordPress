<?php global $themeoptionsprefix;?>
<div id="postsidebar">

	<?php if($AntisnewsOptions[$themeoptionsprefix.'_sidebar2widgetspos'] == 1  ){ ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Two') ) : ?>

	<?php endif; ?>
	<?php } ?>

	<?php if(!($AntisnewsOptions[$themeoptionsprefix.'_hidecustomlatesttopics'] == "hide" ) ){ ?>
	<?php global $hidelatest; if(!is_404()) { ?>
	<?php if($hidelatest != 1){ ?>	
		<div class="widget"><div class="widgetinside">
			<?php include (TEMPLATEPATH . '/includes/recenttopics.php'); ?>
		</div></div>
	<?php } ?>
	<?php } ?>
	<?php } ?>


	<?php if(!($AntisnewsOptions[$themeoptionsprefix.'_hidecustomlatestcomments'] == "hide" ) ){ ?>
		<div class="widget"><div class="widgetinside">
			<?php include (TEMPLATEPATH . '/includes/latestcomments.php'); ?>
		</div></div>
	<?php } ?>

	<?php if($AntisnewsOptions[$themeoptionsprefix.'_sidebar2widgetspos'] == "2" ){	?>

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Two') ) : ?>

		<div class="widget"><div class="widgetinside">
		<h2><?php _e("Popular Topics","Antisnews");?></h2>
				<?php wp_tag_cloud('smallest=8&largest=14&'); ?>
		</div></div>


	<?php endif; ?>
	<?php } ?>

</div><!--close postsidebar-->
