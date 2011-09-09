<?php
/**
 * @package Buffet
 * @subpackage Widgets
 */

// Register Sidebars
register_sidebar( array(
	'name' => 'Primary Sidebar',
	'before_widget' => '<li class="widgetcontainer clearfix">',
	'after_widget' => '</li>',
	'before_title' => '<h5 class="widgettitle">',
	'after_title' => '</h5>'
) );
register_sidebar( array(
	'name' => 'Secondary Sidebar #1',
	'before_widget' => '<li class="widgetcontainer clearfix">',
	'after_widget' => '</li>',
	'before_title' => '<h5 class="widgettitle">',
	'after_title' => '</h5>'
) );
register_sidebar( array(
	'name' => 'Secondary Sidebar #2',
	'before_widget' => '<li class="widgetcontainer clearfix">',
	'after_widget' => '</li>',
	'before_title' => '<h5 class="widgettitle">',
	'after_title' => '</h5>'
) );
register_sidebar( array(
	'name' => 'Footer',
	'before_widget' => '<li class="widgetcontainer clearfix">',
	'after_widget' => '</li>',
	'before_title' => '<h5 class="widgettitle">',
	'after_title' => '</h5>'	
) );

// Register sidebar widgets.
register_sidebar_widget( __('Search'), 'bf_widget_search' );

/**
 * bf_widget_search() - Search Widget Function
 * 
 * Replaces the default search widget.
 * 
 * @since	0.5.2
 * @param	mixed	$args	Widget options
 */
function bf_widget_search($args) {
	extract($args, EXTR_SKIP);
?>
<?php echo $before_widget; ?>
<?php echo $before_title . 'Search' . $after_title; ?>
<form method="get" id="widgetsearch" action="<?php bloginfo('url'); ?>/">
	<input type="text" value="<?php the_search_query(); ?>" name="s" 
			id="s" size="20" onfocus="this.value=''" class="text" />
	<input type="submit" id="searchsubmit" class="submit" value="<?php _e('Search', 'buffet') ?>" />
</form>
<?php echo $after_widget; ?>
<?php
}

/* End of file widgets.php */
/* Location: ./includes/widgets.php */
