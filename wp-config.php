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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'db_changetest');

/** MySQL database username */
define('DB_USER', 'userchangetest');

/** MySQL database password */
define('DB_PASSWORD', '!Berry1984');

/** MySQL hostname */
define('DB_HOST', '213.171.200.85');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'RSRgzyrH9yHO1IWor728UzDQZ9dCgcNAHH0THVyI2n8yAYhsM7tR2a3mPrOASLaA');
define('SECURE_AUTH_KEY',  '9wbAFrIDiHpqtfXr2wxBtR4qguXsSDrWAK2AfrKy8IbH2tvpVqCNcu2GfFrfPQK1');
define('LOGGED_IN_KEY',    'tYIDj3G9fTkeE15G8VdKKNBJx7Tv7r8MJDorwel9xDmRQP5H1b4SBX9gZk9YOjJu');
define('NONCE_KEY',        '2fGyssfGycKW7MCPwESgr9NTdtX0SmAJSCZSUdGk4x7Im8TpC4J4AQXQtin9usCU');
define('AUTH_SALT',        'JM0Qi0tfZggZCGQkmiXoYuXbBmtdDv3Sc12LpBBK58wt9JhDWUex4i8fcTMPnZyv');
define('SECURE_AUTH_SALT', 'AE0dMNxY8UD84145YOggBUKkXwiGXRGhlpIKOcb2m1qFh7LKolIRynXjIRVtY9rW');
define('LOGGED_IN_SALT',   'hb2vS3nJXXLrE77t1ernjZHOjoPAF2GC8CZ04yGpXV8uZAHs7yJdi1Sa7PaPGejz');
define('NONCE_SALT',       'lgCwU5gZPxRugOQjV8z9TvwQ45ZZcTBm22FuG3FbbZYaUxfMfafFkJrCqsc3kysi');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
