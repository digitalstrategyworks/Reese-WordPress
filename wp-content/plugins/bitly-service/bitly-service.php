<?php
/**
 * Plugin Name: Bit.ly Service
 * Plugin URI: http://snippets-tricks.org/proyecto/bitly-service/
 * Description: Bit.ly Service allows you to generate a bit.ly or j.mp shortlink for all of your posts and pages and custom post types.
 * Version: 1.0.0
 * Author: Luis Alberto Ochoa
 * Author URI: http://luisalberto.org
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @package Bit.ly Service
 * @version 1.0.0
 * @author Luis Alberto Ochoa Esparza <soy@luisalberto.org>
 * @copyright Copyright (c) 2011, Luis Alberto Ochoa Esparza
 * @link http://snippets-tricks.org/proyecto/bitly-service/
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * 'Bit.ly Service' guarda los Shortlinks obtenidos en la base de datos como cache. Esto quiere
 * decir que al cambiar la configuración el dominio (bit.ly, j.mp, pro domain), será necesario
 * eliminar todos los registros ya generados y obtener los Shortlinks con el nuevo dominio.
 *
 * delete_metadata( 'post', false, '_bitly_shortlink', '', true );
 *
 * @link http://code.google.com/p/bitly-api/wiki/ApiBestPractices#Caching
 */

/* Importamos la librería Bit.ly. */
require_once( 'library/class-bitly.php' );

/**
 * Bitly Service hereda la clase Bit.ly.
 * 
 * @since 1.0.0
 * @link https://github.com/niftycode/bitly-class
 */
class Bitly_Service extends Bitly {

	/**
	 * Constructor PHP5.
	 * 
	 * @since 1.0.0
	 */
	function __construct() {

		/* Carga la traducción del plugin. */
		load_plugin_textdomain( 'bitly-service', false, 'bitly-service/languages' );

		/* Corta el circuito para crear el Shortlink. */
		add_filter( 'pre_get_shortlink', array( &$this, 'bitly_get_shortlink' ), 10, 4 );

		/* Crea un menu en la barra de administración (WP 3.1+). */
		add_action( 'admin_bar_menu', array( &$this, 'bitly_admin_bar_menu' ), 99 );

		/* Carga las funciones del administrador. */
		add_action( 'wp_loaded', array( &$this, 'bitly_admin' ) );

		/* Desactivación del plugin. */
		register_deactivation_hook( __FILE__, array( &$this, 'bitly_desactivation' ) );
	}

	/**
	 * Esta función coloca el Shortlink obtenido de acuerdo con el contexto acortando el circuito
	 * en el filtro 'pre_get_shortlink'.
	 * 
	 * @since 1.0.0
	 */
	function bitly_get_shortlink( $shortlink, $id, $context, $allow_slugs ) {

		/* El Shortlink no se muestra en la página principal. */
		if ( is_front_page() && !is_paged() )
			return apply_filters( 'bitly_front_page', false );

		global $wp_query;

		$post_id = '';

		/* Obtiene el ID de Post, Page y Post Types. */
		if ( 'query' == $context && is_singular() )
			$post_id = $wp_query->get_queried_object_id();

		else if ( 'post' == $context ) {
			$post = get_post( $id );
			$post_id = $post->ID;
		}

		/* Obtiene el Shortlink si existe. */
		if ( $shortlink = get_metadata( 'post', $post_id, '_bitly_shortlink', true ) )
			return $shortlink;

		/* Obtiene la URL del post. */
		$url = get_permalink( $post_id );

		/* Obtiene el Shortlink. */
		$domain = bitly_settings( 'domain' );
		$shortlink = parent::get_shortlink( $url, $domain );

		/* Guarda el Shortlink en la base de datos como cache. */
		if ( !empty( $shortlink ) ) {
			update_metadata( 'post', $post_id, '_bitly_shortlink', $shortlink );
			return $shortlink;
		}

		/* Si el shortlink no se genero, retornamos false. */
		return false;
	}

	/**
	 * Agrega dos submenus al menu Shortlink en la barra de administración (WP 3.1+)
	 * para interactuar con Bit.ly.
	 *
	 * @since 1.0.0
	 */
	function bitly_admin_bar_menu() {
		global $wp_admin_bar;

		/* Obtiene el shortlink. */
		$shortlink = wp_get_shortlink( 0, 'query' );

		/* Si el shortlink no existe o no es algun Post, retorna false. */
		if ( empty( $shortlink ) )
			return false;

		/* Crea el menú 'Shortlink'. */
		$wp_admin_bar->remove_menu( 'get-shortlink' );
		$wp_admin_bar->add_menu( array( 'id' => 'shortlink', 'title' => __( 'Shortlink' ), 'href' => $shortlink ) );

		/* Agrega 'Share on Twitter' al menu Shortlink. */
		$twitter = sprintf( 'http://twitter.com/?status=%1$s', str_replace( '+', '%20', urlencode( get_the_title() . ' - ' . $shortlink ) ) );
		$wp_admin_bar->add_menu( array( 'parent' => 'shortlink', 'id' => 'bitly-share', 'title' => __( 'Share on Twitter', 'bitly-service' ), 'href' => $twitter, 'meta' => array( 'target' => '_blank' ) ) );

		/* Agrega 'Status' al menu Shortlink. */
		$status = "{$shortlink}+";
		$wp_admin_bar->add_menu( array( 'parent' => 'shortlink', 'id' => 'bitly-status', 'title' => __( 'Status', 'bitly-service' ), 'href' => $status, 'meta' => array( 'target' => '_blank' ) ) );
	}

	/**
	 * Carga las funciones del administrador.
	 * 
	 * @since 1.0.0
	 */
	function bitly_admin() {

		if ( is_admin() ) {

			/* Agrega una página de configuración. */
			add_action( 'admin_menu', 'bitly_admin_setup' );

			/* Elimina la cache cuando un post o post metadata se actualizan. */
			add_action( 'save_post', array( &$this, 'bitly_cache_delete' ) );
			add_action( 'added_post_meta', array( &$this, 'bitly_cache_delete' ) );
			add_action( 'updated_post_meta', array( &$this, 'bitly_cache_delete' ) );
			add_action( 'deleted_post_meta', array( &$this, 'bitly_cache_delete' ) );

			/* Agrega un enlace a la página de configuración en la lista de plugins. */
			add_filter( 'plugin_action_links', 'bitly_service_action_link', 10, 2 );
		}
	}

	/**
	 * Elimina toda la cache. Esta función es llamada al desactivar el plugin
	 * para eliminar todos los registros generados en la base de datos.
	 *
	 * @since 1.0.0
	 */
	function bitly_desactivation() {

		/* Elimina todos los registros generados. */
		delete_metadata( 'post', false, '_bitly_shortlink', '', true );

		/* Elimina el registro de la configuración. */
		delete_option( 'bitly_settings' );
	}

	/**
	 * Elimina la cache de un Post determinado.
	 *
	 * @since 1.0.0
	 * @param int $post_ID Especifica el ID del Post a eliminar la cache
	 */
	function bitly_cache_delete( $post_id ) {
		delete_metadata( 'post', $post_id, '_bitly_shortlink' );
	}
}

/* Crea una nueva instancia de la clase Bitly. */
$bitly = new Bitly_Service();

if ( $login = bitly_settings( 'login' ) )
	$bitly->login( $login );

if ( $apiKey = bitly_settings( 'apiKey' ) )
	$bitly->apiKey( $apiKey );

/**
 * Carga la configuración del plugin y permite obtener los valores
 * de un campo especifico.
 *
 * @since 1.0.0
 */
function bitly_settings( $option = '' ) {

	if ( empty( $option ) )
		return false;

	$settings = get_option( 'bitly_settings' );

	if ( !is_array( $settings ) || empty( $settings[$option] ) )
		return false;

	return $settings[$option];
}

/**
 * Agrega la página de configuración y registra las opciones del plugin.
 *
 * @since 1.0.0
 */
function bitly_admin_setup() {

	/* Agrega la página de configuración. */
	add_options_page( __( 'Bit.ly Service Settings', 'bitly-service' ), 'Bit.ly Service', 'manage_options', 'bitly-service', 'bitly_service_settings_page' );

	/* Register the plugin settings. */
	add_action( 'admin_init', 'bitly_service_register_settings' );

	/* Carga el archivo de estilos que necesita la página. */
	add_action( 'load-settings_page_bitly-service', 'bitly_service_admin_enqueue_style' );
}

/**
 * Muestra la página de configuración del plugin.
 *
 * @since 1.0.0
 */
function bitly_service_settings_page() { ?>

	<div class="wrap">

		<?php screen_icon( 'bitly-service' ); ?>

		<h2><?php _e( 'Bit.ly Service Settings', 'bitly-service' ); ?></h2>

		<form id="bitly_service_options_form" action="<?php echo admin_url( 'options.php' ); ?>" method="post">

			<?php settings_fields( 'bitly_settings' ); ?>

			<table class="form-table">
				<tr>
					<th><label for="bitly_settings-login"><?php _e( 'Login Name', 'bitly-service' ); ?></label></th>
					<td>
						<input id="bitly_settings-login" name="bitly_settings[login]" type="text" value="<?php echo bitly_settings( 'login' ); ?>" /><br />
						<span class="description"><?php printf( __( 'Enter your %s Login Name.', 'bitly-service' ), '<a href="http://bit.ly/a/account" title="Bit.ly Account Settings" target="_blank">Bit.ly</a>' ); ?></span>
					</td>
				</tr>
				<tr>
					<th><label for="bitly_settings-apiKey"><?php _e( 'API Key', 'bitly-service' ); ?></label></th>
					<td>
						<input id="bitly_settings-apiKey" name="bitly_settings[apiKey]" type="text" value="<?php echo bitly_settings( 'apiKey' ); ?>" /><br />
						<span class="description"><?php printf( __( 'Enter your %s API Key.', 'bitly-service' ), '<a href="http://bit.ly/a/account" title="Bit.ly Account Settings" target="_blank">Bit.ly</a>' ); ?></span>
					</td>
				</tr>
				<tr>
					<th><label for="bitly_settings-domain"><?php _e( 'Domain', 'bitly-service' ); ?></label></th>
					<td>
						<?php _e( 'Select a domain you would  like to use.', 'bitly-service' ); ?>
						<br />
						<select name="bitly_settings[domain]" id="bitly_settings-domain">
							<?php foreach ( array( 'bit.ly', 'j.mp' ) as $domain ) { ?>
								<option value="<?php echo $domain; ?>" <?php selected( $domain, bitly_settings( 'domain' ) ); ?>><?php echo $domain; ?></option>
							<?php } ?>
						</select>
						<br />
						<span class="description"><?php printf( __( 'You can also use your own short domain with %s.', 'bitly-service' ), '<a href="http://bit.ly/pro/" title="Bit.ly Pro" target="_blank">Bit.ly PRO</a>' ); ?></span>
					</td>
				</tr>
			</table>

			<p class="submit" style="clear: both;">
				<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes' ); ?>" />
			</p><!-- .submit -->

		</form>

	</div> <!-- .wrap --> <?php
}

/**
 * Registra la configuración de Bitly Service con WordPress.
 *
 * @since 1.0.0
 */
function bitly_service_register_settings() {
	register_setting( 'bitly_settings', 'bitly_settings', 'bitly_service_validate_settings' );
}

/**
 * Validates/sanitizes de la congiguración del plugin.
 *
 * @since 1.0.0
 */
function bitly_service_validate_settings( $input ) {
	return $input;
}

/**
 * Carga el archivo de estilo bitly-service.css para la página de configuración.
 *
 * @since 1.0.0
 */
function bitly_service_admin_enqueue_style() {
	wp_enqueue_style( 'bitly-service-admin', plugin_dir_url( __FILE__ ) . 'css/bitly-service.css', false, '1.0.0', 'screen' );
}

/**
 * Agrega un enlace a la página de configuración en la lista de plugins.
 * 
 * @since 1.0.0
 */
function bitly_service_action_link( $links, $file ) {

	if ( 'bitly-service/bitly-service.php' !== $file )
		return $links;

	$settings = '<a href="' . admin_url( 'options-general.php?page=bitly-service' ) . '">' . __( 'Settings', 'bitly-service' ) . '</a>';
	array_unshift( $links, $settings );
	return $links;
}

