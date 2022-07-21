<?php

namespace PseudoVendor\PseudoTheme\Facades;

class Route extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return 'router';
    }
}
