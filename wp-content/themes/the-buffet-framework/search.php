<?php get_header(); ?>

<div id="content" class="section">
<?php bf_above_content() ?>

<?php bf_above_search_posts() ?>

<h3><?php printf( __('Search Results for <strong>&#8216;' . '%s' . '&#8217;</strong></p>', 'buffet'), wp_specialchars($s, 1) ) ?></h3>

<?php if (have_posts()) : ?>

<div class="hfeed">
<?php while (have_posts()) : the_post() ?>
	<div <?php bf_post_class(); ?>>
		<?php bf_search_postheader(); ?>
		<?php bf_search_postbody(); ?>
		<?php bf_search_postfooter(); ?>
	</div>
<?php endwhile; ?>
</div><!-- .hfeed -->

<?php bf_below_search_posts() ?>

<?php else: ?>

<p><?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'buffet'); ?></p>

<?php endif; ?>

<?php bf_below_content() ?>
</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>