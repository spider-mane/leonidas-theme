<?php

namespace PseudoVendor\PseudoTheme\Facades;

use Leonidas\Framework\App\Forms\FormRepository;

class Forms extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return FormRepository::class;
    }
}
