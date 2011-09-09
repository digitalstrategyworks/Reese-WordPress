<?php 
/*
 * the front page is controlled by custom taxonomies only
 * it is also composed of a left and middle sidebar area
 * which is filled by widgets
 *
 */

get_header(); ?>

<!-- slider  -->
<div id="featured">

	<?php $imageCounter = 1; ?>
	<?php
			//there are three loops here which load in all of the elements of the slider
			//first are the images, second are the photo credits, then the captions
			//the loops are necessary because the slider wants the items in a certain order.
			//var which will be used to query three posts from the slider featured location
			$vars = array(
					'featured-location' => 'slider',
					'showposts' => 3
				);
				
			//execute query		 
			query_posts($vars); ?>
			
	<?php 
	// FIRST LOOP
	
	while ( have_posts() ) : the_post(); ?>
	
		<!-- slider images -->
		<a href="<?php the_permalink(); ?>"><img src="<?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'home-featured-permalink'); ?>" rel="caption-<?php echo $imageCounter; ?>" /></a>	
		
		<?php $imageCounter+=1; ?>
	
	<?php endwhile; ?><?php rewind_posts(); ?><?php wp_reset_query(); ?>
	
	
	<!-- photo credits -->
	<?php $imageCounter = 1; ?>
	
	<?php 
		//reset the query now to get the photo credit
		//it should be the exact same three posts, however, this is needed because the spans have to be below where the 
		query_posts($vars); ?>
		
	<?php 
	// SECOND LOOP
	
	while ( have_posts() ) : the_post(); ?>	
	
		<?php if( check_DifferentTypeFacts($post->ID, 'photo-credit') ) { ?>
		
		<span id="credit-<?php echo $imageCounter; ?>" class="photo-credit"><?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'photo-credit'); ?></span>
		
		<?php } ?>
		
		<?php $imageCounter++; ?>
		
	<?php endwhile; ?><?php rewind_posts(); ?><?php wp_reset_query(); ?>
	
	<div id="slider-blue"></div><!-- blue area that sits on the left of the slider -->
</div> <!-- end slider -->

	<?php $imageCounter = 1; ?>
	<?php query_posts($vars); ?>
	<?php 
	// THIRD LOOP
	
	while ( have_posts() ) : the_post(); ?>
	
	<span class="orbit-caption" id="caption-<?php echo $imageCounter; ?>"><a href="<?php the_permalink(); ?>"><p class="head"><?php if ( check_DifferentTypeFacts($post->ID, 'slider-head') ) { the_DifferentTypeFacts($post->ID, 'slider-head'); } else { the_title(); } ?></p><p class="subhead"><?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'subhead'); ?></p></a><p class="byline">By <?php coauthors_posts_links(); ?></p></span>
	
	<?php $imageCounter++; ?>
	<?php endwhile; ?><?php rewind_posts(); ?><?php wp_reset_query(); ?>
	
<div class="clear"></div>
		


<!-- content -->
		
<div id="content" class="grid_16">

		<!-- @@@ begin left bar @@@  -->
		<div id="leftBar" class="grid_5">
			
			<?php if ( is_sidebar_active('left-content') ) : ?>
					<?php dynamic_sidebar('left-content'); ?>
			<?php endif; ?>
									
		</div><!-- end left bar -->
							
			<!-- @@@ begin text featured stories @@@ -->
		<div id="featured_text" class="grid_11">
			<ul>
			
			<!-- pulls a list of posts from category 'featured_text' into list items -->
			 <?php $post_num = 1; //var so we can give classes depending on li position
			 	   $vars = array(
			 	   		'featured-location' => 'featured-text',
			 	   		'showposts' => 3
			 	   ); 
			 	   
			 ?>
			 	 
			 <?php query_posts($vars); ?>
			 <?php while ( have_posts() ) : the_post(); ?>		
			
				<li class="<?php if($post_num==3) { echo "last"; } else { echo "normal"; } ?>"><a href="<?php the_permalink(); ?>"><div class="text-hed"><?php the_title(); ?></div></a>
								
					<div class="clear"></div>
				</li>
				
			 <?php $post_num++; ?>
			 <?php endwhile; ?>
			 <?php rewind_posts(); ?>
			 <?php wp_reset_query(); ?>
			 </ul>
		</div>
			
		<!-- middle bar -->
		<div id="middleBar" class="grid_7">
				
				<?php 
				
				//the video element is hardcoded to be at the top of the area as a multiplayer.
				//there is also a video widget that could be used instead.
				
				?>
			
			<?php if ( is_sidebar_active('middle-content') ) : ?>
				<?php dynamic_sidebar('middle-content'); ?>
			<?php endif; ?>
			
						
		</div><!--end middleBar -->
			
<?php get_sidebar(); ?>
<?php get_footer(); ?>