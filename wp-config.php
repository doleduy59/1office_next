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
define( 'DB_NAME', '1office_next' );

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
define( 'AUTH_KEY',         'zbvUAw@=[`u|,quL6b/)U&l8@${UH^,ipoJoQJdAH2s6F= e>>7e?eg{b6jQ/!@w' );
define( 'SECURE_AUTH_KEY',  'Livd4LsuU^>aC^%Oh:[QEU40+id@2J6W).C_%#JHhOF,.S^ay$sy=(FZla3XyRUE' );
define( 'LOGGED_IN_KEY',    'B3(p$3+Mg}&~QtJ#.)HSl[NpljdGV%d!?HG-/nt+#&o[+7ro<U-U_ !v!m)9 CzQ' );
define( 'NONCE_KEY',        'Y<5V#Ye~D<8*QeMDFc;vRJiqk1DLUC?wIeTqQL9Hh>V- u:t+J?j=fw[g*O_( BF' );
define( 'AUTH_SALT',        'icQqh0rxZT2!{B4u^@Ifeh]fJ/miBUz0VxZZX]_Mj=?@P[)Tr]kq2WD]|#tE1E~1' );
define( 'SECURE_AUTH_SALT', '[,juY3b8;ns-rO&9D,E.KT!|[VLejL4#vRQ=SZ?^|S%G(^ah+Gf;3$bS[=va;0h?' );
define( 'LOGGED_IN_SALT',   'Ef)I#hs,_|=AidPSQq?Y33.Lw&{1xUnWFz<Z$[,d!O#5UJ>GPv8%iO4v,GE. ;Cg' );
define( 'NONCE_SALT',       'xYXFk(OVbJj]qIU_Tk4SUY4nzi0HU@>&tFq+OhQQ$<az1f;ZkkxcmZ:Y@E-ro&5j' );

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
$table_prefix = 'wp_1office';

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */

// Temporary override to fix incorrect siteurl/home in database
define( 'WP_HOME', 'http://localhost/1office_next' );
define( 'WP_SITEURL', 'http://localhost/1office_next' );



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';