<?php

namespace PseudoVendor\PseudoPlugin;

use Leonidas\Contracts\Extension\WpExtensionInterface;
use Leonidas\Enum\ExtensionType;
use Leonidas\Framework\Exceptions\InvalidCallToPluginMethodException;
use Leonidas\Framework\ModuleInitializer;
use Leonidas\Framework\WpExtension;
use PseudoVendor\PseudoPlugin\Facades\_Facade;
use Psr\Container\ContainerInterface;

final class Launcher
{
    /**
     * @var string
     */
    private $base;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $url;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var WpExtensionInterface
     */
    private $extension;

    /**
     * @var Launcher
     */
    private static $instance;

    private function __construct(string $path, string $url)
    {
        $this->path = $path;
        $this->url = $url;
        $this->container = $this->buildContainer();
        $this->extension = $this->buildExtension();
    }

    private function buildContainer(): ContainerInterface
    {
        return require $this->path . '/boot/container.php';
    }

    private function buildExtension(): WpExtensionInterface
    {
        $config = [$this->container->get('config'), 'get'];

        return WpExtension::create([
            'name' => $config('theme.name'),
            'version' => $config('theme.version'),
            'slug' => $config('theme.slug'),
            'prefix' => $config('theme.prefix'),
            'description' => $config('theme.description'),
            'base' => $this->base,
            'path' => $this->path,
            'url' => $this->url,
            'assets' => $config('theme.assets'),
            'dev' => $config('theme.dev'),
            'type' => new ExtensionType('theme'),
            'container' => $this->container,
        ]);
    }

    private function reallyReallyInit(): void
    {
        $this
            ->bindContainerToFacades()
            ->initializeModules()
            ->requestAssistance()
            ->launchPseudoPlugin();
    }

    private function bindContainerToFacades(): Launcher
    {
        _Facade::_setFacadeContainer($this->container);

        return $this;
    }

    private function initializeModules(): Launcher
    {
        (new ModuleInitializer(
            $this->extension,
            $this->extension->config('app.modules')
        ))->init();

        return $this;
    }

    private function requestAssistance(): Launcher
    {
        foreach ($this->extension->config('app.bootstrap', []) as $assistant) {
            (new $assistant($this->extension))->bootstrap();
        }

        return $this;
    }

    private function launchPseudoPlugin(): Launcher
    {
        PseudoPlugin::launch($this->extension);

        return $this;
    }

    public static function init(string $path, string $url): void
    {
        if (!self::isLoaded()) {
            self::reallyInit($path, $url);
        } else {
            self::throwAlreadyLoadedException(__METHOD__);
        }
    }

    private static function isLoaded(): bool
    {
        return isset(self::$instance) && (self::$instance instanceof self);
    }

    private static function reallyInit(string $path, string $url): void
    {
        self::$instance = new self($path, $url);
        self::$instance->reallyReallyInit();
    }

    private static function throwAlreadyLoadedException(callable $method): void
    {
        throw new InvalidCallToPluginMethodException(
            self::$instance->extension->getName(),
            $method
        );
    }
}
