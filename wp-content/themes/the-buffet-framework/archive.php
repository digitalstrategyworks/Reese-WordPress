<?php get_header(); ?>

<div id="content" class="section">
<?php bf_above_content() ?>

<?php bf_above_archive_posts() ?>

<?php is_tag(); if ( have_posts() ) : ?>

<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

<?php if ( is_category() ) : ?>
    <h3><?php printf( __('%s Archive', 'buffet'), single_cat_title() ) ?></h3>
<?php elseif ( is_tag() ) : ?>
    <h3><?php printf( __('%s Archive', 'buffet'), single_tag_title() ) ?></h3>
<?php elseif ( is_day() ) : ?>
    <h3><?php printf( __('Archive for %s', 'buffet'), get_the_time(__('F jS, Y', 'buffet')) ) ?></h3>
<?php elseif ( is_month() ) : ?>
	<h3><?php printf( __('Archive for %s', 'buffet'), get_the_time(__('F, Y', 'buffet')) ) ?></h3>
<?php elseif ( is_year() ) : ?>
    <h3><?php printf( __('Archive for %s', 'buffet'), get_the_time(__('Y', 'buffet')) ) ?></h3>
	</div>
<?php elseif ( is_author() ) : ?>
    <h3><?php _e('Author Archive', 'buffet') ?></h3>
<?php else : ?>
    <h3><?php _e('Archives', 'buffet') ?></h3>
<?php endif; ?>

<?php /* Add archive action hook here */ ?>
    
<div class="hfeed news-list clearfix">
<?php while (have_posts()) : the_post() ?>
	<div <?php bf_post_class(); ?>>
		<?php bf_archive_postheader(); ?>
		<?php bf_archive_postbody(); ?>
		<?php bf_archive_postfooter(); ?>
	</div>
<?php endwhile; ?>
</div><!-- .hfeed -->

<?php bf_below_archive_posts() ?>
	
<?php else : ?>
	<?php bf_post_notfound() ?>
<?php endif; ?>

<?php bf_below_content() ?>
</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>