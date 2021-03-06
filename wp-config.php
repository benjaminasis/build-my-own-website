
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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'benjpogi' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '?{@``k4YHxGJV62+!MmPY-r{^rrqx//Jnj,>][9-w+yexu0!QvKETCoaCHQ+/TOG' );
define( 'SECURE_AUTH_KEY',  '1.wX2P{}OQy3*Y+$H*TK/Z#o&3Kr2}@HAUoH<bHfn>$m&msjLMG+q0)UL]-Tt9l ' );
define( 'LOGGED_IN_KEY',    '8k@Y=LtFAKIKLIG;@J<mfN#?H)ga69:+*(I1/z5buvx|BNrfbu`!_UM+&h@]7JOR' );
define( 'NONCE_KEY',        'G(O+qnZs+lG@=0}E*3*E]%qZd&bP/s{87#OJ,g!aKRtYA!2r5r!i9`+{}a^TGZFY' );
define( 'AUTH_SALT',        'ZhfJ#N@(CR6MV:Ss&;)$~@CR>ulMxuw_3J?@[-Vyop<qjw1)Gir`GuORItmMjeaY' );
define( 'SECURE_AUTH_SALT', '[}Y*sjEc*q6vg2I+OL/:5BD|W1{. ^`GI`m=iLUE,ytJg k.<f`0dOQJ%_4F(_b<' );
define( 'LOGGED_IN_SALT',   'V<cAMe_wDV J&o`&PK6&gqa=4=g:aI#+6iCYA<R{QU|A_]q#^U^:3IHW? J(n,`/' );
define( 'NONCE_SALT',       'G#bu9%t-Ugp/XCh#(M#w5/]q-%]*Mq<0ohmw EC9KnC1P9Kj}b4j28~-V:7imDZ2' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/*define('WP_HOME','https://asisexpressonline.com');*/
/*define('WP_SITEURL','https://asisexpressonline.com');*/

define('FORCE_SSL_ADMIN', true);
// in some setups HTTP_X_FORWARDED_PROTO might contain 
// a comma-separated list e.g. http,https
// so check for https existence
if (strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false)
       $_SERVER['HTTPS']='on';

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
