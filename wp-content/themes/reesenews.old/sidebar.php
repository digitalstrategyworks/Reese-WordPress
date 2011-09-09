			<!-- @@@ begin right bar @@@ -->
			<div id="rightBar" class="grid_4">
				
				<!-- custom code that is not widgets -->
				
				
				<!-- widgets, which appear as list items -->
				
				<?php if ( is_sidebar_active('sidebar') ) : ?>
					<div id="sidebar" class="widget-area">
						<ul class="xoxo">
							<?php dynamic_sidebar('sidebar'); ?>
							<?php wp_meta(); ?>
			
						</ul>
					</div> <!-- end sidebar widget area -->
				<?php endif; ?>
				
				
			</div><!-- end rightBar -->	