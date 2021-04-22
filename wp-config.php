<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'piilmanndesigns_dkbabushka_database' );

/** MySQL database username */
define( 'DB_USER', 'piilmanndesigns_dkbabushka_database' );

/** MySQL database password */
define( 'DB_PASSWORD', '3550Uvelse' );

/** MySQL hostname */
define( 'DB_HOST', 'piilmanndesigns.dk.mysql' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Yrg2RA3DTd|erIh@usw_K9jO@~3A#-P/UVg{4Ba|Ao)Q)kWcN|%YK1+Z7qNQTJ7?' );
define( 'SECURE_AUTH_KEY',  'ZaA+j%u.fb`Ov,q?3R``u5>N)p}.A-0pkNSoDPX$7:fc>{%]ms6s]#x&@Z=<m?1a' );
define( 'LOGGED_IN_KEY',    'qos%WF^j[vmAUi|VhSZUy0Aae75}OFd4bj0qZD]S^bNhXehW[`zK$()R+*]VU|5M' );
define( 'NONCE_KEY',        '}$zsNhbA88j?F~]$/~(:+g=5wxT+&-eM^LS)8?C1mjg;OT@P/%OSWXS;95p(SyCx' );
define( 'AUTH_SALT',        '&uapkUXgMa#<2}CRY*$2,G~u?=N%P9D.DhNg2Ksn2_<s6Lnn!=@df?UW^N =ye@^' );
define( 'SECURE_AUTH_SALT', 'RSmVL09KGRANb::ob&ow|$-_Eqeb{Ai$p.;vv*G[$eyry_h`f|n0U@yfry3Jd+XT' );
define( 'LOGGED_IN_SALT',   'K>^3s-J0/bD;rJ/~0Ice5M}$92I;CKQPw$@AIAj6,-,wp-TRH]o-5p*2`yOq|Z:j' );
define( 'NONCE_SALT',       'I3+4*<6$jWy<9xmsP`nIm ]G$F>[&10qSAK[#j/xkMf aI6{!4PYf3=.vl+tYy:/' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'loudwp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
