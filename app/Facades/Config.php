<?php

namespace PseudoVendor\PseudoTheme\Facades;

/**
 * @method static mixed get(string $key, $default)
 * @method static mixed has(string $key)
 */
class Config extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return 'config';
    }
}
