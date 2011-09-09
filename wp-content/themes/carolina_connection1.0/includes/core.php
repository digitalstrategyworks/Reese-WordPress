<?php

/**

 * Buffet Framework - Core Functions File

 * 

 * @package Buffet

 * @subpackage API

 */



/**

 * bf_detect_wpmu() - WordPress MU Function

 * 

 * Detects whether the current installation is a WordPress Multi-User / BuddyPress

 * installation.

 * 

 * @access	public

 * @since	0.5.3

 * @return	boolean			True if current installation is a WPMU / BuddyPress installation 

 */

function bf_detect_wpmu() {

	return function_exists('is_site_admin');	

}



/* End of file core.php */

/* Location: ./includes/core.php */

