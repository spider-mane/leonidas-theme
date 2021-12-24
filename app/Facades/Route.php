<?php

namespace PseudoVendor\PseudoTheme\Facades;

use Slim\Interfaces\RouteCollectorProxyInterface;

class Route extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return RouteCollectorProxyInterface::class;
    }
}
