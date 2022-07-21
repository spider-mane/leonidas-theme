<?php

namespace PseudoVendor\PseudoTheme\Facades;

use Leonidas\Library\System\Model\PostType\PostTypeFactory;

class PostType extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return PostTypeFactory::class;
    }
}
