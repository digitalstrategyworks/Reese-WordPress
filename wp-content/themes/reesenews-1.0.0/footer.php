		</div><!--end content --><div class="clear"></div>
		
		<div id="page-bottom">
		<div id="footer" class="grid_16">
			<?php if ( is_sidebar_active('footer-1') ) : ?>
				<div id="footer-1" class="grid_4 widget-area">
					<ul class="xoxo">
						<?php dynamic_sidebar('footer-1'); ?>
					</ul>
				</div> <!-- end footer-1 widget area -->
			<?php endif; ?>
			
			<?php if ( is_sidebar_active('footer-2') ) : ?>
				<div id="footer-2" class="grid_8 widget-area">
					<ul class="xoxo">
						<?php dynamic_sidebar('footer-2'); ?>
					</ul>
				</div> <!-- end footer-1 widget area -->
			<?php endif; ?>
			
			<?php if ( is_sidebar_active('footer-3') ) : ?>
				<div id="footer-3" class="grid_4 widget-area">
					<ul class="xoxo">
						<?php dynamic_sidebar('footer-3'); ?>
					</ul>
				</div> <!-- end footer-1 widget area -->
			<?php endif; ?>
		</div><!-- end footer -->
		
	</div><!-- end pagewrapper -->
	
	
	<?php wp_footer(); ?>
	<?php if ( is_single() ) : ?>
	<div id="floating-box">
		<div id="box">
			<div>
				<ul>
					<li><span class="st_facebook_vcount"></span></li>
					<li><span class="st_twitter_vcount"></span></li>
					<li><span class="st_linkedin_vcount"></span></li>
					<li><span class="st_email_button" displayText="E-mail"></span></li>

				</ul>
			</div>
			<div id="box-point">
				<img src="<?php bloginfo('template_directory'); ?>/images/arrow.png" />
			</div>
			<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
			<script type="text/javascript">
			        stLight.options({
			                publisher:'b9ae1913-157a-4e09-8c8a-6c5e72510449'
			        });
			</script>
		</div>
	</div>
	<?php endif; ?>
	
</div> <!-- end wrapper -->

<script type="text/javascript" charset="utf-8">
  var is_ssl = ("https:" == document.location.protocol);
  var asset_host = is_ssl ? "https://s3.amazonaws.com/getsatisfaction.com/" : "http://s3.amazonaws.com/getsatisfaction.com/";
  document.write(unescape("%3Cscript src='" + asset_host + "javascripts/feedback-v2.js' type='text/javascript'%3E%3C/script%3E"));
</script>

<script type="text/javascript" charset="utf-8">
  var feedback_widget_options = {};

  feedback_widget_options.display = "overlay";  
  feedback_widget_options.company = "reesenews";
  feedback_widget_options.placement = "right";
  feedback_widget_options.color = "#759EC7";
  feedback_widget_options.style = "idea";
  
  var feedback_widget = new GSFN.feedback_widget(feedback_widget_options);
</script>

</body>
</html>