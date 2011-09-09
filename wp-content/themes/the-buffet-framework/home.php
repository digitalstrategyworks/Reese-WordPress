<?php get_header(); ?>

<div id="content" class="section">
<?php bf_above_content() ?>

<?php bf_above_index_news(); ?>

<?php wp_reset_query(); 
query_posts( 'cat=' . bf_get_option('news_cat') . '&paged=' . $paged );
if ( have_posts() ) : ?>

<div class="hfeed news-list clearfix">
<?php while (have_posts()) : the_post() ?>
	<div <?php bf_post_class(); ?>>
		<?php bf_newsheader(); ?>
		<?php bf_newsbody(); ?>
		<?php bf_newsfooter(); ?>
	</div>
<?php endwhile; ?>
</div><!-- .hfeed -->

<?php endif; ?>

<?php bf_below_index_news(); ?>

<?php bf_below_content() ?>
</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>