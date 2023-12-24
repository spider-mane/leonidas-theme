<?php

namespace PseudoVendor\PseudoTheme\View\Helper;

use PseudoVendor\PseudoTheme\Access\Twig;
use PseudoVendor\PseudoTheme\View\Models\Defaults;

class View
{
    public static function render($view, array $data = []): string
    {
        return Twig::render(
            static::resolveView($view),
            static::getFullContext($data)
        );
    }

    protected static function resolveView($view): string
    {
        return 'routes.' . $view;
    }

    protected static function getFullContext(array $extra): array
    {
        return $extra + Defaults::getData();
    }
}
