<?php

namespace PseudoVendor\PseudoTheme\Access;

class Route extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return 'router';
    }
}
