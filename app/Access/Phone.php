<?php

namespace PseudoVendor\PseudoTheme\Access;

use Leonidas\Framework\Access\PhoneNumberUtilFacadeTrait;
use libphonenumber\PhoneNumberUtil;

class Phone extends _Facade
{
    use PhoneNumberUtilFacadeTrait;

    protected static function _getFacadeAccessor()
    {
        return PhoneNumberUtil::class;
    }
}
