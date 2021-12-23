<?php

use Dotenv\Dotenv;
use WebTheory\Config\Config;
use WebTheory\Exterminate\Exterminator;

$root = dirname(__DIR__, 2);

require_once "$root/vendor/autoload.php";

/**
 * Load environment variables from .env
 */
Dotenv::createUnsafeImmutable($root)->load();

/**
 * Get development configuration
 */
$config = new Config("$root/config/development");

/**
 * Establish that theme is in a development environment
 */
define('PSEUDO_CONSTANT_DEVELOPMENT', true);

/**
 * Initiate debug support
 */
Exterminator::debug($config->get('debug'));

/**
 * Return development configuration
 */
return $config;
