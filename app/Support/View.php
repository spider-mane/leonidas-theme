<?php

namespace PseudoVendor\PseudoTheme\Support;

use PseudoVendor\PseudoTheme\Facades\Twig;
use PseudoVendor\PseudoTheme\View\Models\Defaults;

class View
{
    public static function render($view, array $data = []): string
    {
        return Twig::render(
            static::getTemplate($view),
            static::getFullContext($data)
        );
    }

    protected static function getTemplate(string $view): string
    {
        return 'routes/' . str_replace('.', '/', $view) . '.twig';
    }

    protected static function getFullContext(array $extra): array
    {
        return $extra + Defaults::getData();
    }
}
