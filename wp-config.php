<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'reesenews1');

/** MySQL database username */
define('DB_USER', 'reesenews');

/** MySQL database password */
define('DB_PASSWORD', 'X9unc1RFDN');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_CACHE', true);

define('WP_MEMORY_LIMIT', '128M');

define('ALTERNATE_WP_CRON', true);

define('FTP_USER','reeseadmin');
define('FTP_PASS','r33seftp!');
define('FTP_HOST','205.186.148.67');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '3f`+?PE?`MRL7&`T>Nm2c/&9|(Sz-r3uj36MljUq&hr.Rw^TCS2<=fkQcl-5xkR?');
define('SECURE_AUTH_KEY',  ' ?.ajBGH{NVt|;c0IuABI`68L4~2!vY79$;4)leV<X{n_@GE1+k%*q..#f&>k:{5');
define('LOGGED_IN_KEY',    '(2cT(,mBI22nT6%{}mB|Hoh?IqCIG7gGH.>m6xu<pOkn|s4MZ.|as23yDubNTXw:');
define('NONCE_KEY',        ']b8+#R^xY:OreEMi~uT0Edq]RZs^tz]E,!)gJj5-t+f?-B}PRul-?BMi6Jjx3~o*');
define('AUTH_SALT',        's9JB+mic!y%cr5S$1+l5f-{v)66V2X5c?)I,NtuGwkip2I]Mv~[+6?fb~-ej)K.y');
define('SECURE_AUTH_SALT', '_H]p1?JP[[|[m&<^SX1;F-+3CfV1ty$/%wbFYFK vmA ok8YrL%C4[7Q|;wGAAC ');
define('LOGGED_IN_SALT',   '1kW9:T4U]NRsBV@|kgrcDnJ@yq)|h^+@/VY@|za})q2z+RQvvh~n_G,.xee1J$iK');
define('NONCE_SALT',       '07?.tkt*>+bB}(B+Ft0?@V[(jQVqxey4TBkP%E6Y*IsjL%3cydxvrE2# u`Jss4{');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);
define('WP_ALLOW_MULTISITE', true);


define( 'SUNRISE', 'on' );
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', false );
$base = '/';
define( 'DOMAIN_CURRENT_SITE', 'reesefelts.org' );
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('WP_CACHE', true);
