<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bydhado1_leadershub' );

/** Database username */
define( 'DB_USER', 'bydhado1_userleadershub' );

/** Database password */
define( 'DB_PASSWORD', 'leadershub123@' );

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
define( 'AUTH_KEY',         ' Ur5?MQVGdg>&ZWysm]ao*n6V^Z4RXiCyAq#hE_o4aIk>jQ9<]?t%m:W;f&OGgaf' );
define( 'SECURE_AUTH_KEY',  ':_+Ig%Sc6*K {}`gt@c[L0&KO2edt]3KkDP]{Zj>i8*#D;P7P1KczsWTvCG| DJ)' );
define( 'LOGGED_IN_KEY',    '?CacY>Wf,B}k$0FcS;GT??oT~o$H+.&XbjY[Z0|Ig:fux,yFS|v}NI#0u$n=YCY_' );
define( 'NONCE_KEY',        ' xC}lq|c*i_+= iAM(>hQoyhJx[(y5U6oIb,XvMh;RZ!/iGl-Y+g8Bb0FM)(}&]-' );
define( 'AUTH_SALT',        '(C$wj<-h)p _I0@u=O:_~QjdW3&}Iw</|R2+58j^!6+3S(A{IRN577HXG9JymE`A' );
define( 'SECURE_AUTH_SALT', 'PU.[GA`81d#imIA|pjv=,+wG__&4-:oU;tB2#fibf`p50vw**Ka*q3.nFDSGo76H' );
define( 'LOGGED_IN_SALT',   '^k$,tb1tJibm&1qket+V<&pT>#|6fG*yPV|Q][b`1.7#(FIxiVp)oO*TYtEh5feu' );
define( 'NONCE_SALT',       '%?d]X_*zv>!.FF(I_# uR:D{ipF^;#2YeuHt>b@m1<Zj*Zdp=*MU}Wv]8/o%y8oA' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
