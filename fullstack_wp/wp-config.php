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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'fullstack_wp' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         '>#}2pp~)<T1S`#ly^??[,qsQ85ElRD%Cs2w;Y[kNxIm+u>0wf8z){@9cj58w}94O' );
define( 'SECURE_AUTH_KEY',  'RNhhd?_:`8Mn)s{_KkIHk`D9|G(u>!e.`S%BW*|]?z_Js]c78R%+w>3}omjdl)*N' );
define( 'LOGGED_IN_KEY',    'RKe5kdO7tC(s3d4xO$G**&?6i.)IBpP@X;FZ!aa__dXZ{!4VjLQga~r|eR8@pEX0' );
define( 'NONCE_KEY',        '&Fn&!l<#.+AXk@}yq!>Frzw<r+^k0z8YL,^{PIFt $hIW&d,hB19|<uZ%c T>jio' );
define( 'AUTH_SALT',        '3Hpn,+|1fPXOy/z7RTDlPwPfEq~1/~~IWA}WPj62}1bS7Acom[CY?;d+_b;%YjrJ' );
define( 'SECURE_AUTH_SALT', '}D[Q83B8:O3 S0NP&I1=3hIOep?pJ)+3]],-;JB5I=1J7g==zGk@JWKZg$|0,(FB' );
define( 'LOGGED_IN_SALT',   'J%GU{|(#o=pVwzL38pZKKjbN-NUjc{e L_X!-~g3#[ax(}B^a:7By-v&5 ;7cYK_' );
define( 'NONCE_SALT',       'c>N(Pbg}uv?lkv>&Fwm?Amkqv&-aQ;eA#fxQ:tYGN_E9U</vaXDfp{/+J=?_9y 6' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
