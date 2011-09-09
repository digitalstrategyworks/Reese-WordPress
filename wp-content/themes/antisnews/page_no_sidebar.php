<?php
/*
Template Name: Page With No Sidebar
*/
?>
<?php get_header(); ?>
<div id="content">




		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

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

		<?php endwhile; endif; ?>

</div><!--end content-->

<?php get_footer(); ?>
