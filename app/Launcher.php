<?php

namespace PseudoVendor\PseudoTheme;

use Leonidas\Contracts\Extension\ExtensionLoaderInterface;
use Leonidas\Contracts\Extension\WpExtensionInterface;
use Leonidas\Framework\ExtensionLoader;

final class Launcher
{
    private ExtensionLoaderInterface $loader;

    private WpExtensionInterface $extension;

    private static self $instance;

    private function __construct(string $path, string $url)
    {
        $this->loader = new ExtensionLoader('theme', $path, $url);
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

    public static function init(string $path, string $url): void
    {
        !isset(self::$instance)
            ? self::load($path, $url)
            : self::$instance->loader->error();
    }

    private static function load(string $path, string $url): void
    {
        (self::$instance = new self($path, $url))->launch();
    }
}
