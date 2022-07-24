<?php

namespace PseudoVendor\PseudoTheme\Access;

use WebTheory\Saveyour\Factory\FieldFactory;

class FormField extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return FieldFactory::class;
    }
}
