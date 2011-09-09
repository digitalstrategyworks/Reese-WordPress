<?php

/**

 * @package Buffet

 * @subpackage API

 */



/**

 * class BF_Options

 * 

 * The BF_Options class handles the retrieval and saving of all the options in the Buffet Framework.

 * Based on Tarski's Options class.  

 * 

 * @access	public

 * @since	0.5.2

 */

class BF_Options {

	

	/**

	 * $version - Version of this Theme

	 * 

	 * Used in the need of upgrading this Options class in future versions.

	 * 

	 * @access	public

	 * @var		string

	 * @since	0.5.2

	 */

	var $version;

	

	/**

	 * $feed_url - Posts Feed URL

	 * 

	 * The default RSS feed link will be redirected to this URL. 

	 * Useful if you have decided to use third-party services like Feedburner.

	 * 

	 * @access	public

	 * @var		string

	 * @since	0.5.2

	 */

	var $feed_url;

	

	/**

	 * $comments_feed_url - Comments Feed URL

	 * 

	 * The default RSS feed link will be redirected to this URL. 

	 * Useful if you have decided to use third-party services like Feedburner. 

	 * 

	 * @access	public

	 * @var		string

	 * @since	0.5.2

	 */

	var $comments_feed_url;

	

	/**

	 * $footer_message - Footer Message

	 * 

	 * This value will be displayed at the footer. 

	 * It usually has the site's copyright information.

	 * 

	 * @access	public

	 * @var		string

	 * @since	0.5.2

	 */

	var $footer_message;

	

	/**

	 * $featured_cat - Featured Category

	 * 

	 * {@internal Missing Long Description }}

	 * 

	 * @access	public

	 * @var		int

	 * @since	0.5.2

	 */

	var $featured_cat;

	

	/**

	 * $news_cat - News Category

	 * 

	 * {@internal Missing Long Description }}

	 * 

	 * @access	public

	 * @var		int

	 * @since	0.5.2

	 */

	var $news_cat;

	

	/**

	 * $asides_cat - Asides Category

	 * 

	 * {@internal Missing Long Description }}

	 * 

	 * @access	public

	 * @var		int

	 * @since	0.5.2

	 */

	var $asides_cat;

	

	/**

	 * $home_link - Name of Home Page in Navigation / Breadcrumbs

	 * 

	 * {@internal Missing Long Description }}

	 * 

	 * @access	public

	 * @var		string

	 * @since	0.5.2

	 */

	var $home_link;

	

	/**

	 * $blog_link - Name of Blog Page in Navigation / Breadcrumbs

	 * 

	 * {@internal Missing Long Description }}

	 * 

	 * @access	public

	 * @var		string

	 * @since	0.5.2

	 */

	var $blog_link;

	

	/**

	 * $single_parent - ID of Additional Page in Breadcrumbs

	 * 

	 * {@internal Missing Long Description }}

	 * 

	 * @access	public

	 * @var		int

	 * @since	0.5.2

	 */

	var $single_parent;

	

	/**

	 * $topnav_linkcat - Link Category for Top Navigation

	 * 

	 * {@internal Missing Long Description }}

	 * 

	 * @access	public

	 * @var		int

	 * @since	0.5.2

	 */

	var $topnav_linkcat;

	

	/**

	 * $display_author - Display Author Information

	 * 

	 * {@internal Missing Long Description }}

	 * 

	 * @access	public

	 * @var		string

	 * @since	0.5.2

	 */

	var $display_author;

	

	/**

	 * $hooks - Hooks Manager Information

	 * 

	 * {@internal Missing Long Description }}

	 * 

	 * @access	public

	 * @var		mixed

	 * @since	0.5.2

	 */

	var $hooks;

	

	/**

	 * $extensions - Loaded Extensions and Options

	 * 

	 * {@internal Missing Long Description }}

	 * 

	 * @access	public

	 * @var		mixed

	 * @since	0.5.2

	 */

	var $extensions;

	

	/**

	 * default_options() - Default Values Function

	 * 

	 * This function reset all class variables to its default values.

	 * 

	 * @access	public

	 * @since	0.5.2

	 */

	function default_options() {

		$this->version = BF_VERSION;

		

		$this->footer_message = sprintf( __('<strong>&copy; %s</strong>. All Rights Reserved.'), get_bloginfo('name') );

		

		$this->home_link = __('Home', 'buffet');

		$this->blog_link = __('Blog', 'buffet');

		$this->topnav_linkcat = 0;

		

		$this->index_news_thumbs = true;

		

		$this->archive_news_thumbs = true;



		$this->hooks = array();

	}

	

	/**

	 * get_options() - Get Options Function

	 * 

	 * This function retrieves all the options from the database and sets

	 * the current class to the values.

	 * 

	 * @access	public

	 * @since	0.5.2

	 */

	function get_options() {		

		$saved_options = unserialize(get_option(THEME_ID . '_options'));

		if (!empty($saved_options) && is_object($saved_options)) {

			foreach($saved_options as $name => $value) {

				$this->$name = $value;

			}	

		}

	}

	

	/**

	 * save_options() - Save Options Function

	 * 

	 * This function is executed when the user submits the form in the admin options.

	 * It will save all form data into the current class and to the database.

	 * 

	 * @access	public

	 * @since	0.5.2

	 */

	function save_options() {

		$this->version = BF_VERSION;

		

		$this->feed_url = (string)$_POST['bf-rss-feed-url'];

		$this->comments_feed_url = (string)$_POST['bf-rss-comments-url'];

		$this->footer_message = (string)($_POST['bf-footer-message']);

		

		$this->featured_cat = (int)$_POST['bf-cat-featured'];

		$this->news_cat = (int)$_POST['bf-cat-news'];

		$this->asides_cat = (int)$_POST['bf-cat-asides'];

		

		$this->home_link = (string)$_POST['bf-nav-home'];

		$this->blog_link = (string)$_POST['bf-nav-blog'];

		$this->single_parent = (string)$_POST['bf-nav-singleparent'];

		$this->topnav_linkcat = (int)$_POST['bf-nav-linkcat'];

		

		$this->display_author = (boolean)$_POST['bf-layout-display-author'];



		$this->hooks = array();

		$hook_classes = $_POST['bf-hook-cond'];

		$hook_filters = $_POST['bf-hook-filter'];

		$hook_positions = $_POST['bf-hook-position'];

		$hook_codes = $_POST['bf-hook-html'];

		

		for ( $i = 0; $i < count($hook_positions); $i++ ) {

			$this->hooks[] = array(

				'ID'		=>	(string)stripslashes($hook_classes[$i]),

				'filter'	=>	$hook_filters[$i],

				'position'	=>	(string)stripslashes($hook_positions[$i]),

				'code'		=>	$hook_codes[$i]

			);

		}

	}



}



/**

 * bf_flush_options() - Flush Options Function

 * 

 * Loads the options from the database and sets them to the options class instance.

 * Resets the global settings to its default settings if the option does not exist.

 * 

 * @access	public

 * @since	0.5.2

 */

function bf_flush_options() {

	global $bf_options;

	

	$bf_options = new BF_Options();

	$bf_options->get_options();

	

	if ( !get_option(THEME_ID . '_options') ) $bf_options->default_options();

}



/**

 * bf_update_options() - Update Options Function

 * 

 * Saves the current options class instance to the database.

 * 

 * @access	public

 * @since	0.5.2

 */

function bf_update_options() {

	global $bf_options;

	update_option(THEME_ID . '_options', maybe_serialize($bf_options));

}



/**

 * bf_update_option() - Update Option Function

 * 

 * Updates the option based on the ID and value given. 

 * Not to be confused with bf_update_options().

 * 

 * @access	public

 * @since	0.5.2

 * @param	string				$name	Name of the option

 * @param	mixed				$value	Value of the option

 * @param	boolean[optional]	$commit	Commit the changes to the database

 */

function bf_update_option($name, $value, $commit = true) {

	global $bf_options;

	$bf_options->get_options();

	

	$bf_options->$name = $value;

	

	if ($commit) {

		bf_update_options();

		bf_flush_options();

	}

}



/**

 * bf_get_option() - Get Option Function

 * 

 * Retrieves the option based on the ID given.

 * 

 * @access	public

 * @since	0.5.2

 * @return 	mixed			Option data

 * @param	string	$name	Name of the option

 */

function bf_get_option($name) {

	global $bf_options;

	

	if (!is_object($bf_options) )

		bf_flush_options();

	

	return $bf_options->$name;

}



/* End of file options.php */

/* Location: ./includes/options.php */

