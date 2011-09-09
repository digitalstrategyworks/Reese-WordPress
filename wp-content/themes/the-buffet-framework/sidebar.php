</div><!-- #container -->

<div id="primary" class="aside main-aside sidebar">
	<?php bf_above_primary_sidebar() ?>
	<ul class="xoxo">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Primary Sidebar') ) : ?>
		<li class="widgetcontainer">
			<h5 class="widgettitle"><?php _e('Archives', 'buffet') ?></h5>
			<ul><?php wp_get_archives('type=monthly'); ?></ul>
		</li>
		<li class="widgetcontainer">
			<h5 class="widgettitle"><?php _e('Categories', 'buffet') ?></h5>
			<ul>
			<?php wp_list_categories('show_count=1&title_li='); ?>
			</ul>
		</li>
		<?php wp_list_bookmarks('title_before=<h5 class="widgettitle">&title_after=</h5>&class=widgetcontainer'); ?>
		<?php endif; ?>
	</ul>
	<?php bf_below_primary_sidebar() ?>
</div><!-- #primary -->
<div id="secondary" class="aside main-aside sidebar">
	<?php bf_above_secondary_sidebar() ?>
    <ul class="xoxo">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Secondary Sidebar #1') ) : ?>              
        <?php endif; ?>
		
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Secondary Sidebar #2') ) : ?>
		<?php endif; ?>
    </ul>
	<?php bf_below_secondary_sidebar() ?>
</div><!-- #secondary -->
