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
define( 'DB_NAME', 'tasneem' );

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
define( 'AUTH_KEY',         'nZsRwAYaA(s~iHtzNdPWvl)Fw<I#MKOAp >4OLAP-*Aj:uk0`rAS=i|I|R#Y88]h' );
define( 'SECURE_AUTH_KEY',  'R8dmTLx?U!t@@YxB`wIa|r&yO6mZ4rBHHf$y%qlu Lg1qmwoZ:}&fP~i$@:_4wcx' );
define( 'LOGGED_IN_KEY',    '-a8*|sA]zkuPxN&Kx&IE1$A=L`<f@CKj;}5}y&i@]QKTCnZ@,1:M~oe3qU/Z?gKX' );
define( 'NONCE_KEY',        'h;TH|%S*^R(`t@/.7DOE{xxO HAH[`{99M E[J1_)USGn<Uc0?B,2GJZlJNr1Sv)' );
define( 'AUTH_SALT',        '{`Dpgu#^q^ZYn-iEf,yAloXhLzA&w:kTJ8k&)J)K]~HUm6J9l/bSv}dXk3])pimm' );
define( 'SECURE_AUTH_SALT', 'V3A@N@+s1F>rn~St{cAcx&vd eVS%Xu}a[/gmhBLZ>mlw9Gk8Y9*X]KRS)qI~60&' );
define( 'LOGGED_IN_SALT',   ',dt/~n4?,p^fOWt-A9`/7+fh;IO)v=TA[J[SPql%Ob8#qD0gCt~r3<Y*#@}$g}uy' );
define( 'NONCE_SALT',       '?WK>jwbgcl,Hd)VXoIUTbh*(y1-t8.>64lPZIdQ.N9zyO<MU>t$YHYoSCM.e=gIA' );

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
