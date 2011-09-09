<?php global $themeoptionsprefix;?>
<?php $AntisnewsOptions=get_antisnewsoptions();?>

<?php get_header(); ?>
<?php if($AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] == 1){ get_sidebar(); } ?>

<div id="content">


<div class="postarea">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


			<?php if($AntisnewsOptions[$themeoptionsprefix.'_singlepageadsensecode'] <> "") {?>
			<?php if($AntisnewsOptions[$themeoptionsprefix.'_singlepageadsenseposition'] == 'above post title'){?>

			<div style="padding:10px;text-align:center;">
			<?php echo stripslashes($AntisnewsOptions[$themeoptionsprefix.'_singlepageadsensecode']); ?>
			</div>
			<?php } } ?>
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to','Antisnews'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<?php if($AntisnewsOptions[$themeoptionsprefix.'_singlepageadsensecode'] <> "") {?>
			<?php if($AntisnewsOptions[$themeoptionsprefix.'_singlepageadsenseposition'] == 'below post title'){?>

			<div style="padding:10px;text-align:center;">
			<?php echo stripslashes($AntisnewsOptions[$themeoptionsprefix.'_singlepageadsensecode']); ?>
			</div>
			<?php } } ?>

			<div class="entry">
			<?php $pgswrd=__("Pages",'Antisnews'); $prevtop=__("Previous Topic",'Antisnews'); $nxtop=__("Next Topic",'Antisnews');?>
				<?php if($AntisnewsOptions[$themeoptionsprefix.'_singlepageadsensecode'] <> "") {?>
				<?php if($AntisnewsOptions[$themeoptionsprefix.'_singlepageadsenseposition'] == 'left'){?>

				<div style="float:left;margin-right:10px;">
				<?php echo stripslashes($AntisnewsOptions[$themeoptionsprefix.'_singlepageadsensecode']); ?>
				</div>
				<?php } elseif($AntisnewsOptions[$themeoptionsprefix.'_singlepageadsenseposition'] == 'right'){?>
				<div style="float:right;margin-left:10px;">
				<?php echo stripslashes($AntisnewsOptions[$themeoptionsprefix.'_singlepageadsensecode']); ?>
				</div>
				<?php } ?>
				<?php } ?>
			<?php the_content(__('Read the rest of this entry &raquo;')); ?>
			<?php wp_link_pages(array('before' => "<p><strong>$pgswrd:</strong>", 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php if($AntisnewsOptions[$themeoptionsprefix.'_singlepageadsensecode'] <> "") {?>
				<?php if($AntisnewsOptions[$themeoptionsprefix.'_singlepageadsenseposition'] == 'between post content and post details'){?>

				<div style="padding:10px;text-align:center;">
				<?php echo stripslashes($AntisnewsOptions[$themeoptionsprefix.'_singlepageadsensecode']); ?>
				</div>
				<?php } } ?>
			<div class="clear"></div>
			<?php if(has_tag()){ echo " <div class=\"tags\">"; _e("Related Tags","Antisnews"); echo ": "; the_tags(''); echo "</div>"; }?>


					<div class="bnavigation">
						<div class="bnavleft"><?php previous_post_link('<b>'.$prevtop.':</b> %link') ?></div>
						<div class="bnavright"><?php next_post_link('<b>'.$nxtop.':</b> %link') ?></div>
					</div>

			</div><!--close div class entry-->
			<div class="clear"></div>
				<?php if($AntisnewsOptions[$themeoptionsprefix.'_singlepageadsensecode'] <> "") {?>
				<?php if($AntisnewsOptions[$themeoptionsprefix.'_singlepageadsenseposition'] == 'under post details'){?>

				<div style="padding:10px;text-align:center;">
				<?php echo stripslashes($AntisnewsOptions[$themeoptionsprefix.'_singlepageadsensecode']); ?>
				</div>
				<?php } } ?>

					<?php if ( comments_open() ) : ?>
					<div class="commentarea">
						<?php comments_template(); // Get wp-comments.php template ?>
					</div>
					<?php endif; ?>





	<?php endwhile; else : ?>


		<h2><?php _e('Not Found'); ?></h2>

		<p><?php _e('Sorry, but the page you requested cannot be found.'); ?></p>


	<?php endif; ?>

</div><!--end postareasingle-->
<?php include (TEMPLATEPATH . '/includes/postsidebar.php'); ?>
<?php if($AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] == 2) { get_sidebar(); } ?>
<?php if($AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] != 2 || $AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] != 1 )  { get_sidebar(); } ?>

</div><!--end content-->

<?php get_footer(); ?>



