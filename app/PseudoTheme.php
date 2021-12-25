<?php

namespace PseudoVendor\PseudoTheme;

use Leonidas\Contracts\Extension\WpExtensionInterface;
use Leonidas\Framework\Exceptions\InvalidCallToThemeMethodException;
use Leonidas\Framework\Theme\Modules\TimberContext;
use Timber\Loader;
use Timber\Timber;

final class PseudoTheme
{
    /**
     * @var WpExtensionInterface
     */
    protected $base;

    /**
     * @var PseudoTheme
     */
    private static $instance;

    private function __construct(WpExtensionInterface $base)
    {
        $this->base = $base;
    }

    public static function getInstance(): WpExtensionInterface
    {
        return static::$instance->base;
    }

    public static function launch(WpExtensionInterface $base): void
    {
        if (!self::isLoaded()) {
            self::construct($base);
        } else {
            self::throwAlreadyLoadedException(__METHOD__);
        }
    }

    public static function render(
        $filenames,
        array $data = [],
        $expires = false,
        string $cacheMode = Loader::CACHE_USE_DEFAULT
    ) {
        Timber::render(
            $filenames,
            $data + Timber::context(),
            $expires,
            $cacheMode
        );
    }

    private static function isLoaded(): bool
    {
        return isset(self::$instance) && (self::$instance instanceof self);
    }

    private static function construct(WpExtensionInterface $base): void
    {
        self::$instance = new self($base);
    }

    private static function throwAlreadyLoadedException(callable $method): void
    {
        throw new InvalidCallToThemeMethodException(
            self::$instance->base->getName(),
            $method
        );
    }
}
