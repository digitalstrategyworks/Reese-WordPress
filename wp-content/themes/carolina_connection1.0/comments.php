<?php

if ( !empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )

	die( __('Please do not load this page directly. Thanks!', 'buffet') );

if ( post_password_required() ) {

	_e('<p class="nocomments">This post is password protected. Enter the password to view comments.</p>', 'buffet');

	return;

}

?>

<?php if ( have_comments() ) : ?>

	<?php if ( ! empty($comments_by_type['comment']) ) : ?>  

	<h5><?php comments_number( __('No Comments', 'buffet'), __('1 Comment', 'buffet'), __ngettext('% Comment', '% Comments', get_comments_number(), 'buffet') ); ?></h5>

		<ol id="commentlist">

			<?php wp_list_comments('type=comment&callback=bf_list_comments'); ?>

		</ol>

		<div class="comments-navigation clearfix">

			<div class="floatLeft"><?php previous_comments_link() ?></div>

		    <div class="floatRight"><?php next_comments_link() ?></div>

		</div>

	<?php endif; ?>

	

	<?php if ( ! empty($comments_by_type['pings']) ) : ?>

	<h5><?php _e('Trackbacks / Pings', 'buffet') ?></h5>

	<ol><?php wp_list_comments('type=pings&callback=bf_list_trackbacks'); ?></ol>

	<?php endif; ?>

	

	<?php else: ?>

		<?php if ('open' == $post->comment_status) : ?>

		<h5><?php _e('No Comments', 'buffet') ?></h5>

		<p class="nocomments"><?php _e('Start the ball rolling by posting a comment on this article!', 'buffet') ?></p>

		<?php else : ?>

		<h5><?php _e('Comments Closed', 'buffet') ?></h5>

		<p class="nocomments"><?php _e('Comments are closed. You will not be able to post a comment in this post.', 'buffet') ?></p>

		<?php endif ?>

<?php endif; ?>



<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

	<h5><?php comment_form_title( __('Leave a Reply', 'buffet'), __('Leave a Reply to %s', 'buffet') ); ?></h5>

	<div id="commentsform">

		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

			<?php comment_id_fields(); ?>

			<?php if ( $user_ID ) : ?>

				<p>

				   <?php printf( __('Logged in as <a href="%1$s" title="Logged in as %2$s">%3$s</a>.', 'buffet'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity, $user_identity) ?>

				   <a href="<?php echo wp_logout_url() ?> " title="<?php _e('Log out of this account', 'buffet') ?>"> (<?php _e('Logout', 'buffet') ?>)</a>

				</p>

			<?php else : ?>

				<p>

					<label for="author"><?php _e('Name', 'buffet') ?> <?php if ($req) _e('(required)', 'buffet') ?></label><br />

					<input type="text" name="author" id="s1" value="<?php echo $comment_author; ?>" size="40" tabindex="1" minlength="2" class="text required" />

				</p>

				<p>

					<label for="email"><?php _e('Mail (will not be published)', 'buffet') ?> <?php if ($req) _e('(required)', 'buffet') ?></label><br />

					<input type="text" name="email" id="s2" value="<?php echo $comment_author_email; ?>" size="40" tabindex="2" class="text required email" />

				</p>

				<p>

					<label for="url"><?php _e('Website', 'buffet') ?></label><br />

					<input type="text" name="url" id="s3" value="<?php echo $comment_author_url; ?>" size="40" tabindex="3" class="text url" />

				</p>

			<?php endif; ?>

			<p><?php printf( __('<strong>XHTML:</strong> You can use these tags: <code>%s</code>', 'buffet'), allowed_tags() ) ?></p>

			<p>

				<textarea name="comment" id="s4" cols="50" rows="10" tabindex="4" class="required"></textarea>

			</p>

			<?php if(function_exists('show_subscription_checkbox')) : ?>

				<p><?php show_subscription_checkbox() ?></p>

			<?php endif; ?>

			<p>

				<input name="submit" type="submit" class="submit" id="sbutt" tabindex="5" value="<?php _e('Submit Comment', 'buffet') ?>" />

				<?php cancel_comment_reply_link( __('Cancel Reply', 'buffet') ) ?>

			</p>

			<?php do_action('comment_form', $post->ID); ?>

		</form>

		<?php if(function_exists('show_manual_subscription_form')) { show_manual_subscription_form(); } ?>

	</div><!-- end #commentsform -->

</div><!-- #respond -->

<?php endif ?>