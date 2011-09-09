<?php get_header(); ?>

<!-- ******************** begin scroller ******************** -->
<div id="slider">
	<div id="slider-blue"></div>
	<div id="mask-gallery">
		<ul id="gallery">
			<?php query_posts('showposts=3&category_name=slider'); ?>
			 <?php while ( have_posts() ) : the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><img src="<?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'home-featured-permalink'); ?>" /></a></li>
			 
			 <?php endwhile; ?>
			 <?php rewind_posts(); ?>
			 <?php wp_reset_query(); ?>
		</ul>
	</div>
	
	<div id="mask-excerpt">
		<ul id="excerpt">
			<?php query_posts('showposts=3&category_name=slider'); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><p class="head"><?php the_title(); ?></p><p class="subhead"><?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'subhead'); ?></p><span class="arrows">&gt;&gt;&gt;</span><span class="featured-more">FULL STORY</span></a></li>
			<?php endwhile; ?>
			<?php rewind_posts(); ?>
			<?php wp_reset_query(); ?>
		</ul>
	</div>
</div>
			
<div class="clear"></div>
		
<!-- ******************** begin content ******************** -->
		
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
			 <?php $post_num = 1; //var so we can give classes depending on li position ?> 
			 <?php query_posts('showposts=3&category_name=featured-text'); ?>
			 <?php while ( have_posts() ) : the_post(); ?>
			 <?php global $post; ?>
			
			
				<li class="<?php if($post_num==3) { echo "last"; } else { echo "normal"; } ?>"><a href="<?php the_permalink(); ?>"><div class="text-hed"><?php the_title(); ?></div>
				
				<?php if ( check_DifferentTypeFacts($post->ID, 'story-photo') || check_DifferentTypeFacts($post->ID, 'story-video') || check_DifferentTypeFacts($post->ID, 'sidebar-audio') ) { ?>
				<div class="media"><ul>	
					<?php if ( check_DifferentTypeFacts($post->ID, 'story-photo') ) : ?>
						<li><a href="<?php the_DifferentTypeFacts($post->ID, 'story-photo'); ?>" rel="lightbox"><img src="<?php bloginfo('template_directory'); ?>/images/icon-photos.png" /></a></li>
					<?php endif; ?>
					
					<?php if ( check_DifferentTypeFacts($post->ID, 'story-video') ) : ?>
						<li><a href="#video-1" rel="lightbox"><img src="<?php bloginfo('template_directory'); ?>/images/icon-video.png" /></a></li>
						
						<div id="video-1" class="hide">
							<?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'story-video'); ?>
						</div>
					<?php endif; ?>
					
					<?php if ( check_DifferentTypeFacts($post->ID, 'sidebar-audio') ) : ?>
						<li><a href="#audio-1" rel="lightbox"><img src="<?php bloginfo('template_directory'); ?>/images/icon-audio.png" /></a></li>
						
								<?php $audio_meta = check_DifferentTypeFacts($post->ID, 'sidebar-audio'); ?>
						
								<div id="audio-1" class="hide">
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
				
				</a></li>
				
			 <?php $post_num++; ?>
			 <?php endwhile; ?>
			 <?php rewind_posts(); ?>
			 <?php wp_reset_query(); ?>
			 </ul>
		</div>
			
		<!-- @@@ begin middle bar @@@ -->
		<div id="middleBar" class="grid_7">
				<div class="topGutter">
					<p class="video head">ReeseVideo</p>
				</div>
				
				<div id="homepage-video" class="element">
					<!-- Start of Brightcove Player -->

					<div style="display:none">
					
					</div>
					
					<!--
					By use of this code snippet, I agree to the Brightcove Publisher T and C 
					found at https://accounts.brightcove.com/en/terms-and-conditions/. 
					-->
					
					<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>
					
					<object id="myExperience" class="BrightcoveExperience">
					  <param name="bgcolor" value="#FFFFFF" />
					  <param name="width" value="390" />
					  <param name="height" value="340" />
					  <param name="playerID" value="640594654001" />
					  <param name="playerKey" value="AQ%2E%2E,AAAAi6TjCsk%2E,poRVZzf2QsIQrcPMfEI8p4vwr9qn6mrc" />
					  <param name="isVid" value="true" />
					  <param name="isUI" value="true" />
					  <param name="wmode" value="transparent">
					  <param name="dynamicStreaming" value="true" />
					  
					</object>
					
					<!-- 
					This script tag will cause the Brightcove Players defined above it to be created as soon
					as the line is read by the browser. If you wish to have the player instantiated only after
					the rest of the HTML is processed and the page load is complete, remove the line.
					-->
					<script type="text/javascript">brightcove.createExperiences();</script>
					
					<!-- End of Brightcove Player -->
			</div> <!-- end home video -->
			
			<?php if ( is_sidebar_active('middle-content') ) : ?>
				<?php dynamic_sidebar('middle-content'); ?>
			<?php endif; ?>
			
						
		</div><!--end middleBar -->
		
		<script type="text/javascript">
			//we want to hide this even before the page is done loading.
			$("div.navGutter").hide();
		</script>
			
<?php get_sidebar(); ?>
<?php get_footer(); ?>