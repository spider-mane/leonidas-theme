<?php

namespace PseudoVendor\PseudoTheme\Access;

class Mailer extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return 'mailer';
    }
}
