<?php get_header(); ?>
<div class="main_body_mobile">
	<?php if(have_posts()) : ?>
		<?php $i=0; ?>
		<?php while(have_posts()) : the_post(); ?>
			<div class="wrapper" id="post-<?php the_ID(); ?>">
				<div class="ui-body ui-body-e">
					<div class="ui-grid-a">
						<div class="ui-block-b" style="padding-top: 8px;">
							<div class="post_the_title">
					    	<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					    </div>
					    
					    <div class="ui-block-a">
							<div class="calendar-day">
								<?php the_time('g.i a'); ?>
							</div>
						</div>
					</div><!-- /grid-a -->
					<div class="entry">
						<!-- Begin -->  
						<?php the_content();?>
						<!-- End -->
					</div>
					<a class="arrow-nav<?php echo $i;?>" href="#" data-role="button" data-icon="arrow-u" data-iconpos="notext" onclick="$('<? echo '.eid'.$i; ?>').toggle('slow'); $('.arrow-nav<?php echo $i;?>').toggle('fast'); return false;" style="<? if($i!=0) echo 'display: none;'; ?>"></a>
					<a class="arrow-nav<?php echo $i;?>" href="#" data-role="button" data-icon="arrow-d" data-iconpos="notext" onclick="$('<? echo '.eid'.$i; ?>').toggle('slow'); $('.arrow-nav<?php echo $i;?>').toggle('fast'); return false;" style="<? if($i==0) echo 'display: none;'; ?>"></a>
				</div>
			</div>
		<?php $i++; ?>
		<?php endwhile; ?>
	  <div class="navigation">
	  	<?php posts_nav_link(' &#124; ','&#171; previous','next &#187;'); ?>
	  </div>               
	<?php else : ?>
	<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php _e('No posts are added.'); ?></h2>
	</div>
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>      