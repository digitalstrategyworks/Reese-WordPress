


		<div class="entry">

 		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?>	</a>	</h2>
		<div class="byline"> <?php _e("Author","Antisnews");?>: <?php  the_author(); ?> <?php _e("Published","Antisnews");?>: <?php  the_time('F jS, Y'); ?>  </div>
		<?php the_content();?>
		<div class="clear"></div>
		<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> <?php _e("Category","Antisnews");?> <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' '); ?>  </p>


		
		<div class="clear"></div>
		</div><!--close div class entry-->

		<div class="clear"></div>



		