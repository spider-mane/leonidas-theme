<?php

use function Env\env;

$root = dirname(__DIR__, 2);

return [

    /**
     *==========================================================================
     * Debug
     *==========================================================================
     *
     *
     */
    'enable' => env('DEBUG_ENABLE') ?? true,


    /**
     *==========================================================================
     * Display Errors
     *==========================================================================
     *
     *
     */
    'display' => env('DEBUG_DISPLAY') ?? true,


    /**
     *==========================================================================
     * Error Log
     *==========================================================================
     *
     *
     */
    'log' => "$root/logs/pseudo-theme.log",


    /**
     *==========================================================================
     * Editor
     *==========================================================================
     *
     *
     */
    'editor' => env('DEBUG_EDITOR') ?? 'phpstorm',


    /**
     *==========================================================================
     * Environment
     *==========================================================================
     *
     *
     */
    'system' => [

        'host_os' => env('HOST_OS'),

        'host_path' => env('HOST_PATH'),

        'guest_path' => env('GUEST_PATH'),
    ],


    /**
     *==========================================================================
     * Error Logger (Monolog)
     *==========================================================================
     *
     * @link https://seldaek.github.io/monolog
     */
    'error_logger' => [

        'channel' => env('LOG_CHANNEL') ?? 'errorlog',
    ],


    /**
     *==========================================================================
     * Error Handler (Whoops)
     *==========================================================================
     *
     * @link http://filp.github.io/whoops
     * @link https://github.com/nunomaduro/collision
     */
    'error_handler' => [

        // options
    ],


    /**
     *==========================================================================
     * Var Dumper (Symfony)
     *==========================================================================
     *
     * @link https://symfony.com/doc/current/components/var_dumper
     * @link https://symfony.com/doc/current/components/var_dumper/advanced
     */
    'var_dumper' => [

        'root' => $root,

        'theme' => env('VAR_DUMP_THEME') ?? 'dark',

        'server_host' => env('VAR_DUMP_SERVER_HOST') ?? 'tcp://127.0.0.1:9912',
    ],


    /**
     *==========================================================================
     * Ini Directives
     *==========================================================================
     *
     * @link https://www.php.net/manual/en/errorfunc.configuration
     */
    'ini' => [

        // directives
    ],


    /**
     *==========================================================================
     * Xdebug Settings
     *==========================================================================
     *
     * @link https://xdebug.org/docs/all_settings
     */
    'xdebug' => [

        'cli_color' => 1,

        'var_display_max_children' => 256,

        'var_display_max_data' => 1024,

        'var_display_max_depth' => 10,
    ],

];
