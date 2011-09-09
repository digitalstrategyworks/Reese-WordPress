<?php get_header(); ?>

<div id="content" class="grid_16">
	
	
	<?php 
		if(isset($_GET['author_name'])) :
			$curauth = get_user_by('slug', $author_name);
		else :
			$curauth = get_userdata(intval($author));
		endif;
	?>		
						 
	<div id="authorContent" class="grid_12">
		<?php			
				echo '<h2 class="page-head">'.$curauth->display_name.'</h2>'; 
		?>
		
		<?php if( $curauth->vimeo ) : ?>
		
		<div id="author-info">
			<?php if ( $curauth->vimeo ) : ?>
			<div id="vimeo">
				
					<?php 
					$vimeo = $curauth->vimeo;
					
					echo '<iframe src="http://player.vimeo.com/video/' . $vimeo . '?title=0&byline=0&portrait=0&autoplay=0"'; 
					echo ' width="684" height="385" frameborder="0"></iframe>'; ?>
					
			</div>
			<?php endif; ?>
			
			<div class="clear"></div>
			
			<ul class="contact-author">
				<?php
					$email = $curauth->user_email;
					$website = $curauth->user_url;
					$twitter = $curauth->twitter;
					$hometown = $curauth->hometown;
					$major = $curauth->major;
					$class = $curauth->user_class;
				?>
					<li class="position"><?php echo $curauth->position; ?></li>
					<li class="major"><?php echo $major; ?></li>
					<li class="hometown"><?php echo $class; echo ", "?><?php echo $hometown; ?></li>
					<li class="email"><a href="mailto:<?php echo $email ?>"><?php echo $email; ?></a></li>
					<?php if($website) { ?><li class="website"><a href="<?php echo $website; ?>"><?php echo $website; ?></a></li><?php } ?>
					<?php if($twitter) { ?><li class="twitter"><a href="<?php echo $twitter; ?>">Follow Me on Twitter</a></li><?php } ?>
			</ul>
			
			<p><?php echo $curauth->description; ?></p>
			
		<div class="clear"></div>
		</div>
		
		<?php endif; ?>
	
		<div id="author-posts">
			
			<?php while ( have_posts() ) : the_post(); ?>
			<?php global $post; ?>
			
			<div class="element">
				
				<?php if ( get_the_post_thumbnail($post->ID, 'thumbnail') ) { ?>
			<div class="thumbnail">
				<?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
			</div>
			<?php } ?>
			
			<div class="topGutter">
				<a href="<?php the_permalink(); ?>"><p class="head"><?php the_title(); ?></p>
				<p class="subhead"><?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'subhead'); ?></span></p></a>
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
		
		</div> <!-- end author posts -->
					
	</div><!-- end pageContent -->
			
<?php get_sidebar(); ?>
<?php get_footer(); ?>