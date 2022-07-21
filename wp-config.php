<?php

use WebTheory\WpCliUtil\WpCliUtil;

use function Env\env;

/**
 *==========================================================================
 * WordPress Base Config
 *==========================================================================
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 */

call_user_func(function () {
    require_once __DIR__ . '/boot/development/runtime.php';
});

define('WP_DEFAULT_THEME', basename(__DIR__));

define('DB_NAME', env('DB_NAME'));
define('DB_USER', env('DB_USER'));
define('DB_PASSWORD', env('DB_PASSWORD'));
define('DB_HOST', env('DB_HOST'));
define('DB_CHARSET', env('DB_CHARSET') ?? 'utf8');
define('DB_COLLATE', env('DB_COLLATE') ?? '');

define('WP_HOME', env('WP_HOME'));
define('WP_SITEURL', env('WP_SITEURL') ?? WP_HOME);

if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/' . WpCliUtil::getInstallPath() . '/');
}

$table_prefix = env('DB_PREFIX') ?? 'wp_';

require_once ABSPATH . 'wp-settings.php';
