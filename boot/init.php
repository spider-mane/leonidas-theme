<?php

defined('ABSPATH') || exit;

$root = dirname(__DIR__, 1);

if (file_exists($autoload = "$root/vendor/autoload.php")) {
    require_once $autoload;
}

require __DIR__ . '/functions.php';
require __DIR__ . '/constants.php';
