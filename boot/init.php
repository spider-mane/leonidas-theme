<?php

defined('ABSPATH') || exit;

$root = dirname(__DIR__, 1);

/**
 *==========================================================================
 * Autoloader
 *==========================================================================
 *
 * Check for the Composer autoloader. If installed as an archive the autoloader
 * will be included. It won't be included if installed via composer.
 *
 */

if (file_exists($autoload = "{$root}/vendor/autoload.php")) {
    require_once $autoload;
}

/**
 *==========================================================================
 * Bootstrap
 *==========================================================================
 *
 * Load any boot scripts that should run before the launcher is initiated.
 *
 */

array_map(function ($path) {
    require __DIR__ . "/{$path}.php";
}, ['functions']);

/**
 *==========================================================================
 * Development
 *==========================================================================
 *
 * Load scripts to be run during development.
 *
 */

if (defined($dev = 'PSEUDO_THEME_DEVELOPMENT') && constant($dev)) {
    require __DIR__ . '/development/loaded.php';
}
