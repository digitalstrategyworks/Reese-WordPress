<?php get_header(); ?>

<div id="content" class="section">
<?php bf_above_content() ?>

<h3><?php _e('Not Found', 'buffet') ?></h3>
<?php _e('<p><strong>We\'re very sorry, but that page doesn\'t exist or has been moved.</strong><br />
Please make sure you have the right URL.</p>
<p>If you still can\'t find what you\'re looking for, try using the search form below.<br />', 'buffet') ?>
<?php include (TEMPLATEPATH . '/searchform.php'); ?>

<?php bf_below_content() ?>
</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>