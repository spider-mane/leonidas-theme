<?php

namespace PseudoVendor\PseudoTheme\Facades;

use Twig\Environment;

class Twig extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return Environment::class;
    }
}
