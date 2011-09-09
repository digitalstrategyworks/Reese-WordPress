<?php global $themeoptionsprefix;?>
<?php $AntisnewsOptions=get_antisnewsoptions();?>
</div><!--close contentcontainer-->

  <div class="clearall"></div>

	<div id="footer">

		<div class="tools">
			<ul>
				<?php wp_meta(); ?>

			</ul>
		</div>

		<?php wp_footer(); ?>

		<?php _e("Copyright","Antisnews");?> &copy; <?php print(date('Y')); ?> 	<?php bloginfo('name'); ?>	

	</div>

</div><!--close maincontainer-->
</div><!--close wrapper-->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/loopedSlider.js"></script>
<?php if($AntisnewsOptions[$themeoptionsprefix.'_sitetrackingcode'] <> ""){  echo stripslashes($AntisnewsOptions[$themeoptionsprefix.'_sitetrackingcode']); } ?>
</body>
</html>