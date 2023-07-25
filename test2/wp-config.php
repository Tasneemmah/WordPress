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
define( 'DB_NAME', 'test2' );

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
define( 'AUTH_KEY',         '-g5S=A<:H[A0POD(,kq|XlAL>qRL*($dRPK&aF0U?Td,l]:GnFW4>C^(w@yERaHn' );
define( 'SECURE_AUTH_KEY',  '+S/(SFUwqk>fjofiVbhf%PS}j)bDC3(bul^N$.I`o,+Q?ssN^$)Xdj(efNnP`G~~' );
define( 'LOGGED_IN_KEY',    'R5Qw&l,?Y>S_)GHsiYhXe`CdC@vE[0sVOrER.]*s*a /]zFOtm82u`#rNF F 2:E' );
define( 'NONCE_KEY',        'nB@7A0eOq.@8cS`SS;4YII.TDZE.Yl}LA/3:Wa7] uHY,U+#P (u(OxCZXR@}-R#' );
define( 'AUTH_SALT',        'qS7*biwa62T``[v @#R36pERJIr%dK!NS2YJbo|L.ha!*q.Bh5#M]Y@1qy>k-LgW' );
define( 'SECURE_AUTH_SALT', 'YSc4fXqnLS41 {m2.V9gPfM;^|3d.Y%c5jKBW.)r/x,*i.<WcCwU$.va#SHbNk$t' );
define( 'LOGGED_IN_SALT',   '@S 2-|$D`(uG d{HIA*ZgDUBpud870gKGG;Sr6+ILO}dj:[y~=0`mLiY~pwb01h/' );
define( 'NONCE_SALT',       'Q.>,d8BEqwLHh%]7)EWy:,[;2PL:c4-V1SN:8u4/-I,n!KmH<@0|bO%1;i NtIUm' );

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
