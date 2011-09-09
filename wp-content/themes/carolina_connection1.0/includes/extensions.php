<?php

/**

 * Buffet Framework - Extensions File

 * 

 * This file adds extensions functionality into the Buffet Framework.

 * 

 * Extensions are like WordPress plugins, they are a group of functions hooked into the theme system.

 * 

 * However, they are isolated within the theme itself. As a theme developer you can use extensions to

 * allow users to enable/disable features as they wish via functions.

 * 

 * @package Buffet

 * @subpackage API

 */



add_action('bf_init', 'bf_load_extensions');

add_action('admin_menu', 'bf_add_extensions_admin');



/**

 * {@internal Missing Short Description }}

 * 

 * {@internal Missing Long Description }}

 * 

 * @since	0.5.2

 * @ignore

 * @return	array

 */

function bf_add_extensions_admin() {

	

	if ( bf_detect_wpmu() ) {

		if ( is_site_admin() || get_site_option('bf_wpmu_enable_ext') ) {

			$page = add_theme_page( __('Extensions', 'buffet'), __('Extensions', 'buffet'), 'edit_themes', 'bf-extensions', 'bf_extensions_admin' );

	

			add_action('admin_print_scripts-'.$page, 'bf_admin_scripts');

			add_action('admin_print_styles-'.$page, 'bf_admin_styles');

		}

	} else {

		$page = add_theme_page( __('Extensions', 'buffet'), __('Extensions', 'buffet'), 'edit_themes', 'bf-extensions', 'bf_extensions_admin' );

	

		add_action('admin_print_scripts-'.$page, 'bf_admin_scripts');

		add_action('admin_print_styles-'.$page, 'bf_admin_styles');

	}



}



/**

 * {@internal Missing Short Description }}

 * 

 * {@internal Missing Long Description }}

 * 

 * @since	0.5.2

 * @ignore

 */

function bf_extensions_admin() {

	global $bf_options, $wpdb;

	if ( isset($_GET['page']) && $_GET['page'] == 'bf-extensions' ) {

		$loaded_extensions = bf_get_option('extensions');

		

		if ( isset($_REQUEST['save']) ) {

			if ( !wp_verify_nonce($_REQUEST['_wpnonce'], 'bf-extensions') ) {

				die('Security Error');	

			}

			

			if ( is_array($_POST['bf-load-extension']) ) {

				foreach ( $_POST['bf-load-extension'] as $id => $active ) {

					$loaded_extensions[$id]['active'] = (int)$active;

				}

			}

			

			bf_update_option('extensions', $loaded_extensions, true);

			echo '<div class="updated"><p>' . __('Your settings have been saved to the database.', 'buffet') . '</p></div>';	

		}

		

		$nonce = wp_create_nonce('bf-extensions'); // create nonce token for security

?>

	<div class="wrap">

	

	<div class="clearfix">

	<h2 id="bf-header"><?php printf( __('%s Extensions', 'buffet'), get_current_theme() ) ?></h2>

	</div>

	

	<p><?php _e('Extensions are like mini WordPress plugins, they are a group of functions hooked into the theme system. However, they are isolated within the theme itself.', 'buffet') ?></p>

	<p><?php _e('If you are a theme developer, you can use extensions to allow users to enable/disable features as they wish using this tool right here.', 'buffet') ?></p>

	

	<form id="bf-settings-form" method="post" action="themes.php?page=bf-extensions&_wpnonce=<?php echo $nonce ?>">

	

	<table class="widefat">

	<thead>

		<tr>

			<th scope="col"><?php _e('Name', 'buffet') ?></th>

			<th scope="col" style="min-width: 65%"><?php _e('Description', 'buffet') ?></th>

			<th scope="col"><?php _e('Action', 'buffet') ?></th>

		</tr>

	</thead>

	<tbody>

<?php

	$_to_delete = array();

	if ( $loaded_extensions ) : foreach ( $loaded_extensions as $extension_data ) :

		if ( class_exists($extension_data['class']) ) {

			$extension = new $extension_data['class'];

		} else {

			$_to_delete[] = $extension_data['class'];

		}

?>

	<tr>

		<td><strong><?php echo $extension->name ?></strong></td>

		<td><?php echo $extension->description ?></td>

		<td>

			<?php if ( $extension_data['allow_user'] ) : ?>

			<?php echo bf_form_radio('bf-load-extension[' . $extension_data['class'] . ']', 1, $extension_data['active'] == 1) . ' ' . __('Enable', 'buffet')?>

			<?php echo bf_form_radio('bf-load-extension[' . $extension_data['class'] . ']', 0, $extension_data['active'] == 0) . ' ' . __('Disable', 'buffet')?>

			<?php endif; ?>

		</td>

	</tr>

<?php

	endforeach;

	

	foreach ( $_to_delete as $delete_class ) {

		unset($loaded_extensions[$delete_class]);	

	}

	bf_update_option('extensions', $loaded_extensions, true);

	

	endif; 

?>

	</tbody>

	</table>

	

	<p class="submit">

	<input class="button-primary" type="submit" name="save" value="<?php _e('Save Changes', 'buffet') ?>" />

	</p>

	

	</form>

	</div>

	

	</div>

<?php

	}

}



/**

 * bf_add_extension() - Add Extension Function

 * 

 * Loads an extension into the theme.

 * 

 * @see		bf_remove_extension()

 * @access	public

 * @since	0.5.2

 * @return	boolean									True if the extension is loaded successfully, false if the extension file does not exist

 * @param	string				$class_name			The class name of the extension.

 * @param	boolean[optional]	$user_enabled		Allows the user to disable the extension in the admin options. If FALSE, the extension will not be enabled by default.

 */

function bf_add_extension($class_name, $user_enabled = true) {	

	$loaded_extensions = bf_get_option('extensions');

	

	if ( !$loaded_extensions[$class_name] ) {

		$extension_data = array( 'class' => $class_name, 'allow_user' => $user_enabled, 'settings' => array() );

		$extension_data['active'] = $user_enabled;

		

		$loaded_extensions[$class_name] = $extension_data;

		

		bf_update_option('extensions', $loaded_extensions, false);

	}

}



/**

 * bf_remove_extension() - Remove Extension Function

 * 

 * Removes an extension from the theme.

 * 

 * @see		bf_add_extension()

 * @access	public

 * @since	0.5.2

 * @param	string	$id		The ID of the extension.

 */

function bf_remove_extension($id) {

	$loaded_extensions = get_bf_option('extensions');

	unset($loaded_extensions[$id]);

	

	bf_update_option('extensions', $loaded_extensions, false);

}



/**

 * bf_load_extensions() - Load Extensions Function

 * 

 * Loads all the available extensions that are enabled by the user.

 * 

 * @access	public

 * @since	0.5.2

 */

function bf_load_extensions() {

	$loaded_extensions = bf_get_option('extensions');

	$_to_delete = array();



	if ( is_array($loaded_extensions) ) {

		foreach	($loaded_extensions as $class => $extension_data) {

			if ( class_exists($class) ) {

				if ( (boolean)$extension_data['active'] ) {

					$extension = new $extension_data['class'];

					$extension->load();	

				}

			} else {

				$_to_delete[] = $class;	

			}

		}

		

		foreach ( $_to_delete as $delete_class ) {

			unset($loaded_extensions[$delete_class]);	

		}

		

		bf_update_option('extensions', $loaded_extensions, true);

	}

	

	return null;

}



/**

 * bf_update_ext_option() - Update Extension Option Function

 * 

 * This function allows you to save any settings made by the user

 * to the bf_Options class. This is similar to bf_update_option().

 * 

 * @see		bf_delete_ext_option()

 * @see		bf_update_option()

 * @access	public

 * @since	0.5.2

 * @param	string			$ext_id		ID of the extension. Usually it's the class name

 * @param	string			$opt_id 	ID of the extension option

 * @param	mixed[optional]	$value		Value of the extension option

 */

function bf_update_ext_option($ext_id, $opt_id, $value = '') {

	$loaded_extensions = bf_get_option('extensions');

	

	if ( $loaded_extensions[$ext_id] ) {

		$loaded_extensions[$ext_id]['settings'][$opt_id] = $value;

		bf_update_option('extensions', $loaded_extensions, true);

	}

}



/**

 * bf_delete_ext_option() - Delete Extension Option Function

 * 

 * This function allows you to remove any setting based on the ID.

 * 

 * @see		bf_update_ext_option()

 * @access	public

 * @since	0.5.2

 * @param	string			$ext_id		ID of the extension. Usually it's the class name

 * @param	string			$opt_id 	ID of the extension option

 */

function bf_delete_ext_option($ext_id, $opt_id) {

	$loaded_extensions = bf_get_option('extensions');

	

	if ( $loaded_extensions[$ext_id] && $loaded_extensions[$ext_id]['settings'][$opt_id] ) {

		unset($loaded_extensions[$ext_id]['settings'][$opt_id]);

		bf_update_option('extensions', $loaded_extensions, true);

	}

}



/**

 * bf_get_ext_option() - Get Extension Option Function

 * 

 * This function allows you to get a setting based on the ID.

 * 

 * @see		bf_update_ext_option()

 * @see		bf_delete_ext_option()

 * @access	public

 * @since	0.5.3

 * @return	string						Value of the setting

 * @param	string			$ext_id		ID of the extension. Usually it's the class name

 * @param	string			$opt_id 	ID of the extension option

 */

function bf_get_ext_option($ext_id, $opt_id) {

	$loaded_extensions = bf_get_option('extensions');

	if ( $loaded_extensions[$ext_id] ) {

		return $loaded_extensions[$ext_id]['settings'][$opt_id];

	} else {

		return false;

	}

}



/**

 * class BF_Extension

 * 

 * The Extension class is the parent class for all Buffet Framework extensions.

 * The method BF_Extension::load() must be over-ridden.

 * 

 * Based on the WP_Widget class in WordPress 2.8 onwards.

 * 

 * @package		Buffet

 * @subpackage	API

 * @access		public

 * @since		0.5.2

 */

class BF_Extension {

	

	var $id;			// Root ID for the extension. Must be unique.

	var $name;			// Name of the widget.

	var $description;	// Description of the widget.

	

	/**

	 * PHP5 Constructor

	 */

	function __construct($id, $name, $description) {

		$this->id = $id;

		$this->name = $name;

		$this->description = $description;

	}

	

	/**

	 * PHP4 Constructor

	 */

	function BF_Extension($id, $name, $description) {

		return $this->__construct($id, $name, $description);

	}

	

	/**

	 * BF_Extension::load() - Load Function

	 */

	function load() {

		die('function WP_Widget::load() must be over-ridden in a sub-class.');

	}

	

}



/* End of file extensions.php */

/* Location: ./includes/extensions.php */

