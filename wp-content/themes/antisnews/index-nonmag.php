<?php get_header(); ?>
<?php global $themeoptionsprefix;?>
<?php if($AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] == 1){ get_sidebar(); } ?>


<div id="content">


<div class="postarea">

		<?php if (have_posts()) : ?>

 	  	<?php while (have_posts()) : the_post(); ?>


		<div class="entry">
 		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?>	</a>	</h2>
		<div class="byline"><?php  the_time('d M, Y'); ?>  |  <?php _e("Author","Antisnews");?>: <?php  the_author(); ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div>

		

		<?php the_content();?>
		<div class="clear"></div>
		<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> <?php _e("Category","Antisnews");?> <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' '); ?>  </p>

		</div>
		<div class="clear"></div>



		<?php endwhile; ?>


			<div class="paginav">
				<?php
					include('wp-pagenavi.php');
					if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
				?>
			</div>



		

	<?php endif; ?>


</div><!--end postarea-->

<?php include (TEMPLATEPATH . '/includes/sidebar2.php'); ?>
 <?php if($AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] == 2) { get_sidebar(); } ?>
  <?php if($AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] != 2 || $AntisnewsOptions[$themeoptionsprefix.'_sidebarpos'] != 1 )  { get_sidebar(); } ?>
</div><!--end content-->
<?php get_footer(); ?>