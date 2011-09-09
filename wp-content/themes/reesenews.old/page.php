<?php get_header(); ?>

<div id="content" class="grid_16">
	
	<div id="pageContent" class="grid_12">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<!-- headline content and main image here -->
			<h2 class="page-head"><?php the_title(); ?></h2>
			<h3 class="page-subhead"><?php echo get_post_meta($post->ID, 'subhead', true); ?></h3>
			
			<?php if ( get_post_meta ($post->ID, 'story image permalink', true ) ) { ?>
			
			<div id="imageBlock"><img src="<?php echo get_post_meta($post->ID, 'story image permalink', true); ?>" />
				<div id="screen"></div>
				<div id="image-caption"><p><?php echo get_post_meta($post->ID, 'image caption', true); ?></p></div>
			</div>
			
			<?php } ?>
		
				
				<div id="textSizing">
				
				</div><!-- end text sizing -->
				
				<div class="entry-content">
				
					<?php the_content(); ?>
					
				</div><!-- end entry -->
								
			
		</div><!-- end post -->
		
	
	<?php endwhile; //loop end ?>
	<?php endif; ?>
	
	</div> <!-- end pageContent -->
			
<?php get_sidebar(); ?>
<?php get_footer(); ?>