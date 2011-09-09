<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<div id="searchbox">
	<div class="searchinputbox"><input type="text" size="25" value="<?php the_search_query(); ?>" name="s" class="searchinput" id="s" /></div>
	<div class="searchsubmitbutton"><input type="image" src="<?php bloginfo('template_url'); ?>/images/searchbutton.png" id="searchsubmit" value="Search" class="searchbutton" /></div>
</div>
</form>
