<?php

namespace PseudoVendor\PseudoTheme\Facades;

use Leonidas\Library\Admin\Field\Factory\Field;

class AdminField extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return Field::class;
    }
}
