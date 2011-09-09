<?php

	function theme_widgets_init() {
		
		register_sidebar( array (
			'name' => 'Sidebar',
			'id' => 'sidebar',
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)  );
		
		register_sidebar ( array (
			'name' => 'Footer 1',
			'id' => 'footer-1',
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)  );
		
		register_sidebar ( array (
			'name' => 'Footer 2',
			'id' => 'footer-2',
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)  );
		
		register_sidebar ( array (
			'name' => 'Footer 3',
			'id' => 'footer-3',
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)  );
		
		register_sidebar ( array (
			'name' => 'Left Content',
			'id' => 'left-content',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => ''
		)  );
		
		register_sidebar ( array (
			'name' => 'Middle Content',
			'id' => 'middle-content',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => ''
		)  );
		
	}
	
	//set excerpt length to work more appropriately with our image dropdowns
	function new_excerpt_length($length) {
		return 25;
	}
	
	//get orange arrows instead of [...]
	function new_excerpt_more($more) {
		return '[...]';
	}
	
	function change_contact_methods ( $contactmethods ) {
		$contactmethods['twitter'] = 'Twitter';
		$contactmethods['position'] = 'Position';
		$contactmethods['photo'] = 'Photo Permalink';
		$contactmethods['hometown'] = 'Home Town';
		$contactmethods['vimeo'] = 'Vimeo Number';
		$contactmethods['user_class'] = 'Class Standing';
		$contactmethods['major'] = 'Major';
		
		unset($contactmethods['yim']);
		unset($contactmethods['aim']);
		unset($contactmethods['jabber']);
		
		return $contactmethods;
	}
	
	class u_widget extends WP_Widget {
		
		function u_widget() {
			parent::WP_Widget(false, 'U Widget');
		}
	
		function form($instance) {
			echo '<p>You cannot edit this widget</p>';
			// outputs the options form on admin
		}
	
		function update($new_instance, $old_instance) {
			return $new_instance;
		}
	
		function widget($args, $instance) {
			?>
			<div class="news element">
			
			<?php
			  	$category_id = get_cat_ID( 'U' );
				 $category_link = get_category_link( $category_id );
				 
				 query_posts('showposts=1&category_name=u-featured-home'); ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php global $post; ?>
						
				<div class="topGutter">
					<a href="<?php echo $category_link; ?>"><div class="rss_button"><span>U</span></div></a>
					
					<a href="http://www.reesenews.org/category/u/feed/" target="_blank"><img class="rss" src="<?php bloginfo('template_directory'); ?>/images/rss.png" /></a>
					
					<a href="<?php the_permalink(); ?>"><p class="head"><?php the_title(); ?></p>
					<p class="subhead"><?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'subhead'); ?></p></a>
				</div>
				<div class="imageHolder">					
					<div class="boxgrid captionfull">
						<a href="<?php the_permalink(); ?>"><img src="<?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'home-featured-permalink'); ?>" /></a>
						<a href="<?php the_permalink(); ?>"><div class="cover boxcaption">
							<?php the_excerpt(); ?>
						</div></a>		
					</div>
					
					
					
				</div>
				
				<?php endwhile; ?>
				<?php rewind_posts(); ?>
				<?php wp_reset_query(); ?>
				
				<div id="nav-1" class="navGutter">
				
					<ul>
						<?php query_posts('showposts=4&category_name=u-list-home'); ?>
						<?php while ( have_posts() ) : the_post(); ?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
						<?php rewind_posts(); ?>
						<?php wp_reset_query(); ?>
					</ul>
				</div>
				
			</div>
			<?php 
		}
	
	}
	
	class video_widget extends WP_Widget {
		
		function video_widget() {
			parent::WP_Widget(false, 'Video Widget');
		}
	
		function form($instance) {
		?>
			<p>
				<label for="<?php echo $this->get_field_id('headline'); ?>">Headline:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('headline'); ?>" name="<?php echo $this->get_field_name('headline'); ?>" value="<?php echo $instance['headline']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('subhead'); ?>">Subhead:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('subhead'); ?>" name="<?php echo $this->get_field_name('subhead'); ?>" value="<?php echo $instance['subhead']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('permalink'); ?>">Permalink:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('permalink'); ?>" name="<?php echo $this->get_field_name('permalink'); ?>" value="<?php echo $instance['permalink']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('video'); ?>">Video ID:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('video'); ?>" name="<?php echo $this->get_field_name('video'); ?>" value="<?php echo $instance['video']; ?>" />
			</p>
		<?	
		}
	
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			
			$instance['headline'] = strip_tags($new_instance['headline']);
			$instance['subhead'] = strip_tags($new_instance['subhead']);
			$instance['permalink'] = strip_tags($new_instance['permalink']);
			$instance['video'] = strip_tags($new_instance['video']);
			
			return $instance;
		}
	
		function widget($args, $instance) {
			extract( $args );
			
			$head = $instance['headline'];
			$subhead = $instance['subhead'];
			$link = $instance['permalink'];
			$video = $instance['video'];
						
		?>
			<div class="single-video element">				
				<div class="topGutter">
					<div class="alignright"><img src="<?php bloginfo('template_directory'); ?>/images/icon-video.png" /></div><a href="<?php echo $link; ?>"><p class="head"><?php echo $head; ?></p>
					<p class="subhead"><?php echo $subhead; ?></p></a>
				</div>
				<div class="videoHolder">					
					<!-- Start of Brightcove Player -->

					<div style="display:none">
					
					</div>
					
					<!--
					By use of this code snippet, I agree to the Brightcove Publisher T and C 
					found at https://accounts.brightcove.com/en/terms-and-conditions/. 
					-->
					
					<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>
					
					<object id="myExperience<?php echo $video; ?>" class="BrightcoveExperience">
					  <param name="bgcolor" value="#FFFFFF" />
					  <param name="width" value="390" />
					  <param name="height" value="219" />
					  <param name="playerID" value="637606308001" />
					  <param name="playerKey" value="AQ~~,AAAAi6TjCsk~,poRVZzf2QsLRQDClx-6avFrO-uoiYULQ" />
					  <param name="isVid" value="true" />
					  <param name="isUI" value="true" />
					  <param name="dynamicStreaming" value="true" />
					  
					  <param name="@videoPlayer" value="<?php echo $video; ?>" />
					</object>
					
					<!-- 
					This script tag will cause the Brightcove Players defined above it to be created as soon
					as the line is read by the browser. If you wish to have the player instantiated only after
					the rest of the HTML is processed and the page load is complete, remove the line.
					-->
					<script type="text/javascript">brightcove.createExperiences();</script>
					
					<!-- End of Brightcove Player -->
				</div>
		
			</div>
		<?php 
		}
	
	}
	
	class single_widget extends WP_Widget {
		
		function single_widget() {
			parent::WP_Widget(false, 'Single Story Widget');
		}
	
		function form($instance) {
		?>
		
			<p>
				<label for="<?php echo $this->get_field_id('headline'); ?>">Headline:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('headline'); ?>" name="<?php echo $this->get_field_name('headline'); ?>" value="<?php echo $instance['headline']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('subhead'); ?>">Subhead:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('subhead'); ?>" name="<?php echo $this->get_field_name('subhead'); ?>" value="<?php echo $instance['subhead']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('permalink'); ?>">Permalink:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('permalink'); ?>" name="<?php echo $this->get_field_name('permalink'); ?>" value="<?php echo $instance['permalink']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('image'); ?>">Image:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" value="<?php echo $instance['image']; ?>" />
			</p>
		<?	
		}
	
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			
			$instance['headline'] = strip_tags($new_instance['headline']);
			$instance['subhead'] = strip_tags($new_instance['subhead']);
			$instance['permalink'] = strip_tags($new_instance['permalink']);
			$instance['image'] = strip_tags($new_instance['image']);
			
			return $instance;
		}
	
		function widget($args, $instance) {
			extract( $args );
			
			$head = $instance['headline'];
			$subhead = $instance['subhead'];
			$link = $instance['permalink'];
			$img = $instance['image'];
						
		?>
			<div class="news element">				
				<div class="topGutter">
					<a href="<?php echo $link; ?>"><p class="head"><?php echo $head; ?></p>
					<p class="subhead"><?php echo $subhead; ?></p></a>
				</div>
				<div class="imageHolder">					
					<a href="<?php echo $link; ?>"><img src="<?php echo $img; ?>" /></a>
				</div>
			</div>
		<?php 
		}
	
	}
	
	class town_widget extends WP_Widget {
		
		function town_widget() {
			parent::WP_Widget(false, 'Town Widget');
		}
	
		function form($instance) {
			echo '<p>You cannot edit this widget</p>';
			// outputs the options form on admin
		}
	
		function update($new_instance, $old_instance) {
			return $new_instance;
		}
	
		function widget($args, $instance) {
		
			?>
			<div class="news element">
						
			<?php
			  	$category_id = get_cat_ID( 'Town' );
				 $category_link = get_category_link( $category_id );
				 
				 query_posts('showposts=1&category_name=town-featured-home'); ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php global $post; ?>
						
				<div class="topGutter">
					<a href="<?php echo $category_link; ?>"><div class="rss_button"><span>TOWN</span></div></a>
					
					<a href="http://www.reesenews.org/category/town/feed/" target="_blank"><img class="rss" src="<?php bloginfo('template_directory'); ?>/images/rss.png" /></a>
				
					<a href="<?php the_permalink(); ?>"><p class="head"><?php the_title(); ?></p>
					<p class="subhead"><?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'subhead'); ?></p></a>
				</div>
				<div class="imageHolder">					
					<div class="boxgrid captionfull">
						<a href="<?php the_permalink(); ?>"><img src="<?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'home-featured-permalink'); ?>" /></a>
						<a href="<?php the_permalink(); ?>"><div class="cover boxcaption">
							<?php the_excerpt(); ?>
						</div></a>		
					</div>
					
					
					
				</div>
				
				<?php endwhile; ?>
				<?php rewind_posts(); ?>
				<?php wp_reset_query(); ?>
				
				<div id="nav-5" class="navGutter">
				
					<ul>
						<?php query_posts('showposts=4&category_name=town-list-home'); ?>
						<?php while ( have_posts() ) : the_post(); ?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
						<?php rewind_posts(); ?>
						<?php wp_reset_query(); ?>
					</ul>
				</div>
				
			</div>
			<?php 
		}
	
	}
	
	class nc_widget extends WP_Widget {
		
		function nc_widget() {
			parent::WP_Widget(false, 'NC Widget');
		}
	
		function form($instance) {
			echo '<p>You cannot edit this widget</p>';
			// outputs the options form on admin
		}
	
		function update($new_instance, $old_instance) {
			return $new_instance;
		}
	
		function widget($args, $instance) {
		
			?>
			<div class="news element">
			
			<?php
			  	$category_id = get_cat_ID( 'NC' );
				 $category_link = get_category_link( $category_id );
				 
				 query_posts('showposts=1&category_name=nc-featured-home'); ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php global $post; ?>
						
				<div class="topGutter">
					<a href="<?php echo $category_link; ?>"><div class="rss_button"><span>NC</span></div></a>
					
					<a href="http://www.reesenews.org/category/nc/feed/" target="_blank"><img class="rss" src="<?php bloginfo('template_directory'); ?>/images/rss.png" /></a>
					
					<a href="<?php the_permalink(); ?>"><p class="head"><?php the_title(); ?></p>
					<p class="subhead"><?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'subhead'); ?></p></a>
				</div>
				<div class="imageHolder">					
					<div class="boxgrid captionfull">
						<a href="<?php the_permalink(); ?>"><img src="<?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'home-featured-permalink'); ?>" /></a>
						<a href="<?php the_permalink(); ?>"><div class="cover boxcaption">
							<?php the_excerpt(); ?>
						</div></a>		
					</div>
					
					
					
				</div>
				
				<?php endwhile; ?>
				<?php rewind_posts(); ?>
				<?php wp_reset_query(); ?>
				
				<div id="nav-9" class="navGutter">
				
					<ul>
						<?php query_posts('showposts=4&category_name=nc-list-home'); ?>
						<?php while ( have_posts() ) : the_post(); ?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
						<?php rewind_posts(); ?>
						<?php wp_reset_query(); ?>
					</ul>
				</div>
				
			</div>
			<?php 
		}
	
	}
	
	class biz_widget extends WP_Widget {
		
		function biz_widget() {
			parent::WP_Widget(false, 'Biz Widget');
		}
	
		function form($instance) {
			echo '<p>You cannot edit this widget</p>';
			// outputs the options form on admin
		}
	
		function update($new_instance, $old_instance) {
			return $new_instance;
		}
	
		function widget($args, $instance) {
		
			?>
			<div class="news element">
			
			<?php
			  	$category_id = get_cat_ID( 'Biz' );
				 $category_link = get_category_link( $category_id );
				 
				 query_posts('showposts=1&category_name=biz-featured-home'); ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php global $post; ?>
						
				<div class="topGutter">
					<a href="<?php echo $category_link; ?>"><div class="rss_button"><span>BIZ</span></div></a>
					
					<a href="http://www.reesenews.org/category/biz/feed/" target="_blank"><img class="rss" src="<?php bloginfo('template_directory'); ?>/images/rss.png" /></a>
					
					<a href="<?php the_permalink(); ?>"><p class="head"><?php the_title(); ?></p>
					<p class="subhead"><?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'subhead'); ?></p></a>
				</div>
				<div class="imageHolder">					
					<div class="boxgrid captionfull">
						<a href="<?php the_permalink(); ?>"><img src="<?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'home-featured-permalink'); ?>" /></a>
						<a href="<?php the_permalink(); ?>"><div class="cover boxcaption">
							<?php the_excerpt(); ?>
						</div></a>		
					</div>
					
					
					
				</div>
				
				<?php endwhile; ?>
				<?php rewind_posts(); ?>
				<?php wp_reset_query(); ?>
				
				<div id="nav-2" class="navGutter">
				
					<ul>
						<?php query_posts('showposts=4&category_name=biz-list-home'); ?>
						<?php while ( have_posts() ) : the_post(); ?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
						<?php rewind_posts(); ?>
						<?php wp_reset_query(); ?>
					</ul>
				</div>
				
			</div>
			<?php 
		}
	
	}
	
	class sport_widget extends WP_Widget {
		
		function sport_widget() {
			parent::WP_Widget(false, 'Sport Widget');
		}
	
		function form($instance) {
			echo '<p>You cannot edit this widget</p>';
			// outputs the options form on admin
		}
	
		function update($new_instance, $old_instance) {
			return $new_instance;
		}
	
		function widget($args, $instance) {
		
			?>
			<div class="news element">
			
			<?php
			  	$category_id = get_cat_ID( 'Sport' );
				 $category_link = get_category_link( $category_id );
				 
				 query_posts('showposts=1&category_name=sport-featured-home'); ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php global $post; ?>
						
				<div class="topGutter">
					<a href="<?php echo $category_link; ?>"><div class="rss_button"><span>SPORT</span></div></a>
					
					<a href="http://www.reesenews.org/category/sport/feed/" target="_blank"><img class="rss" src="<?php bloginfo('template_directory'); ?>/images/rss.png" /></a>
					
					<a href="<?php the_permalink(); ?>"><p class="head"><?php the_title(); ?></p>
					<p class="subhead"><?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'subhead'); ?></p></a>
				</div>
				<div class="imageHolder">					
					<div class="boxgrid captionfull">
						<a href="<?php the_permalink(); ?>"><img src="<?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'home-featured-permalink'); ?>" /></a>
						<a href="<?php the_permalink(); ?>"><div class="cover boxcaption">
							<?php the_excerpt(); ?>
						</div></a>		
					</div>
					
					
					
				</div>
				
				<?php endwhile; ?>
				<?php rewind_posts(); ?>
				<?php wp_reset_query(); ?>
				
				<div id="nav-6" class="navGutter">
				
					<ul>
						<?php query_posts('showposts=4&category_name=sport-list-home'); ?>
						<?php while ( have_posts() ) : the_post(); ?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
						<?php rewind_posts(); ?>
						<?php wp_reset_query(); ?>
					</ul>
				</div>
				
			</div>
			<?php 
		}
	
	}
	
	class chill_widget extends WP_Widget {
		
		function chill_widget() {
			parent::WP_Widget(false, 'CHill Widget');
		}
	
		function form($instance) {
			echo '<p>You cannot edit this widget</p>';
			// outputs the options form on admin
		}
	
		function update($new_instance, $old_instance) {
			return $new_instance;
		}
	
		function widget($args, $instance) {
		
			?>
			<div class="news element">
			
			<?php
			  	$category_id = get_cat_ID( 'chill' );
				$category_link = get_category_link( $category_id );
				 
				 query_posts('showposts=1&category_name=chill-featured-home'); ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php global $post; ?>
						
				<div class="topGutter">
					<a href="<?php echo $category_link; ?>"><div class="rss_button"><span>CHILL</span></div></a>
					
					<a href="http://www.reesenews.org/category/chill/feed/" target="_blank"><img class="rss" src="<?php bloginfo('template_directory'); ?>/images/rss.png" /></a>
					
					<a href="<?php the_permalink(); ?>"><p class="head"><?php the_title(); ?></p>
					<p class="subhead"><?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'subhead'); ?></p></a>
				</div>
				<div class="imageHolder">					
					<div class="boxgrid captionfull">
						<a href="<?php the_permalink(); ?>"><img src="<?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'home-featured-permalink'); ?>" /></a>
						<a href="<?php the_permalink(); ?>"><div class="cover boxcaption">
							<?php the_excerpt(); ?>
						</div></a>		
					</div>
					
					
					
				</div>
				<?php endwhile; ?>
				<?php rewind_posts(); ?>
				<?php wp_reset_query(); ?>
				
				<div id="nav-3" class="navGutter">
				
					<ul>
						<?php query_posts('showposts=4&category_name=chill-list-home'); ?>
						<?php while ( have_posts() ) : the_post(); ?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
						<?php rewind_posts(); ?>
						<?php wp_reset_query(); ?>
					</ul>
				</div>
				
			</div>
			<?php 
		}
	
	} //end chill widget
	
	class med_widget extends WP_Widget {
		
		function med_widget() {
			parent::WP_Widget(false, 'Med Widget');
		}
	
		function form($instance) {
			echo '<p>You cannot edit this widget</p>';
			// outputs the options form on admin
		}
	
		function update($new_instance, $old_instance) {
			return $new_instance;
		}
	
		function widget($args, $instance) {
		
			?>
			<div class="news element">
			
			<?php
			  	$category_id = get_cat_ID( 'med' );
				$category_link = get_category_link( $category_id );
				 
				 query_posts('showposts=1&category_name=med-featured-home'); ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php global $post; ?>
						
				<div class="topGutter">
					<a href="<?php echo $category_link; ?>"><div class="rss_button"><span>MED</span></div></a>
					
					<a href="http://www.reesenews.org/category/med/feed/" target="_blank"><img class="rss" src="<?php bloginfo('template_directory'); ?>/images/rss.png" /></a>
					
					<a href="<?php the_permalink(); ?>"><p class="head"><?php the_title(); ?></p>
					<p class="subhead"><?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'subhead'); ?></p></a>
				</div>
				<div class="imageHolder">					
					<div class="boxgrid captionfull">
						<a href="<?php the_permalink(); ?>"><img src="<?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'home-featured-permalink'); ?>" /></a>
						<a href="<?php the_permalink(); ?>"><div class="cover boxcaption">
							<?php the_excerpt(); ?>
						</div></a>		
					</div>
					
					
					
				</div>
				<?php endwhile; ?>
				<?php rewind_posts(); ?>
				<?php wp_reset_query(); ?>
				
				<div id="nav-4" class="navGutter">
				
					<ul>
						<?php query_posts('showposts=4&category_name=med-list-home'); ?>
						<?php while ( have_posts() ) : the_post(); ?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
						<?php rewind_posts(); ?>
						<?php wp_reset_query(); ?>
					</ul>
				</div>
				
			</div>
			<?php 
		}
	
	}
	
	class talk_widget extends WP_Widget {
		
		function talk_widget() {
			parent::WP_Widget(false, 'Talk Widget');
		}
	
		function form($instance) {
			echo '<p>You cannot edit this widget</p>';
			// outputs the options form on admin
		}
	
		function update($new_instance, $old_instance) {
			return $new_instance;
		}
	
		function widget($args, $instance) {
		
			?>
			<div class="news element">
			
			<?php
			  	$category_id = get_cat_ID( 'talk' );
				$category_link = get_category_link( $category_id );
				 
				 query_posts('showposts=1&category_name=talk-featured-home'); ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php global $post; ?>
						
				<div class="topGutter">
					<a href="<?php echo $category_link; ?>"><div class="rss_button"><span>TALK</span></div></a>
					
					<a href="http://www.reesenews.org/category/talk/feed/" target="_blank"><img class="rss" src="<?php bloginfo('template_directory'); ?>/images/rss.png" /></a>
					
					<a href="<?php the_permalink(); ?>"><p class="head"><?php the_title(); ?></p>
					<p class="subhead"><?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'subhead'); ?></p></a>
				</div>
				<div class="imageHolder">					
					<div class="boxgrid captionfull">
						<a href="<?php the_permalink(); ?>"><img src="<?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'home-featured-permalink'); ?>" /></a>
						<a href="<?php the_permalink(); ?>"><div class="cover boxcaption">
							<?php the_excerpt(); ?>
						</div></a>
					</div>

					
					
				</div>
				<?php endwhile; ?>
				<?php rewind_posts(); ?>
				<?php wp_reset_query(); ?>
				
				<div id="nav-7" class="navGutter">
				
					<ul>
						<?php query_posts('showposts=4&category_name=talk-list-home'); ?>
						<?php while ( have_posts() ) : the_post(); ?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
						<?php rewind_posts(); ?>
						<?php wp_reset_query(); ?>
					</ul>
				</div>
				
			</div>
			<?php 
		}
	
	}
	
	class vote_widget extends WP_Widget {
		
		function vote_widget() {
			parent::WP_Widget(false, 'Vote Widget');
		}
	
		function form($instance) {
			echo '<p>You cannot edit this widget</p>';
			// outputs the options form on admin
		}
	
		function update($new_instance, $old_instance) {
			return $new_instance;
		}
	
		function widget($args, $instance) {
		
			?>
			<div class="news element">
			
			<?php
			  	$category_id = get_cat_ID( 'vote' );
				$category_link = get_category_link( $category_id );
				 
				 query_posts('showposts=1&category_name=vote-featured-home'); ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php global $post; ?>
						
				<div class="topGutter">
					<a href="<?php echo $category_link; ?>"><div class="rss_button"><span>VOTE</span></div></a>
					
					<a href="http://www.reesenews.org/category/vote/feed/" target="_blank"><img class="rss" src="<?php bloginfo('template_directory'); ?>/images/rss.png" /></a>
					
					<a href="<?php the_permalink(); ?>"><p class="head"><?php the_title(); ?></p>
					<p class="subhead"><?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'subhead'); ?></p></a>
				</div>
				<div class="imageHolder">					
					<div class="boxgrid captionfull">
						<a href="<?php the_permalink(); ?>"><img src="<?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'home-featured-permalink'); ?>" /></a>
						<a href="<?php the_permalink(); ?>"><div class="cover boxcaption">
							<?php the_excerpt(); ?>
						</div></a>
					</div>

					
				</div>
				<?php endwhile; ?>
				<?php rewind_posts(); ?>
				<?php wp_reset_query(); ?>
				
				<div id="nav-8" class="navGutter">
				
					<ul>
						<?php query_posts('showposts=4&category_name=vote-list-home'); ?>
						<?php while ( have_posts() ) : the_post(); ?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
						<?php rewind_posts(); ?>
						<?php wp_reset_query(); ?>
					</ul>
				</div>
				
			</div>
			<?php 
		}
	
	}
		
	class text_story_widget extends WP_Widget {
		
		function text_story_widget() {
			parent::WP_Widget(false, 'Text Story Widget');
		}
	
		function form($instance) {
		?>
			<h3 style="background-color:#ccc; border-radius: 5px; padding: 5px;">Entry 1</h4>
			
			<p>
				<label for="<?php echo $this->get_field_id('category_1'); ?>">Category:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('category_1'); ?>" name="<?php echo $this->get_field_name('category_1'); ?>" value="<?php echo $instance['category_1']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('headline_1'); ?>">Headline:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('headline_1'); ?>" name="<?php echo $this->get_field_name('headline_1'); ?>" value="<?php echo $instance['headline_1']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('permalink_1'); ?>">Permalink:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('permalink_1'); ?>" name="<?php echo $this->get_field_name('permalink_1'); ?>" value="<?php echo $instance['permalink_1']; ?>" />
			</p>
			
			<h3 style="background-color:#ccc; border-radius: 5px; padding: 5px;">Entry 2</h4>
			
			<p>
				<label for="<?php echo $this->get_field_id('category_2'); ?>">Category:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('category_2'); ?>" name="<?php echo $this->get_field_name('category_2'); ?>" value="<?php echo $instance['category_2']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('headline_2'); ?>">Headline:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('headline_2'); ?>" name="<?php echo $this->get_field_name('headline_2'); ?>" value="<?php echo $instance['headline_2']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('permalink_2'); ?>">Permalink:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('permalink_2'); ?>" name="<?php echo $this->get_field_name('permalink_2'); ?>" value="<?php echo $instance['permalink_2']; ?>" />
			</p>
			
			<h3 style="background-color:#ccc; border-radius: 5px; padding: 5px;">Entry 3</h4>
			
			<p>
				<label for="<?php echo $this->get_field_id('category_3'); ?>">Category:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('category_3'); ?>" name="<?php echo $this->get_field_name('category_3'); ?>" value="<?php echo $instance['category_3']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('headline_3'); ?>">Headline:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('headline_3'); ?>" name="<?php echo $this->get_field_name('headline_3'); ?>" value="<?php echo $instance['headline_3']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('permalink_3'); ?>">Permalink:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('permalink_3'); ?>" name="<?php echo $this->get_field_name('permalink_3'); ?>" value="<?php echo $instance['permalink_3']; ?>" />
			</p>
		<?	
		}
	
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			
			$instance['category_1'] = strip_tags($new_instance['category_1']);
			$instance['headline_1'] = strip_tags($new_instance['headline_1']);
			$instance['permalink_1'] = strip_tags($new_instance['permalink_1']);
			
			$instance['category_2'] = strip_tags($new_instance['category_2']);
			$instance['headline_2'] = strip_tags($new_instance['headline_2']);
			$instance['permalink_2'] = strip_tags($new_instance['permalink_2']);
			
			$instance['category_3'] = strip_tags($new_instance['category_3']);
			$instance['headline_3'] = strip_tags($new_instance['headline_3']);
			$instance['permalink_3'] = strip_tags($new_instance['permalink_3']);
			
			return $instance;
			
			return $new_instance;
		}
	
		function widget($args, $instance) {
			extract( $args );
			
			for ( $j = 1; $j < 4; $j+=1 ) {
				$category[$j] = $instance['category_' . $j . ''];
				$headline[$j] = $instance['headline_' . $j . ''];
				$permalink[$j] = $instance['permalink_' . $j . ''];
			}
			
			echo '<div class="text-stories">';
											
			echo '<ul>';
			
			for ( $b = 1; $b < count($category)+1; $b+=1 ) {
				if ( $category[$b] ) {
					echo '<li>';
					echo '<div class="post-' . $b . '">';
				}
				
				if ( $category[$b] ) {
					
					echo '<h5>' . $category[$b] . '</h5>';
				}
				
				if ( $category[$b] ) {
					echo '<a href="'. $permalink[$b] . '"><p>' . $headline[$b] . '</p></a></div></li>';
				}
			}
			
			// end div
			echo '</ul>';
			echo '</div>';
			
		}
	
	}
	
	class quote_widget extends WP_Widget {
		
		function quote_widget() {
			parent::WP_Widget(false, 'Pull Quote');
		}
	
		function form($instance) {
		?>
			<p>
				<label for="<?php echo $this->get_field_id('quote'); ?>">Quote:</label>
				<textarea rows="5" cols="25" id="<?php echo $this->get_field_id('quote'); ?>" name="<?php echo $this->get_field_name('quote'); ?>"><?php echo $instance['quote']; ?></textarea>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('name'); ?>">Name:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" value="<?php echo $instance['name']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('source'); ?>">Source:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('source'); ?>" name="<?php echo $this->get_field_name('source'); ?>" value="<?php echo $instance['source']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('name'); ?>">Image:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" value="<?php echo $instance['image']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('permalink'); ?>">Permalink:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('permalink'); ?>" name="<?php echo $this->get_field_name('permalink'); ?>" value="<?php echo $instance['permalink']; ?>" />
			</p>
		<?	
		}
	
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			
			$instance['quote'] = strip_tags($new_instance['quote']);
			$instance['name'] = strip_tags($new_instance['name']);
			$instance['source'] = strip_tags($new_instance['source']);
			$instance['image'] = strip_tags($new_instance['image']);
			$instance['permalink'] = strip_tags($new_instance['permalink']);
			
			return $instance;
		}
	
		function widget($args, $instance) {
			extract( $args );
			
			$quote = $instance['quote'];
			$name = $instance['name'];
			$source = $instance['source'];
			$img = $instance['image'];
			$link = $instance['permalink'];
			
			//div class quote widget
			echo '<a href="' . $link . '">';
			echo '<div class="quote">';
			
			if ($quote) {
				echo '<p>' . $quote . '</p>';
			}
			
			echo '<div class="quote-source-area">';
			
			if ($img) {
				echo '<img height="80" width="80" src="' . $img . '" />';
			}
			
			if ($name) {
				echo '<p class="quote-name">' . $name . '</p>';
			}
			
			if ($source) {
				echo '<p class="source-line">' . $source . '</p>';
			}
			
			echo '</div><div class="clear"></div>';
			
			// end div
			echo '</div></a>';
		}
	
	}
	
	class blogs_widget extends WP_Widget {
		
		function blogs_widget() {
			parent::WP_Widget(false, 'Blog Posts');
		}
	
		function form($instance) {
		?>
			<h3 style="background-color:#ccc; border-radius: 5px; padding: 5px;">Entry 1</h4>
			<p>
				<label for="<?php echo $this->get_field_id('headline_1'); ?>">Entry Headline:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('headline_1'); ?>" name="<?php echo $this->get_field_name('headline_1'); ?>" value="<?php echo $instance['headline_1']; ?>" />
			</p>			
			
			<p>
				<label for="<?php echo $this->get_field_id('title_1'); ?>">Blog Name:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('title_1'); ?>" name="<?php echo $this->get_field_name('title_1'); ?>" value="<?php echo $instance['title_1']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('description_1'); ?>">Entry Description:</label>
				<textarea rows="5" cols="24" id="<?php echo $this->get_field_id('description_1'); ?>" name="<?php echo $this->get_field_name('description_1'); ?>"><?php echo $instance['description_1']; ?></textarea>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('image_1'); ?>">Image:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('image_1'); ?>" name="<?php echo $this->get_field_name('image_1'); ?>" value="<?php echo $instance['image_1']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('permalink_1'); ?>">Permalink:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('permalink_1'); ?>" name="<?php echo $this->get_field_name('permalink_1'); ?>" value="<?php echo $instance['permalink_1']; ?>" />
			</p>
			
			<h3 style="background-color:#ccc; border-radius: 5px; padding: 5px;">Entry 2</h4>
			<p>
				<label for="<?php echo $this->get_field_id('headline_2'); ?>">Entry Headline:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('headline_2'); ?>" name="<?php echo $this->get_field_name('headline_2'); ?>" value="<?php echo $instance['headline_2']; ?>" />
			</p>			
			
			<p>
				<label for="<?php echo $this->get_field_id('title_2'); ?>">Blog Name:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('title_2'); ?>" name="<?php echo $this->get_field_name('title_2'); ?>" value="<?php echo $instance['title_2']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('description_2'); ?>">Entry Description:</label>
				<textarea rows="5" cols="24" id="<?php echo $this->get_field_id('description_2'); ?>" name="<?php echo $this->get_field_name('description_2'); ?>"><?php echo $instance['description_2']; ?></textarea>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('image_2'); ?>">Image:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('image_2'); ?>" name="<?php echo $this->get_field_name('image_2'); ?>" value="<?php echo $instance['image_2']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('permalink_2'); ?>">Permalink:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('permalink_2'); ?>" name="<?php echo $this->get_field_name('permalink_2'); ?>" value="<?php echo $instance['permalink_2']; ?>" />
			</p>
			
			<h3 style="background-color:#ccc; border-radius: 5px; padding: 5px;">Entry 3</h4>
			<p>
				<label for="<?php echo $this->get_field_id('headline_3'); ?>">Entry Headline:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('headline_3'); ?>" name="<?php echo $this->get_field_name('headline_3'); ?>" value="<?php echo $instance['headline_3']; ?>" />
			</p>			
			
			<p>
				<label for="<?php echo $this->get_field_id('title_3'); ?>">Blog Name:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('title_3'); ?>" name="<?php echo $this->get_field_name('title_3'); ?>" value="<?php echo $instance['title_3']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('description_3'); ?>">Entry Description:</label>
				<textarea rows="5" cols="24" id="<?php echo $this->get_field_id('description_3'); ?>" name="<?php echo $this->get_field_name('description_3'); ?>"><?php echo $instance['description_3']; ?></textarea>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('image_3'); ?>">Image:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('image_3'); ?>" name="<?php echo $this->get_field_name('image_3'); ?>" value="<?php echo $instance['image_3']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('permalink_3'); ?>">Permalink:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('permalink_3'); ?>" name="<?php echo $this->get_field_name('permalink_3'); ?>" value="<?php echo $instance['permalink_3']; ?>" />
			</p>
			
			<h3 style="background-color:#ccc; border-radius: 5px; padding: 5px;">Entry 4</h4>
			<p>
				<label for="<?php echo $this->get_field_id('headline_4'); ?>">Entry Headline:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('headline_4'); ?>" name="<?php echo $this->get_field_name('headline_4'); ?>" value="<?php echo $instance['headline_4']; ?>" />
			</p>			
			
			<p>
				<label for="<?php echo $this->get_field_id('title_4'); ?>">Blog Name:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('title_4'); ?>" name="<?php echo $this->get_field_name('title_4'); ?>" value="<?php echo $instance['title_4']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('description_4'); ?>">Entry Description:</label>
				<textarea rows="5" cols="24" id="<?php echo $this->get_field_id('description_4'); ?>" name="<?php echo $this->get_field_name('description_4'); ?>"><?php echo $instance['description_4']; ?></textarea>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('image_4'); ?>">Image:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('image_4'); ?>" name="<?php echo $this->get_field_name('image_4'); ?>" value="<?php echo $instance['image_4']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('permalink_4'); ?>">Permalink:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('permalink_4'); ?>" name="<?php echo $this->get_field_name('permalink_4'); ?>" value="<?php echo $instance['permalink_4']; ?>" />
			</p>
			
			<h3 style="background-color:#ccc; border-radius: 5px; padding: 5px;">Entry 5</h4>
			<p>
				<label for="<?php echo $this->get_field_id('headline_5'); ?>">Entry Headline:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('headline_5'); ?>" name="<?php echo $this->get_field_name('headline_5'); ?>" value="<?php echo $instance['headline_5']; ?>" />
			</p>			
			
			<p>
				<label for="<?php echo $this->get_field_id('title_5'); ?>">Blog Name:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('title_5'); ?>" name="<?php echo $this->get_field_name('title_5'); ?>" value="<?php echo $instance['title_5']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('description_5'); ?>">Entry Description:</label>
				<textarea rows="5" cols="24" id="<?php echo $this->get_field_id('description_5'); ?>" name="<?php echo $this->get_field_name('description_5'); ?>"><?php echo $instance['description_5']; ?></textarea>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('image_5'); ?>">Image:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('image_5'); ?>" name="<?php echo $this->get_field_name('image_5'); ?>" value="<?php echo $instance['image_5']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('permalink_5'); ?>">Permalink:</label>
				<input type="text" class="heading form-input-tip" id="<?php echo $this->get_field_id('permalink_5'); ?>" name="<?php echo $this->get_field_name('permalink_5'); ?>" value="<?php echo $instance['permalink_5']; ?>" />
			</p>
		<?	
		}
	
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			
			$instance['headline_1'] = strip_tags($new_instance['headline_1']);
			$instance['title_1'] = strip_tags($new_instance['title_1']);
			$instance['description_1'] = strip_tags($new_instance['description_1']);
			$instance['image_1'] = strip_tags($new_instance['image_1']);
			$instance['permalink_1'] = strip_tags($new_instance['permalink_1']);
			
			$instance['headline_2'] = strip_tags($new_instance['headline_2']);
			$instance['title_2'] = strip_tags($new_instance['title_2']);
			$instance['description_2'] = strip_tags($new_instance['description_2']);
			$instance['image_2'] = strip_tags($new_instance['image_2']);
			$instance['permalink_2'] = strip_tags($new_instance['permalink_2']);
			
			$instance['headline_3'] = strip_tags($new_instance['headline_3']);
			$instance['title_3'] = strip_tags($new_instance['title_3']);
			$instance['description_3'] = strip_tags($new_instance['description_3']);
			$instance['image_3'] = strip_tags($new_instance['image_3']);
			$instance['permalink_3'] = strip_tags($new_instance['permalink_3']);
			
			$instance['headline_4'] = strip_tags($new_instance['headline_4']);
			$instance['title_4'] = strip_tags($new_instance['title_4']);
			$instance['description_4'] = strip_tags($new_instance['description_4']);
			$instance['image_4'] = strip_tags($new_instance['image_4']);
			$instance['permalink_4'] = strip_tags($new_instance['permalink_4']);
			
			$instance['headline_5'] = strip_tags($new_instance['headline_5']);
			$instance['title_5'] = strip_tags($new_instance['title_5']);
			$instance['description_5'] = strip_tags($new_instance['description_5']);
			$instance['image_5'] = strip_tags($new_instance['image_5']);
			$instance['permalink_5'] = strip_tags($new_instance['permalink_5']);
			
			return $instance;
		}
	
		function widget($args, $instance) {
			extract( $args );
			
			for ( $i = 1; $i < 6; $i+=1 ) {
				$headline[$i] = $instance['headline_' . $i . ''];
				$title[$i] = $instance['title_' . $i . ''];
				$description[$i] = $instance['description_' . $i . ''];
				$img[$i] = $instance['image_' . $i . ''];
				$link[$i] = $instance['permalink_' . $i . ''];
			}
			
			//div class quote widget
			echo '<div class="blogs">';
			
			
			$category_id = get_cat_ID('Blogs');
			$category_link = get_category_link($category_id);
								
			echo '<h3><span class="curly">&#123;</span><a href="#"> reeseblogs </a><span class="curly">&#125;</span></h3>';
			echo '<ul>';
			
			for ( $a = 1; $a < count($headline)+1; $a+=1 ) {
				if ( $headline[$a] ) {
					echo '<div class="blog-area">';
					echo '<a href="'. $link[$a] . '"><li>';
					echo '<img height="80" width="80" src="' . $img[$a] . '" />';
				}
				
				if ( $headline[$a] ) {
					
					echo '<h5>' . $headline[$a] . '</h5>';
				}
				
				if ( $title[$a] ) {
					echo '<p><span class="blog-title">' . $title[$a] . '</span>' . ' &#124; ';
				}
				
				if ( $description[$a] ) {
					echo '<span>' . $description[$a] . '</span></p>';
				}
				
				if ( $headline[$a] ) {
					echo '</li></a></div>';
				}
			}
			
			// end div
			echo '</ul>';
			echo '</div>';
		}
	
	}
	
	function get_category_header() {
		//decides what will appear in the header
	
		if ( is_author() ) {
			$category_name = "news";
		} elseif ( is_home() ) {
			$category_name = "news";
		
		} elseif ( is_category() ) {
			$category_name = single_cat_title('', false);
			$category_name = strtolower($category_name);
			
		} elseif ( is_page() ) {
			$category_name = "news";
		
		} elseif ( is_single() ) {
			//set default
			$category_name = 'news';
			
			if( in_category('wire') ) {
				$category_name = 'wire';
				return $category_name;
			}
			
			if ( in_category('med') ) {
				if( ( in_category('med-featured-category') ) || ( in_category('med-featured-home') ) ){
					$category_name = 'med';
					return $category_name;
				}
				
				$category_name = 'med';
			}
			
			if ( in_category('u') ) {
				if( ( in_category('u-featured-category') ) || ( in_category('u-featured-home') ) ){
					$category_name = 'u';
					return $category_name;
				}
				$category_name = 'u';
			}
			
			if ( in_category('biz') ) {
				if( ( in_category('biz-featured-category') ) || ( in_category('biz-featured-home') ) ){
					$category_name = 'biz';
					return $category_name;
				}
				$category_name = 'biz';
			}
			
			if ( in_category('chill') ) {
				if( ( in_category('chill-featured-category') ) || ( in_category('chill-featured-home') ) ) {
					$category_name = 'chill';
					return $category_name;
				}
				$category_name = 'chill';
			}
			
			if ( in_category('sport') ) {
				if( ( in_category('sport-featured-category') ) || ( in_category('sport-featured-home') ) ){
					$category_name = 'sport';
					return $category_name;
				}
				$category_name = 'sport';
			}
			
			if ( in_category('talk') ) {
				if( ( in_category('talk-featured-category') ) || ( in_category('talk-featured-home') ) ){
					$category_name = 'talk';
					return $category_name;
				}
				$category_name = 'talk';
			}
			
			if ( in_category('town') ) {
				if( ( in_category('town-featured-category') ) || ( in_category('town-featured-home') ) ){
					$category_name = 'town';
					return $category_name;
				}
				$category_name = 'town';
			}
		
		} else {
			$category_name = "news";
		}
		
		return $category_name;
	}
	
	function register_custom_menu() {
		register_nav_menu('reese_menu', __('Top Menu'));
	}
	
	/**
	 * Add to extended_valid_elements for TinyMCE
	 *
	 * @param $init assoc. array of TinyMCE options
	 * @return $init the changed assoc. array
	 */
	function my_change_mce_options( $init ) {
		// Command separated string of extended elements
		$ext = 'iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]';
	
		// Add to extended_valid_elements if it alreay exists
		if ( isset( $init['extended_valid_elements'] ) ) {
			$init['extended_valid_elements'] .= ',' . $ext;
		} else {
			$init['extended_valid_elements'] = $ext;
		}
	
		// Super important: return $init!
		return $init;
	}
	
	function add_swf_support($mimes) {
		$mimes['swf'] = 'application/x-shockwave-flash';
		return $mimes;
	}
	
	add_filter('upload_mimes','add_swf_support');
	add_filter('tiny_mce_before_init', 'my_change_mce_options');
	add_filter('user_contactmethods', 'change_contact_methods', 10, 1);
	add_filter('excerpt_length', 'new_excerpt_length');
	add_filter('excerpt_more', 'new_excerpt_more');
	
	register_widget('chill_widget');
	register_widget('sport_widget');
	register_widget('biz_widget');
	register_widget('u_widget');
	register_widget('video_widget');
	register_widget('single_widget');
	register_widget('town_widget');
	register_widget('med_widget');
	register_widget('talk_widget');
	register_widget('nc_widget');
	register_widget('vote_widget');
	register_widget('quote_widget');
	register_widget('blogs_widget');
	register_widget('text_story_widget');
	
	// Check for static widgets in widget-ready areas
	function is_sidebar_active( $index ){
		global $wp_registered_sidebars;
	 
		$widgetcolums = wp_get_sidebars_widgets();
	   
		if ($widgetcolums[$index]) return true;
	 
		return false;
	} // end is_sidebar_active
	
	add_theme_support('post-thumbnails');
	add_theme_support('post-thumbnails', array( 'post' ) ); //add thumbnails for posts
	add_action( 'init', 'theme_widgets_init' );
	add_action( 'init', 'register_custom_menu' );
?>