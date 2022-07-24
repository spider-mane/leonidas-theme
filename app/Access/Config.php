<?php

namespace PseudoVendor\PseudoTheme\Access;

/**
 * @method static mixed get(string $key, $default = null)
 * @method static mixed has(string $key)
 */
class Config extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return 'config';
    }
}
