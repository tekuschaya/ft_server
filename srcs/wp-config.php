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
 * @link https://wordpress.org/support/article/editing-wp-config-php/s
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         '<H&:Bt5,CiB-iZGL<;dI:l+5,QHwgzzoBRP-&,;6y!&_f,=PFeR ktL.uO!Ftk=3');
define('SECURE_AUTH_KEY',  'S&RVq)-?9mL:Bo;E.Vz7`R #J|7aD/c0yC 8^{~5|+QNQ^](q7|Gf_Ww~]ibK5R^');
define('LOGGED_IN_KEY',    'Q=h.F_K=@u|.JXZRS16WL7f.R9cT6j;g^(bV%#YWNihXVw]o0ZciMJ{2]leY8~mS');
define('NONCE_KEY',        '9->tp^:bU>8~YaLIqZ+IfNT}l8>@]+C-LP?srsp^|nRRgrZ|4&jil?Ib~YD.pCSH');
define('AUTH_SALT',        '+pCWCUaXqA3p-(a/ nwGaMQwNi*L.^l);EE*rQb+htm(7MnC!jh;.[<?@0Yaa(MA');
define('SECURE_AUTH_SALT', 'z7D:IvMv|kP%$.EP+<`|51@l9`+y hY-fV(f`$s4Q#XU<-dz/@ZR<8BXRBRn+XyH');
define('LOGGED_IN_SALT',   'u+0&*5U[z%]=0k /iZtuv+j~ozM+vTU{y >k0xrU~VSONmnCoe9Kw4W61M-L-UHY');
define('NONCE_SALT',       '9V-05^-O%+X,WFDufT !}!cLz]mAEOK.H#L r-I,W-QQFr+:w5G&!QFa)^X)}t]E');

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
