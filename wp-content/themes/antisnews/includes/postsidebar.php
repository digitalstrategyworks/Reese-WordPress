<div id="postsidebar">
<?php global $thePostID;?>

	<div class="widget"><div class="widgetinside">
	
		<div id="postmeta">

		<div class="byline"><?php _e("Added","Antisnews");?>: <?php the_time('F jS, Y'); ?><br/>
		<?php _e("Author","Antisnews");?>: <?php the_author(); ?><br/>
		<?php _e("Category","Antisnews");?>: <?php the_category(', '); ?><br/>
		<?php edit_post_link(__('Edit this post'), '', ''); ?>

		</div>

		</div><!--close postmeta-->
	</div></div>

	<?php if($AntisnewsOptions[$themeoptionsprefix.'_hideshareicons'] != 'hide'){?>
			
			<?php $rcsspthec = get_the_excerpt(); ?>		
			<?php if (!isset($rcsspthec) || empty($rcsspthec)){ $rcsspthec = get_the_content(); }?>
			<?php $rcsspthec = strip_tags($rcsspthec);?>
			<?php $rcsspthec = str_replace(' ',' ',$rcsspthec );?>
			<?php $rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );?>

			
		<div class="widget"><div class="widgetinside">

			<div id="share">

			<ul>
		     	<li><a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" class="digg" title="Digg this!"><img src="<?php bloginfo('template_url');?>/images/ico-digg.png" alt="Digg" border="0"/><br/>Digg</a></li>
		     	<li><a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>" class="facebook" title="Share this on Facebook"><img src="<?php bloginfo('template_url');?>/images/ico-facebook.png" alt="Facebook" border="0"/><br/>Facebook</a></li>
		     	<li><a href="http://del.icio.us/post?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" class="delicious" title="Share this on del.icio.us"><img src="<?php bloginfo('template_url');?>/images/ico-delicious.png" alt="Delicious" border="0"/><br/>Delicious</a></li>
		     	<li><a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" class="stumbleupon" title="Stumbled upon something good? Share it on StumbleUpon"><img src="<?php bloginfo('template_url');?>/images/ico-stumble.png" alt="Stumble" border="0"/><br/>StumbleUpon</a></li>
		     	<li><a href="http://twitter.com/home?status=<?php the_title(); ?>+-+<?php echo create_tiny_Url(get_permalink()); ?>" class="twitter" title="Tweet This!"><img src="<?php bloginfo('template_url');?>/images/ico-twitter.png" alt="Twitter" border="0"/><br/>Twitter</a></li>
			<li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>&amp;summary=<?php echo $rcsspthec; ?>&amp;source=<?php bloginfo('name'); ?>" class="linkedin" title="Share this on Linkedin"><img src="<?php bloginfo('template_url');?>/images/ico-linkedin.png" alt="LinkedIn" border="0"/><br/>LinkedIn</a></li>
		     	<li><a href="http://technorati.com/faves?add=<?php the_permalink(); ?>" class="technorati" title="Share this on Technorati"><img src="<?php bloginfo('template_url');?>/images/ico-technorati.png" alt="Technorati favorites" border="0"/><br/>Technorati</a></li>
     			<li><a href="http://reddit.com/submit?url=<?php echo the_permalink(); ?>"><img src="<?php bloginfo('template_url');?>/images/ico-reddit.png" alt="Reddit" border="0"/><br/>reddit</a></li>
     			<li><a href="http://www.mixx.com/submit?page_url=<?php echo the_permalink(); ?>"><img src="<?php bloginfo('template_url');?>/images/ico-mixx.png" alt="Mixx" border="0"/><br/>Mixx</a></li>
     			<li><a href="http://www.newsvine.com/_tools/seed?popoff=0&amp;u=<?php echo the_permalink(); ?>&amp;h=<?php the_title(); ?>"><img src="<?php bloginfo('template_url');?>/images/ico-newsvine.png" alt="Newsvine" border="0"/><br/>Newsvine</a></li>
			</ul>

			</div>
			<div class="clear"></div>

		</div></div>
	<?php }?>

	<?php if($AntisnewsOptions[$themeoptionsprefix.'_hidemorefromcategory'] != 'hide'){?>
		<div class="widget"><div class="widgetinside">

			<?php include (TEMPLATEPATH . '/includes/morefromcategory.php'); ?>

		</div></div>
	<?php } ?>


	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Single Post') ) : ?>

	<?php endif; ?>


</div><!--close postsidebar-->
