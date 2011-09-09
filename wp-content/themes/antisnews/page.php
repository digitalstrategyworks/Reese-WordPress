<?php get_header(); ?>
<?php global $themeoptionsprefix;?>
<?php $AntisnewsOptions=get_antisnewsoptions();?>
<?php if($AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] == 1){ get_sidebar(); } ?>

<div id="content">


<div class="postarea">

		<?php if (have_posts()) :?>
		<div class="entry">
		
		<?php while (have_posts()) : the_post(); ?>

		<h2><?php the_title(); ?></h2>


			<?php $pgswrd=__("Pages",'Antisnews'); $prevtop=__("Previous Topic",'Antisnews'); $nxtop=__("Next Topic",'Antisnews');?>
			<?php the_content(__('Read the rest of this entry &raquo;')); ?>
			<div class="postareameta"><?php edit_post_link(__('Edit this entry.'), '<p>', '</p>'); ?></div>
			<?php wp_link_pages(array('before' => "<p><strong>$pgswrd:</strong>", 'after' => '</p>', 'next_or_number' => 'number')); ?>

				<?php
					$commentsonpage=get_option('antisnews_commentsonpage');
					if(!isset($commentsonpage) || empty($commentsonpage) || ($commentsonpage == 'yes') )
					{ ?>
					<?php if ( comments_open() ) : ?>
					<div class="commentarea">
						<?php comments_template(); // Get wp-comments.php template ?>
					</div>
					<?php endif; ?>
				<?php } ?>

		<?php endwhile; ?>
		
		</div>
		
		<?php endif; ?>



</div><!--end postarea-->
<?php include (TEMPLATEPATH . '/includes/sidebar2.php'); ?>
<?php if($AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] == 2) { get_sidebar(); } ?>
<?php if($AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] != 2 || $AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] != 1 )  { get_sidebar(); } ?>

</div><!--end content-->

<?php get_footer(); ?>
