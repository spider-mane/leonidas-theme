<?php

namespace PseudoVendor\PseudoTheme\Facades;

use WebTheory\Saveyour\Factory\FieldFactory;

class FormField extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return FieldFactory::class;
    }
}
