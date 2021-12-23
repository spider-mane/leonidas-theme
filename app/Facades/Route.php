<?php

namespace PseudoVendor\PseudoPlugin\Facades;

use Slim\Interfaces\RouteCollectorProxyInterface;

class Route extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return RouteCollectorProxyInterface::class;
    }
}
