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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         ')C# ImgO[6/TcP3AD)/}!~$8VZw{A.vmgd`c]VGYTk7fM%yum7c@!D@Lo~0|Vm@q');
define('SECURE_AUTH_KEY',  '$}ie)gIN4J7Ja%k3Ez($@rnGwDr#[UaB+Qm.USIp=~q=XYu7AD1eY4A.PqD&j4c`');
define('LOGGED_IN_KEY',    't:~#adg@1$nq63h4g2+c|Nm0|CjABR4U8O:3i;N{ 8E2kz)TS4v/AZxp}_Q?ARw:');
define('NONCE_KEY',        '{2H>6e>%*CSE>.,A?cbdQ]%.kFK]zH(mCGa}<.deOM3c|z.EU-6}U63DeM$U&r3C');
define('AUTH_SALT',        'an`&]ob_PLM(9m8pE_/w_<`F[nz!|}F3_sqKJi8U.B1|vr]Rq8o/]jTc|MtpSP)#');
define('SECURE_AUTH_SALT', 'qNKEh4p%P6m|a*h#HY9ORI6i9:igQR)@EaK2,0xZKMWOkNCAeh^B&=RF)x(Z^|:u');
define('LOGGED_IN_SALT',   '_ a7Q![m{;J.8vQU=!3/._LevHL&#5i( d+0FQ)qCLrcu};*=pim<n!@<Fpv<(IN');
define('NONCE_SALT',       '8:@v#d.lPxq*8jjCo,VK&w[*9D^FpAW#61<As=#^xGJM-&uenxymjzX$7IUBS,H]');

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
