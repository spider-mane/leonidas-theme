<?php

namespace PseudoVendor\PseudoTheme\Facades;

class Mailer extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return 'mailer';
    }
}
