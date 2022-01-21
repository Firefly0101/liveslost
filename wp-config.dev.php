<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

//define( 'WP_HOME', 'https://sace-dev.fireflydigital.dev' );
//define( 'WP_SITEURL', 'https://sacs-dev.fireflydigital.dev' );

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/Users/cfrost/vhosts/liveslost.info/public_html/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'liveslost_info');

/** MySQL database username */
define('DB_USER', 'fireflyoz');

/** MySQL database password */
define('DB_PASSWORD', 'uZDvEK4*pvq7');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'nmcNb0iU Zn)!&7U3>el}2M]*|(hM7;jF)#zwtq6t:JH0vPLk~Sn|Ks`CiDpMI/-' );
define( 'SECURE_AUTH_KEY',  '@#IUb#S27g(5sEPCY+Om,NqRAW{7<V$7PnNLJmR;AR.-+4)B fSjt2]RS}:uN(RR' );
define( 'LOGGED_IN_KEY',    'Ucd{g/>7[=5z{*?Z$dhG=G.HGb03U.RCG]dml=zK^{m(STyJE$I|#[{KU-%@I-7r' );
define( 'NONCE_KEY',        '%cTgiSDPEXwtA>1V*Fxh-r8:0+GvZ0y~H4iWAKpI3xP$7yuaI`{Pir`GCX{Li`Kg' );
define( 'AUTH_SALT',        'Vs!>*IiGy-&A+wg|X#] Zlj2_2*@<a*U 4;K)R6C8S%@ZmedH`%jv?[&GK1&qO4U' );
define( 'SECURE_AUTH_SALT', 'tUW/7P/pd^ OWk^j>DRi:np1B|]%YDB3^Y-BM;f}eXqZ17!%D1,}xGn9Z`Wv/IW ' );
define( 'LOGGED_IN_SALT',   'LA7xt2%}T*T]Hl;!|S=xUb>5w#uutfPqNzMrKF3OTPA<]{N<=Ro_}rH4ei@PH<_W' );
define( 'NONCE_SALT',       'SwC|y]_wUTo4:W)G.x@EBN+SRVH,3cbl>{_pcDJT*w(D+qZ],M9LNH{S^E>,q7`m' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

// auto minor updates
define( 'WP_AUTO_UPDATE_CORE', 'minor' );

// disable file editing
define('DISALLOW_FILE_EDIT', true);
// Check if the servers IP address is in the list, if it isn't enable DISALLOW_FILE_MODS.
$ip = $_SERVER['REMOTE_ADDR'];
$hosts = ['::1', '127.0.0.1', '192.168.10.1', '203.219.111.2', $_SERVER['SERVER_ADDR']];
if( !in_array($ip, $hosts) ) {
	define('DISALLOW_FILE_MODS', true);
}

// auto minor updates
define( 'WP_AUTO_UPDATE_CORE', 'minor' );

// gravity forms
define("GF_LICENSE_KEY", "acf908ec6bfcf05224f5a40a2d8174d8");


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
