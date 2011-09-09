<?php get_header(); ?>

<div id="content" class="grid_16">

	<div id="categoryContent" class="grid_12">
			
			<?php query_posts('showposts=1&category_name=chill-featured-category'); ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php global $post;
					$featuredId = $post->ID; ?>
				
			<div id="featuredContent">
			
				<img src="<?php the_DifferentTypeFacts($post->ID, 'category-image'); ?>" />
				<div id="featuredScreen"></div>
				<div id="featuredCaption">
					<a href="<?php the_permalink(); ?>"><span class="head"><?php the_title(); ?></span><br /><span class="subhead"><?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'subhead'); ?></span><span class="arrows">&gt;&gt;&gt;</span><span class="category-more">FULL STORY</span></a>
				</div>
			
			</div>
			
			<?php endwhile; ?>
			<?php rewind_posts(); ?>
			<?php wp_reset_query(); ?>
		
		<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts("posts_per_page=5&paged=$paged&category_name=chill"); 
		?>
		<?php while ( have_posts() ) : the_post(); ?>
		<?php global $post; ?>
		<?php if ( $post->ID != $featuredId ) { ?>
		
		<div class="element">
			
			<?php if ( get_the_post_thumbnail($post->ID, 'thumbnail') ) { ?>
			<div class="thumbnail">
				<?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
			</div>
			<?php } ?>
			
			<div class="topGutter">
				<a href="<?php the_permalink(); ?>"><p class="head"><?php the_title(); ?></p>
				<p class="subhead"><?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'subhead'); ?></p></a>
			</div>
			
			
			
			<div class="storyDescription">
					
				<?php the_excerpt(); ?>
				
				<p class="comments"><a href="<?php comments_link(); ?>"><?php comments_number('no comments', 'one comment', '% comments'); ?></a></p>
				
				<?php if ( check_DifferentTypeFacts($post->ID, 'story-photo') || check_DifferentTypeFacts($post->ID, 'story-video') || check_DifferentTypeFacts($post->ID, 'sidebar-audio') ) { ?>
				<div class="media"><ul>	
					<?php if ( check_DifferentTypeFacts($post->ID, 'story-photo') ) : ?>
						<li><a href="<?php the_DifferentTypeFacts($post->ID, 'story-photo'); ?>" rel="lightbox" title="<?php the_DifferentTypeFacts($post->ID, 'image-caption'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/icon-photos.png" /></a></li>
					<?php endif; ?>
					
					<?php if ( check_DifferentTypeFacts($post->ID, 'story-video') ) : ?>
						<li><a href="#video-<?php echo $post->ID; ?>" rel="lightbox" title="<?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/icon-video.png" /></a></li>
						
						<div id="video-<?php echo $post->ID; ?>" class="icon-video hide">
							<?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'story-video'); ?>
						</div>
					<?php endif; ?>
					
					<?php if ( check_DifferentTypeFacts($post->ID, 'sidebar-audio') ) : ?>
						<li><a href="#audio-<?php echo $post->ID; ?>" rel="lightbox"><img src="<?php bloginfo('template_directory'); ?>/images/icon-audio.png" /></a></li>
						
								<?php $audio_meta = check_DifferentTypeFacts($post->ID, 'sidebar-audio'); ?>
						
								<div id="audio-<?php echo $post->ID; ?>" class="hide">
									<ul class="playlist">
										<li><a href="<?php echo $audio_meta; ?>"><?php the_DifferentTypeFacts($post->ID, 'sidebar-audio-title'); ?></a></li>
									</ul>
									
									<div id="control-template"> 
									  <!-- control markup inserted dynamically after each link --> 
									  <div class="controls"> 
									   <div class="statusbar"> 
										<div class="loading"></div> 
										 <div class="position"></div> 
									   </div> 
									  </div> 
									  <div class="timing"> 
									   <div id="sm2_timing" class="timing-data"> 
										<span class="sm2_position">%s1</span> / <span class="sm2_total">%s2</span></div> 
									  </div> 
									  <div class="peak"> 
									   <div class="peak-box"><span class="l"></span><span class="r"></span> 
									   </div> 
									  </div> 
									 </div> 
									 
									 <div id="spectrum-container" class="spectrum-container"> 
									  <div class="spectrum-box"> 
									   <div class="spectrum"></div> 
									  </div> 
									 </div>
								</div>
								
					<?php endif; ?>
				</ul></div>
				<?php } ?>
			</div>
		
		<div class="clear"></div>
			
		
		</div>
		
		<?php } ?>
		
		<?php endwhile; ?>
		
		<div id="navigation">
			<div id='nav_left'>
				<?php next_posts_link('« Older Entries') ?>
			</div>
			
			<div id='nav_right'>
				<?php previous_posts_link('Newer Entries »') ?>
			</div>
		</div>
		
			<?php rewind_posts(); ?>
			<?php wp_reset_query(); ?>
					
	</div><!-- end categoryContent -->
	
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>