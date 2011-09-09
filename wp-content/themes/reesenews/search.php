<?php 
/*
 * display search results. keep in mind that when a user searches for author name,
 * wordpress does not return any results. this is something that bothers me a lot
 * and i hope they can either add the feature or we can find a plugin to do this
 *
 */
get_header(); ?>

<div id="content" class="grid_16">

	<div id="categoryContent" class="grid_12">
	
	<?php 
	//first, check to make sure that there are any search terms matched. otherwise,
	//skip everything below and go straight to saying that nothing matched
	//the users criteria.
	if ( have_posts() ) : ?>
		
	<div id="search-header">
		<h2 class="page-head">Search Results</h2>
	</div>
		
	<?php 
		  //don't start the loop until after we've said search results because otherwise it'd display 10 times.
		  while ( have_posts() ) : the_post(); ?>		
		
		<div class="element search">
				
				<div class="topGutter">
					<a href="<?php the_permalink(); ?>"><p class="head"><?php the_title(); ?></p>
					<p class="subhead"><?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'subhead'); ?></p></a>
					<p class="byline">By <?php coauthors_posts_links(); ?></p>
				</div>
				
				<div class="storyDescription">
					<?php 
							//if the post has a thumbnail then output it
						if ( get_the_post_thumbnail($post->ID, 'thumbnail') ) { ?>
						
						<div class="thumbnail">
							<?php echo get_the_post_thumbnail($post->ID, array(100, 100)); ?>
						</div>
						
					<?php } ?>
						
					<?php the_excerpt(); ?>
					
					<!-- extra information about each story as well as icon links that pop up in a lightbox -->
					
					<p class="comments"><a href="<?php comments_link(); ?>"><?php comments_number('no comments', 'one comment', '% comments'); ?></a></p>
					
				</div><!-- end story description and then clear the float-->
			
			<div class="clear"></div>
			
			</div><!-- end element -->
				
		<?php endwhile; ?>
		
		<div id="navigation">
			<div id='nav_left'>
				<?php next_posts_link('« Older Entries') ?>
			</div>
			
			<div id='nav_right'>
				<?php previous_posts_link('Newer Entries »') ?>
			</div>
		</div>
		
		<?php else : ?>
			<div id="search-header">
				<p>Sorry, nothing matched your search criteria</p>
			</div>
			
			<div class="clear"></div>
		
		<?php endif; ?>
		<?php rewind_posts(); ?>
		<?php wp_reset_query(); ?>
					
	</div><!-- end categoryContent -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>