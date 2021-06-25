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
define( 'DB_NAME', 'base-de-datos-' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '4QeRQuA0lksxC9ZWjCTII202FfcD6KKcSDSjk6WkqntwFc8Y0LjC08bSzDSbGtqd' );
define( 'SECURE_AUTH_KEY',  'o61PFjPRgVv5alATBPLTnqz7oVPbbaEhWiA701sjaRGKR8dGzSzbRbnsHuuFeUAs' );
define( 'LOGGED_IN_KEY',    'nmGWHmX4yDQstWolta1DgkVU8Y6MQ0wG39QHfFFQR3E93RNXIO34CSjNS0GFyG69' );
define( 'NONCE_KEY',        'xDpu9i0v0hxqoRBy4WyB4uPRQQ3RelpqDTkoHW28znKWIcEXvQpLRLogxpAoZMVB' );
define( 'AUTH_SALT',        'vU6BalhGrZSPGso1WhMmWobFzSisTkiOJJAZMBeEhzIjTWedFLTDCtkAJ5Lojxrh' );
define( 'SECURE_AUTH_SALT', 'gWjtazt94827fw356MQlv0fStl5xSnRlaIWtLJgc3GHZuNJugVAnbeuM4xr0NoBG' );
define( 'LOGGED_IN_SALT',   'KvsIAZ7HckE3SCAwaCV1K32oRzPoNBqkSkskapyGMA1vlMkGqsqQxKrMa8xM6Iiq' );
define( 'NONCE_SALT',       'tHkwczsVLNpJFtZXRIrDaVvKATPTksk9TOBjKCo8xmtAwSWP6Lt7b0UCf0BKTP6b' );

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
