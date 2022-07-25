<?php

namespace PseudoVendor\PseudoTheme;

use Leonidas\Contracts\Extension\ExtensionLoaderInterface;
use Leonidas\Contracts\Extension\WpExtensionInterface;
use Leonidas\Framework\Theme\ThemeLoader;

final class Launcher
{
    private ExtensionLoaderInterface $loader;

    private WpExtensionInterface $extension;

    private static self $instance;

    private function __construct()
    {
        $this->loader = new ThemeLoader();
        $this->extension = $this->loader->getExtension();
    }

    private function launch(): void
    {
        $this->initiate()->boot();
    }

    private function initiate(): self
    {
        Theme::init($this->extension);

        return $this;
    }

    private function boot(): self
    {
        $this->loader->bootstrap();

        return $this;
    }

    public static function init(): void
    {
        !isset(self::$instance)
            ? self::load()
            : self::$instance->loader->error();
    }

    private static function load(): void
    {
        (self::$instance = new self())->launch();
    }
}
