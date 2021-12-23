<?php

namespace PseudoVendor\PseudoPlugin\Facades;

use Twig\Environment;

class Twig extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return Environment::class;
    }
}
