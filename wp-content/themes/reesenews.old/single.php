<?php get_header(); ?>

<div id="content" class="grid_16">

	<div id="singleContent" class="grid_12">
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<!-- headline content and main image here -->
			<h2 class="page-head"><?php the_title(); ?></h2>
			<h3 class="page-subhead"><?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'subhead'); ?></h3>
			<?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'listdata'); ?> 
			
			<?php if ( check_DifferentTypeFacts($post->ID, 'story-video') ) : ?>
				<div id="videoBlock">
					<?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'story-video'); ?>
					
				</div>
			<?php endif; ?>
			
			<?php if ( check_DifferentTypeFacts($post->ID, 'story-photo') ) : ?>
				<div id="imageBlock">
					<img src="<?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'story-photo'); ?>" />
				
					<div id="screen"></div>
					<div id="image-caption"><p><?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'image-caption'); ?></p></div>
					<?php if( check_DifferentTypeFacts($post->ID, 'photo-credit') ) : ?><div class="photo-credit"><span>Photo by <?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'photo-credit'); ?></span></div> <?php endif; ?>
					
				</div>
			<?php endif; ?>
			
			<?php $coauthors = get_coauthors(); ?>
			<div id="author-meta">
				<div id="byline_info">
					<div id="byline_img">
						<ul class="abab">
							<?php for ( $i=0; $i < count($coauthors); $i+=1 ) { ?>
							<?php if( $coauthors[$i]->photo ) : ?>
								<li class="byline_img"><img src="<?php echo $coauthors[$i]->photo; ?>" /></li>
							<?php endif; ?>
							<?php } ?>
						</ul>
					</div>
						<ul>
							<li class="author"><span class="lower">By </span><?php coauthors_posts_links(); ?></li>
							<li class="job-desc"><?php echo $coauthors[0]->position;
									if( count($coauthors) > 1 ) {
										echo "s";
									}
																						?></li>
						</ul>
					<div id="byline_date"><?php the_date('M. d'); echo " "; the_time('g:i a'); ?></div>
								
					
				</div><!--end byline -->
				
				<div id="byline_icons">
					<ul>
					
					<?php $link = get_permalink($post->ID);
							  $mail = $link . "emailpopup/"
						?>
						
						<li><a href="<?php comments_link(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/icons/icon-comments.png" /></a></li>
						<?php if ( !in_category('wire') ) { ?>
						<li><img src="<?php bloginfo('template_directory'); ?>/images/icons/icon-cc.png" /></li>
						<?php } ?>
						<li><a href="<?php echo $mail; ?>" onclick="email_popup(this.href); return false;" title="E-mail" rel="nofollow"><img src="<?php bloginfo('template_directory'); ?>/images/icons/icon-mail.png" /></a></li>
						<li><img src="<?php bloginfo('template_directory'); ?>/images/icons/icon-print.png" /></li>
					</ul>
				</div>
								
				<div id="byline_options">
					<ul>
						<li><a href="<?php comments_link(); ?>"><?php comments_number('no comments', 'one comment', '% comments'); ?></a></li>
						<?php if( !in_category('wire') ) { ?>
							<li id="copy">Republish</li>
						<?php } ?>
						<li><?php if(function_exists('wp_email')) { email_link(); } ?></li>
						<li><a href="javascript:window.print()">Print</a></li>
						
					</ul>
				</div>
				
			</div><!--end author-meta -->
			
			<div class="clear"></div>
			
			<div id="leftContent" class="grid_7">
				
				
				<div id="textSizing">
					<div class="increaseFont">+</div>
					<div class="decreaseFont">-</div>
				</div>
				
				<div id="entry-content">
				
					<?php the_content(); ?>
				
				</div><!-- end entry -->	
				
				<div id="comments-area">
					<?php comments_template(); ?>
				</div>
								
			</div><!-- end leftContent -->
			
		</div><!-- end post -->
				
		<div id="rightContent" class="grid_4">
			<!-- custom fields will go here -->
			<div id="fb-like"><p>Do you like this story?</p><iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.reesenews.org&amp;layout=standard&amp;show_faces=false&amp;width=550&amp;action=like&amp;font=tahoma&amp;colorscheme=light&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:210px; height:80px;" allowTransparency="true"></iframe></div>
			<?php if ( check_DifferentTypeFacts($post->ID, 'sidebar-gallery') ) : ?>
			<div class="storyElement gallery first">
				<h3><?php the_DifferentTypeFacts($post->ID, 'sidebar-gallery-title'); ?></h3>
				<!-- photo galleries -->
					<?php $gallery_meta = check_DifferentTypeFacts($post->ID, 'sidebar-gallery');
						$gallery = "[nggallery id=".$gallery_meta."]"; ?>
					<?php $gal = $gallery;
						$gal = do_shortcode($gal);
						echo $gal;
					?>
				
			</div>
			<?php endif; ?>
				

			<?php if ( check_DifferentTypeFacts($post->ID, 'sidebar-custom') ) : ?>
			<div class="storyElement custom">	
				<h3><?php the_DifferentTypeFacts($post->ID, 'sidebar-custom-title'); ?></h3>
					<?php the_DifferentTypeFacts($post->ID, 'sidebar-custom'); ?>
			</div>
			<?php endif; ?>
			
			<!-- sidebar video -->
			<?php if ( check_DifferentTypeFacts($post->ID, 'sidebar-video') ) : ?>
			<div class="storyElement video">	
				<h3><?php the_DifferentTypeFacts($post->ID, 'sidebar-video-title'); ?></h3>
				<?php the_DifferentTypeFacts($post->ID, 'sidebar-video'); ?>
			</div>
			<?php endif; ?>
						
			<?php if ( check_DifferentTypeFacts($post->ID, 'sidebar-audio') ) : ?>
			<div class="storyElement audio">	
				<!-- sidebar audio -->
					<h3><?php the_DifferentTypeFacts($post->ID, 'sidebar-audio-title'); ?></h3>
					<?php $audio_meta = check_DifferentTypeFacts($post->ID, 'sidebar-audio'); ?>
					
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
			
			<?php if ( check_DifferentTypeFacts($post->ID, 'sources') ) : ?>
			<div class="storyElement sources">	
				<h3>Sources</h3>
				<?php the_DifferentTypeFacts($post->ID, 'sources'); ?>
			</div>
			<?php endif; ?>
				
		</div>
		
	<?php endwhile; //loop end ?>
	<?php endif; ?>

	
	</div><!-- end singleContent -->
	
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>