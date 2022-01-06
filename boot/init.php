<?php

defined('ABSPATH') || exit;

$root = dirname(__DIR__, 1);

// composer autoloader
if (file_exists($autoload = "$root/vendor/autoload.php")) {
    require_once $autoload;
}

// theme functions
array_map(function ($path) use ($root) {
    require "{$root}/app/{$path}.php";
}, ['helpers']);

// constants
require __DIR__ . '/constants.php';
