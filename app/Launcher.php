<?php

namespace PseudoVendor\PseudoTheme;

use Leonidas\Contracts\Extension\WpExtensionInterface;
use Leonidas\Framework\Exception\ThemeInitiationException;
use Leonidas\Framework\Theme\ThemeLoader;

final class Launcher
{
    private ThemeLoader $loader;

    private WpExtensionInterface $extension;

    private static self $instance;

    private function __construct()
    {
        $this->loader = new ThemeLoader();
        $this->extension = $this->loader->getExtension();
    }

    private function launch(): void
    {
        $this->initiateTheme()->bootExtension();
    }

    private function initiateTheme(): self
    {
        Theme::init($this->extension);

        return $this;
    }

    private function bootExtension(): self
    {
        $this->loader->bootstrap();

        return $this;
    }

    public static function init(): void
    {
        !isset(self::$instance) ? self::load() : self::error(__METHOD__);
    }

    private static function load(): void
    {
        (self::$instance = new self())->launch();
    }

    private static function error(string $method): void
    {
        throw new ThemeInitiationException(
            static::$instance->extension,
            $method
        );
    }
}
