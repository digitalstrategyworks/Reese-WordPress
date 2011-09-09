<?php

/**

 * @package	Buffet

 * @subpackage Extensions

 */

 

/**

 * BF_Ext_DevNotice class

 * 

 * {@internal Missing Long Description }}

 * 

 * @access	public

 * @since	0.5.2

 */

class BF_Ext_DevNotice extends BF_Extension {

	

	function BF_Ext_DevNotice() {

		$this->BF_Extension(

			'BF_Ext_DevNotice', 

			__('Notice to Theme Developers', 'buffet'), 

			__('This is a test extension. If enabled, it displays a notice about this theme at the top of the theme option page.', 'buffet')

		);

	}

	

	function load() {

		add_action( 'bf_above_admin_content', array(&$this, 'call_notice') );	

	}

	

	function call_notice() {

		echo '<div class="updated">';

		echo '<p><strong>' . __('Welcome to the Buffet Framework!', 'buffet') . '</strong></p>';

		echo '<p>' . __('If you are intending to customize this theme by editing the template files, I recommend that you create a child theme and customise from it.' , 'buffet') . '</p>';

		echo '<p>' . __('For more information about Theme Frameworks, check out the <a href="http://codex.wordpress.org/Theme_Frameworks">WordPress Codex</a>.', 'buffet') . '</p>';

		echo '<p>' . __('You can disable this notice from the <strong>Extensions</strong> page.', 'buffet') . '</p>';

		echo '</div>';

	}



}



/**

 * BF_Ext_SearchHighlight class

 * 

 * {@internal Missing Long Description }}

 * 

 * @access	public

 * @since	0.5.2

 */

class BF_Ext_SearchHighlight extends BF_Extension {

	

	function BF_Ext_SearchHighlight() {

		$this->BF_Extension(

			'BF_Ext_SearchHighlight', 

			__('Highlight Search Terms', 'buffet'), 

			__('Highlights Search Terms with jQuery. Based on <a href="http://weblogtoolscollection.com/archives/2009/04/10/how-to-highlight-search-terms-with-jquery/">this tutorial</a>.', 'buffet')

		);	

	}

	

	function load() {

		add_action( 'init', array(&$this, 'enqueue_script') );

		add_action( 'wp_head', array(&$this, 'add_head') );

		add_action( 'bf_jquery', array(&$this, 'add_jquery') );

	}

	

	function enqueue_script() {

		wp_enqueue_script( 'highlight', get_template_directory_uri() . '/includes/js/jquery.highlight.js', array('jquery') );

	}

	

	function add_head() {

		$query  = attribute_escape( get_search_query() );

		

		if(strlen($query) > 0) {

    		echo '<script type="text/javascript">var hls_query  = "' . $query . '";</script>';

  		}

	}

	

	function add_jquery() {

		if (is_search()) echo '$(".hfeed").highlight(hls_query, 1, "hls");';

	}

	

}



/**

 * BF_Ext_FeaturedPost class

 * 

 * {@internal Missing Long Description }}

 * 

 * @access	public

 * @since	0.5.4

 */

class BF_Ext_FeaturedPost extends BF_Extension {

	

	function BF_Ext_FeaturedPost() {

		$this->BF_Extension(

			'BF_Ext_FeaturedPost', 

			__('Featured Post', 'buffet'), 

			__('Shows a featured post from the assigned featured category from the theme options.', 'buffet')

		);	

	}

	

	function load() {

		add_action('bf_above_index_news', array(&$this, 'featured_post'));

	}

	

	function featured_post() {

		$q = new WP_Query('cat=' . bf_get_option('featured_cat') );

		if ( $q->have_posts() ) : $q->the_post(); ?>

		

		<div class="featured-post clearfix">

			<?php 

			echo '<span class="entry-category">' . __('Featured Post', 'buffet') . '</span>';

			echo '<h4 class="entry-title"><a title="' . sprintf( __('Permalink to %s', 'buffet'), get_the_title() ) . '" href="' . get_permalink() . '" rel="bookmark">' . get_the_title() . '</a></h4>';

			?>

			<div class="entry-summary">

				<?php the_excerpt(); ?>

			</div><!-- .entry-summary -->

			<a class="more-link" href="<?php the_permalink(); ?>"><?php _e('Read More', 'buffet') ?></a>

		</div>

		

		<?php endif;

	}

	

}



function bf_extensions_init() {

	bf_add_extension('BF_Ext_DevNotice');

	bf_add_extension('BF_Ext_SearchHighlight');

	bf_add_extension('BF_Ext_FeaturedPost');

}

add_action('bf_init', 'bf_extensions_init');



/* End of file default-extensions.php */

/* Location: ./includes/extensions/default-extensions.php */