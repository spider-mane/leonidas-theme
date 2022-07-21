<?php

use League\Container\Container;
use Panamax\Adapters\League\LeagueAdapter;

defined('ABSPATH') || exit;

$root = dirname(__DIR__, 1);

/**
 *==========================================================================
 * Create Container
 *==========================================================================
 *
 * Leonidas is a container-agnostic framework. You can use any container you
 * want so long as it is an implementation of the psr-11 standard. We've
 * included an implementation provided by The PHP League to get things going.
 *
 * @link https://container.thephpleague.com/
 * @link https://www.php-fig.org/psr/psr-11/
 *
 */

$container = new Container();

/**
 *==========================================================================
 * Populate Container
 *==========================================================================
 *
 * If you want to define services in your container using it's native api, this
 * is one of many contexts you can do it from.
 *
 */

$container->add('example', stdClass::class);

/**
 *==========================================================================
 * Return Container
 *==========================================================================
 *
 * If your container implementation of choice is not also an implementation of
 * Panamax\Contracts\ServiceContainerInterface, package it in an adapter
 * implementing Panamax\Contracts\ContainerAdapterInterface. Using an adapter
 * allows Leonidas and third-party libraries to handle much of the heavy lifting
 * without requiring a specific implementation.
 *
 */

return new LeagueAdapter($container);
