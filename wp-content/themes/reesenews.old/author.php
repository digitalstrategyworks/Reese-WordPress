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
					<li class="email"><a href="mailto:<?php echo $email ?>">E-mail</a></li>
					<li class="website"><a href="<?php echo $website; ?>">Website</a></li>
					<li class="twitter"><a href="<?php echo $twitter; ?>">Twitter</a></li>
			</ul>
			
			<p><?php echo $curauth->description; ?></p>
			
		<div class="clear"></div>
		</div>
		
	
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
				
				<div class="media"><ul>	
					<?php if ( (check_DifferentTypeFacts($post->ID, 'story-photo')) || (check_DifferentTypeFacts($post->ID, 'sidebar-gallery')) ) : ?>
						<li><img src="<?php bloginfo('template_directory'); ?>/images/icon-photos.png" /></li>
					<?php endif; ?>
					
					<?php if ( (check_DifferentTypeFacts($post->ID, 'story-video')) || (check_DifferentTypeFacts($post->ID, 'sidebar-video')) ) : ?>
						<li><img src="<?php bloginfo('template_directory'); ?>/images/icon-video.png" /></li>
					<?php endif; ?>
					
					<?php if ( check_DifferentTypeFacts($post->ID, 'sidebar-audio') ) : ?>
						<li><img src="<?php bloginfo('template_directory'); ?>/images/icon-audio.png" /></li>
					<?php endif; ?>
				</ul></div>
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