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
define('DB_NAME', 'news');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'J;d/=*_%Ma${A*pc!5XipBLJx&`T4>/RpZcwB-d[55<+^iL9<CZ(]reU`;S>!k.8');
define('SECURE_AUTH_KEY',  'x#Cc;6ewd:om~1PR//vKW_F[e6|of6/hJiSR !%^&5Qn%Oij>E6Xpf=tIC{$CuNv');
define('LOGGED_IN_KEY',    'NZ)i6~BVW$X^(~/jEEfRc+ro-VmgUqGz=n}wT[v49:lZ/WK&*0kB=r=~SJf`pVl}');
define('NONCE_KEY',        'V)|b-;|R?ZN~|(:tEQ-Ga0F5`ZOSe+q#zF?jdn =q@6!KL`)oy[Z;jUc!5FMW FE');
define('AUTH_SALT',        '8nr1*Bey?)41w{m6nb3>Qd>^sK#.2q Z-CgY+YH.==RDAUp+kA4JufZTw#g4>p u');
define('SECURE_AUTH_SALT', '8(0g sa31URar9&YL)Lw.EP=GHtHw$G?10PB:{B.+$dD|vVKa9veruiMGczKE+~!');
define('LOGGED_IN_SALT',   'I@G@4q(jiRZ:L%{A<rK(o7w3y7kTQ6;]*.)y}Nd`EDTED5H#C}5i1fd5fpTLd526');
define('NONCE_SALT',       'a1i5ztqphu05Rj9[d^8MVD~@/bQ<5M[qSwC8hgl#-bGCM+0vzoI{Y8NKEz989Bw)');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'news_';

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
