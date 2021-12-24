<?php

use WebTheory\Config\Interfaces\ConfigInterface;

ob_start();

/** @var ConfigInterface $config */
$config = require_once __DIR__ . '/setup.php';

/**
 * WordPress debug settings
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress
 * @link http://github.com/spider-mane/wpdmc
 */
define('WP_DEBUG',                       $config->get('debug.enable', true));
define('WP_DEBUG_DISPLAY',               $config->get('debug.display', true));
define('WP_DEBUG_LOG',                   $config->get('debug.log', true));
define('SCRIPT_DEBUG',                   $config->get('debug.wp.scripts', true));
define('WP_CACHE',                       $config->get('debug.wp.cache', false));
define('SAVEQUERIES',                    $config->get('debug.wp.queries', true));
define('WP_DISABLE_FATAL_ERROR_HANDLER', $config->get('debug.wp.handler', true));
define('WP_DEBUG_MODE_CHECKS',           $config->get('debug.wp.checks', false));

/**
 * Other helpful settings for use in development
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 */
define('DISALLOW_FILE_MODS', true);
define('AUTOMATIC_UPDATER_DISABLED', true);
define('WP_AUTO_UPDATE_CORE', false);
