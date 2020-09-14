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
define( 'DB_NAME', 'project_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'hmiRTQIv{o;ZqnpAe?r^D^mmu_0AW)g^djAhXkA6|>sq*NVvzJu[$L$t`Wy|?uir' );
define( 'SECURE_AUTH_KEY',  'jJRNDhgd&@JJF=t]+8yA{ceZv`B&}WQUUKNa$wwFa5!Y(1rxt`j[X(,c5>T@o}&h' );
define( 'LOGGED_IN_KEY',    'gd}rv=bE$3J..`-CNYlLrQxf>KiP}Y!$=U>w.39k}10{cg@zHgNU=LW0],BxIk1+' );
define( 'NONCE_KEY',        '&@E[vm(D/%`3qhG(3NSysu;m*^Mr)9%Px`Hdi)f=7wTKvc:~&v3/OJ2H/-K&0->;' );
define( 'AUTH_SALT',        '?Cn1D/2O1.;m_B}o:nsOqh?7Qpu[E0^*Sx?jT/bf&5uOa`Fn||kQUsb6Pe1l `8g' );
define( 'SECURE_AUTH_SALT', 'Sf_OOd_2,#uRs-CaMTxi424IJMclT;x:S4J>tw&8}+0U1~|<&1,0jol)o;jg(`27' );
define( 'LOGGED_IN_SALT',   ']Ad|svtmRG7^>Jbptva(}^A??sOP8rBcoTfycti^K[INO8N9/B,8VD`ZnAgn&D/&' );
define( 'NONCE_SALT',       ';TU=@wvVbgaTXiNaAnVO]Aq+M?mh/#f}4^0V0p84]f`1w`kp  -<BT`~:|ET53A/' );
define('ALLOW_UNFILTERED_UPLOADS',true);

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
