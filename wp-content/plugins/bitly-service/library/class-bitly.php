<?php
/**
 * Bit.ly Class
 *
 * Esta clase esta diseñada para trabajar con los servicios de Bit.ly en su version 3.0.
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
 * @version 1.0.0-Beta-18022011
 * @author Luis Alberto Ochoa <soy@luisalberto.org>
 * @copyright Copyright (c) 2011, Luis Alberto Ochoa Esparza
 * @link https://github.com/niftycode/bitly-class
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

class Bitly {

	/**
	 * Almacena el nombre de usuario para ingresar a Bit.ly.
	 * 
	 * @since 1.0.0
	 * @access private
	 * @var string
	 */
	private $login;

	/**
	 * Almacena una cadena única asignada por Bit.ly.
	 * 
	 * @since 1.0.0
	 * @access private
	 * @var string
	 */
	private $apiKey;

	/**
	 * Asignar los datos de la cuenta del usuario por medio de métodos inexistentes.
	 *
	 * @since 1.0.0
	 */
	function __call( $method, $parameters ) {

		if ( 'login' == $method && !empty( $parameters ) )
			$this->login = $parameters[0];

		else if ( 'apiKey' == $method && !empty( $parameters ) )
			$this->apiKey = $parameters[0];
	}

	/**
	 * Obtiene el Shortlink de una URL.
	 * 
	 * @since 1.0.0
	 * @param string $url Una dirección de Internet (Ej. http://snippets-tricks.org)
	 * @param string $domain Default: bit.ly. Especifica el dominio a utilizar como shortlink (bit.ly o j.mp)
	 * @return string $shortlink Retorna el Shortlink obtenido
	 */
	function get_shortlink( $url, $domain = 'bit.ly' ) {

		/* Variables que requieren ser inicializadas. */
		$json = '';
		$shortlink = '';

		/* Parametros. */
		$args['longUrl'] = urlencode( $url );
		$args['domain'] = $domain;

		/* Obtiene la respuesta de Bit.ly. */
		$json = $this->get_bitly_service( 'shorten', $args );

		/* Si no hay respuesta de Bit.ly, retorna false. */
		if ( empty( $json ) )
			return false;

		/* Retorna la respuesta de Bit.ly. */
		return $json['data']['url'];
	}

	/**
	 * Obtiene el valor Hash de un determinado Shortlink.
	 *
	 * @since 1.0.0
	 * @param string $shortlink Shortlink del que se obtendra el valor Hash (Ej. http://bit.ly/df5g6F)
	 * @return bool|string $hash Retorna el valor Hash (Ej. df5g6F)
	 */
	function get_hash( $shortlink ) {

		if ( preg_match( '#http://(.*)/(.*)#i', $shortlink, $matches ) ) {

			if ( true === $this->is_pro_domain( $matches[1] ) || in_array( $matches[1], array( 'bit.ly', 'j.mp' ) ) )
				return $matches[2];

			return false;
		}

		return false;
	}

	/**
	 * Obtiene la URL de un Shortlink/Hash (o múltiples).
	 *
	 * @since 1.0.0
	 * @param array|string $parameters
	 * @return array|string $longUrl
	 */
	function get_expand( $parameters ) {

		/* Genera los parámetros. */
		$args = $this->get_multiple_query( $parameters );

		/* Obtiene la respuesta de Bit.ly. */
		$json = $this->get_bitly_service( 'expand', $args );

		/* Si no hay respuesta de Bit.ly, retorna false. */
		if ( empty( $json ) )
			return false;

		/* Obtiene la respuesta de Bit.ly. */
		$expand = $json['data']['expand'];

		$count = count( $expand );

		if ( 1 === $count )
			$longUrl = ( isset( $expand[0]['long_url'] ) ? $expand[0]['long_url'] : $expand[0]['error'] );

		else
			$longUrl = $expand;

		/* Retorna la respuesta de Bit.ly. */
		return $longUrl;
	}

	/**
	 * Obtiene el número de Clicks de un Shortlink/Hash (o múltiples).
	 *
	 * @since 1.0.0
	 * @param array|string $parameters
	 * @param string $data Default: global Especifica el dato del que obtendra la cantidad de clicks (global o user)
	 * @return array|string {$data}_clicks
	 */
	function get_clicks( $parameters, $data = 'global' ) {

		/* Genera los parámetros. */
		$args = $this->get_multiple_query( $parameters );

		/* Obtiene la respuesta de Bit.ly. */
		$json = $this->get_bitly_service( 'clicks', $args );

		/* Si no hay respuesta de Bit.ly, retorna false. */
		if ( empty( $json ) )
			return false;

		/* Obtiene la respuesta de Bit.ly. */
		$clicks = $json['data']['clicks'];

		$count = count( $clicks );

		if ( 1 === $count )
			$count_clicks = ( isset( $clicks[0]["{$data}_clicks"] ) ? $clicks[0]["{$data}_clicks"] : $clicks[0]['error'] );

		else
			$count_clicks[] = $clicks;

		/* Retorna la respuesta de Bit.ly. */
		return $count_clicks;
	}

	/**
	 * Obtiene el número de Clicks por minuto de un Shortlink/Hash (o múltiples).
	 *
	 * @since 1.0.0
	 * @param array|string $parameters
	 * @return array
	 */
	function get_clicks_by_minute( $parameters ) {
		return get_clicks_by( $parameters, 'minute', '' );
	}

	/**
	 * Obtiene el número de Clicks por día de un Shortlink/Hash (o múltiples).
	 *
	 * @since 1.0.0
	 * @param array|string $parameters
	 * @param int $days
	 * @return array
	 */
	function get_clicks_by_day( $parameters, $days = '' ) {
		return get_clicks_by( $parameters, 'day', $days );
	}

	/**
	 * Obtiene el número de Clicks de acuerdo al parámetro $by de un Shortlink/Hash (o múltiples).
	 *
	 * @since 1.0.0
	 * @param array|string $parameters
	 * @param string $by
	 * @param int $days
	 * @return array
	 */
	private function get_clicks_by( $parameters, $by, $days ) {

		/* Genera los parámetros. */
		$args = $this->get_multiple_query( $parameters );

		if ( 'day' == $by && !empty( $days ) )
			$args['days'] = (int) $days;

		/* Obtiene la respuesta de Bit.ly. */
		$json = $this->get_bitly_service( "clicks_by_{$by}", $args );

		/* Si no hay respuesta de Bit.ly, retorna false. */
		if ( empty( $json ) )
			return false;

		/* Obtiene la respuesta de Bit.ly. */
		$clicks = $json['data']["clicks_by_{$by}"];

		/* Obtiene la respuesta de Bit.ly. */
		return ( isset( $clicks['clicks'] ) ) ? $clicks['clicks'] : $clicks['error'] ;
	}

	/**
	 *
	 * @since 1.0.0
	 * @param string $x_login
	 * @param string $x_apiKey
	 * @return bool $valid
	 */
	function is_validate( $x_login, $x_apiKey ) {

		/* Parámetros. */
		$args['x_login'] = $x_login;
		$args['x_apiKey'] = $x_apiKey;

		/* Obtiene la respuesta de Bit.ly. */
		$json = $this->get_bitly_service( 'validate', $args );

		/* Si no hay respuesta de Bit.ly, retorna false. */
		if ( empty( $json ) )
			return false;

		/* Retorna la respuesta de Bit.ly. */
		return (bool) $json['data']['valid'];
	}

	/**
	 * Verifica si un nombre de dominio esta registrado en Bit.ly.
	 * 
	 * @since 1.0.0
	 * @param string $domain Nombre de dominio (Ej. snipt.me)
	 * @return bool $bitly_pro_domain Retorna TRUE si el dominio es usado con Bit.ly y FALSE en caso contrario
	 */
	function is_pro_domain( $domain ) {

		/* Parametro. */
		$args['domain'] = $domain;

		/* Obtiene la respuesta de Bit.ly. */
		$json = $this->get_bitly_service( 'bitly_pro_domain', $args );

		/* Si no hay respuesta de Bit.ly, retorna false. */
		if ( empty( $json ) )
			return false;

		/* Retorna la respuesta de Bit.ly. */
		return (bool) $json['data']['bitly_pro_domain'];
	}

	/**
	 *
	 * @since 1.0.0
	 * @param string $x_login
	 * @param string $x_password
	 * @return bool $successful
	 */
	function is_authenticate( $x_login, $x_password ) {

		/* Parámetros. */
		$args['x_login'] = $x_login;
		$args['x_password'] = $x_password;

		/* Obtiene la respuesta de Bit.ly. */
		$json = $this->get_bitly_service( 'authenticate', $args );

		/* Si no hay respuesta de Bit.ly, retorna false. */
		if ( empty( $json ) )
			return false;

		/* Retorna la respuesta de Bit.ly. */
		return (bool) $json['data']['authenticate']['successful'];
	}

	/**
	 * Obtiene la información de un Shortlink/Hash (o múltiples).
	 *
	 * @since 1.0.0
	 * @param array|string $parameters
	 * @return array $info
	 */
	function get_info( $parameters ) {

		/* Genera los parámetros. */
		$args = $this->get_multiple_query( $parameters );

		/* Obtiene la respuesta de Bit.ly. */
		$json = $this->get_bitly_service( 'info', $args );

		/* Si no hay respuesta de Bit.ly, retorna false. */
		if ( empty( $json ) )
			return false;

		/* Obtiene los datos de la respuesta de Bit.ly. */
		$count = count( $json['data']['info'] );

		if ( 1 === $count )
			$info = $json['data']['info'][0];

		else
			$info = $json['data']['info'];

		/* Retorna la respuesta de Bit.ly. */
		return $info;
	}

	/**
	 * Esta función ayuda a generar la cadena de consultas multiples
	 * de 'shortUrl' y 'hash'.
	 *
	 * @since 1.0.0
	 * @access private
	 * @param array|string $args
	 */
	private function get_multiple_query( $args = '' ) {

		if ( is_string( $args ) ) {

			if ( preg_match( '#http://#i', $args ) )
				$param['shortUrl'] = urlencode( $args );

			else
				$param['hash'] = $args;
		}

		else if ( is_array( $args ) ) {

			$short = array();
			$hash = array();

			foreach( $args as $arg ) {

				if ( preg_match( '#http://#i', $arg ) )
					$short[] = urlencode( $arg );

				else
					$hash[] = $arg;
			}

			if ( !empty( $short ) )
				$param['shortUrl'] = join( '&shortUrl=', $short );

			if ( !empty( $hash ) )
				$param['hash'] = join( '&hash=', $hash );
		}

		return $param;
	}

	/**
	 * Regresa una petición de Bit.ly en formato JSON de acuerto con
	 * el servicio solicitado y los parámetros asignados.
	 *
	 * @since 1.0.0
	 * @access private
	 * @param string $service Servicio al que se realizará la petición
	 * @param array $parameters Parámetros para especificar la salida de la petición
	 */
	private function get_bitly_service( $service, $parameters ) {

		/* Variable que requiere ser inicializada. */
		$response = '';

		/* Agrega los datos del usuario para ingresar al servicio de Bit.ly. */
		$parameters['login'] = $this->login;
		$parameters['apiKey'] = $this->apiKey;
		$parameters['format'] = 'json';

		/* Genera una cadena para realizar la petición a Bit.ly. */
		foreach( $parameters as $parameter => $value )
			$query[] = "{$parameter}={$value}";

		$query = join( '&', $query );

		$url = "http://api.bit.ly/v3/{$service}?{$query}";

		/* Obtiene respuesta del servidor de Bit.ly. */
		$handle = curl_init();

		curl_setopt( $handle, CURLOPT_CONNECTTIMEOUT, 5 );
		curl_setopt( $handle, CURLOPT_TIMEOUT, 5 );
		curl_setopt( $handle, CURLOPT_URL, $url );
		curl_setopt( $handle, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $handle, CURLOPT_HEADER, false );

		$response = curl_exec( $handle );

		curl_close( $handle );

		/* Retornar la respuesta de Bit.ly. */
		if ( !empty( $response ) ) {
			$response = @json_decode( $response, true );

			if ( 200 == $response['status_code'] && 'OK' == $response['status_txt'] )
				return $response;
		}

		return false;
	}
}

?>
