<?php

namespace PseudoVendor\PseudoTheme;

use Leonidas\Contracts\Extension\WpExtensionInterface;
use Leonidas\Framework\Theme\Abstracts\ThemeMasterClassTrait;
use PseudoVendor\PseudoTheme\Support\View;

final class Theme
{
    use ThemeMasterClassTrait;

    public static function base(): WpExtensionInterface
    {
        return static::$instance->base;
    }

    public static function display(string $view, array $data = []): void
    {
        echo View::render($view, $data);
    }
}
