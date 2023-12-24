<?php

namespace PseudoVendor\PseudoTheme;

use Leonidas\Contracts\Extension\WpExtensionInterface;
use Leonidas\Framework\Theme\Abstracts\ThemeMasterClassTrait;
use PseudoVendor\PseudoTheme\View\Helper\View;

final class Theme
{
    use ThemeMasterClassTrait;

    public static function base(): WpExtensionInterface
    {
        return static::$instance->base;
    }

    public static function service(string $id): object
    {
        return static::instance()->base()->get($id);
    }

    public static function config(string $key, mixed $default = null): mixed
    {
        return static::instance()->base()->config($key, $default);
    }

    public static function display(string $view, array $data = []): void
    {
        echo View::render($view, $data);
    }
}
