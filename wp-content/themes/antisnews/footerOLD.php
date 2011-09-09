<?php global $themeoptionsprefix;?>
<?php $AntisnewsOptions=get_antisnewsoptions();?>
</div><!--close contentcontainer-->

  <div class="clearall"></div>

	<div id="footer">

		<div class="tools">
			<ul>

				<li><?php wp_register(); ?></li>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>

			</ul>
		</div>

		<?php wp_footer(); ?>

		<?php _e("Copyright","Antisnews");?> &copy; <?php print(date('Y')); ?> 	<?php bloginfo('name'); ?>	<?php _e("All rights reserved","Antisnews");?>
		Antisnews <?php _e("designed by","Antisnews");?> <a href="http://www.antisocialmediallc.com">antisocialmediallc.com</a>

	</div>

</div><!--close maincontainer-->
</div><!--close wrapper-->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/loopedSlider.js"></script>
<?php if($AntisnewsOptions[$themeoptionsprefix.'_sitetrackingcode'] <> ""){  echo stripslashes($AntisnewsOptions[$themeoptionsprefix.'_sitetrackingcode']); } ?>
</body>
</html>