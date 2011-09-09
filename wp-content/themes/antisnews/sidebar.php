<div id="sidebarone">


	<?php 	/* Widgetized sidebar, if you have the plugin installed. */
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar One') ) : ?>

		<div class="widget"><div class="widgetinside">
		<h2><?php _e("Pages","Antisnews");?></h2>
		<ul>
		<?php wp_list_pages('title_li='); ?>
		</ul>
		</div></div>
		
		<div class="widget"><div class="widgetinside">
		<h2><?php _e("Interesting Sites","Antisnews");?></h2>
		<ul><?php wp_list_bookmarks('title_li=&categorize=0'); ?></ul>
		</div></div>

		<div class="widget"><div class="widgetinside">
		<h2><?php _e("Insider","Antisnews");?></h2>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</div></div>

		<div class="widget"><div class="widgetinside">

					<h2><?php _e("Archives","Antisnews");?></h2>

<select name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'> 
  <option value=""><?php echo attribute_escape(__('Select Month')); ?></option> 
  <?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?> </select>

		</div></div>

	<?php endif; ?>

</div>