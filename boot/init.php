<?php

defined('ABSPATH') || exit;

$root = dirname(__DIR__, 1);

/**
 *==========================================================================
 * Composer autoloader
 *==========================================================================
 *
 * Check for the Composer autoloader. If installed as an archived theme the
 * autoloader will be included. It won't be included if installed via composer.
 *
 */

if (file_exists($autoload = "{$root}/vendor/autoload.php")) {
    require_once $autoload;
}

/**
 *==========================================================================
 * Functions
 *==========================================================================
 *
 * Load any files with function declarations.
 *
 */

array_map(function ($path) use ($root) {
    require "{$root}/app/{$path}.php";
}, ['functions']);

/**
 *==========================================================================
 * Bootstrap
 *==========================================================================
 *
 * Load any additional boot scripts that should run before initiating the
 * launcher.
 *
 */

array_map(function ($path) {
    require __DIR__ . "/{$path}.php";
}, ['constants']);

/**
 *==========================================================================
 * Development
 *==========================================================================
 *
 * Load scripts to be used in development.
 *
 */

if (defined('PSEUDO_CONSTANT_DEVELOPMENT')) {
    // development bootstrapping
    if (file_exists($development = __DIR__ . '/development')) {
        array_map(function ($path) use ($development) {
            require "{$development}/{$path}.php";
        }, ['loaded']);
    }

    // theme playground
    if (file_exists($playground = "{$root}/.playground/theme.php")) {
        require $playground;
    }
}
