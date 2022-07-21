<?php

namespace PseudoVendor\PseudoTheme\Facades;

use Leonidas\Library\System\Model\Taxonomy\TaxonomyFactory;

class Taxonomy extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return TaxonomyFactory::class;
    }
}
