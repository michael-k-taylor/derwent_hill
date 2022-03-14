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


$domainArray = explode('.', $_SERVER['HTTP_HOST']);
if(in_array('local', $domainArray)) {
    define( 'DB_NAME', 'derwent_friends' );
    define( 'DB_USER', 'root' );
    define( 'DB_PASSWORD', 'root' );
    define( 'DB_HOST', '127.0.0.1' );
}elseif(in_array('test', $domainArray)) {
    define( 'DB_NAME', 'derwent_friends' );
    define( 'DB_USER', 'root' );
    define( 'DB_PASSWORD', '' );
    define( 'DB_HOST', '127.0.0.1' );
}elseif(in_array('app', $domainArray)) {
    define( 'DB_NAME', 'derwent_friends' );
    define( 'DB_USER', 'derwent_friends' );
    define( 'DB_PASSWORD', 'xN8b43e_' );
    define( 'DB_HOST', '127.0.0.1' );
}

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
define('AUTH_KEY',         '}sc[Mt~;iJ@g]hc![*F+wO@jwJf)y:{[G`hND&rR;*$X 9g3;jTT$G[=,A9ip)e;');
define('SECURE_AUTH_KEY',  'FyrS)>w5-S$4&Zt)cQ5h@5tYgKcypy+)]Si{np3ARb_HVg~dNWaZE~P-{`Dd9gH@');
define('LOGGED_IN_KEY',    'XZs.!Z~#^+Ozx}0wQK|Ct;^:^GZ=?S[ i-,;re Vto1{Bw-{TC%~-C}.Iuur&a/i');
define('NONCE_KEY',        '<n ;Wa++?]++iv^`vi7MHr+vhr%Qj8lt9d_8QT:tp -/C(d&YJ!+6hrtz6HrLAEx');
define('AUTH_SALT',        '-6b$<_DyV!-[Zh}M3g+3KyzFf-?lznU}TyW*|W@$[e1Psdb6J+t4cy_J8t6r,k2o');
define('SECURE_AUTH_SALT', '5)eaOePkORkS4n.M+a)8J:o4KUd$@%55[++vmwjG:o4*c/lhiY:,UuGDl2QUwW++');
define('LOGGED_IN_SALT',   '_@]u?m-QFmT93fP>f?y]%shoY8x9c:,ho8?W1~4K2{*i4-0T7QSJyR#af{ba>94y');
define('NONCE_SALT',       '+O31~JS5V:%a$m;dn9rXZD2gH:f>$W@wTRE9):q:&OIk0=1#UcW4J(}13f&+cn18');

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
error_reporting(0);
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
