<?php

namespace PseudoVendor\PseudoTheme\Modules\Abstracts;

use Closure;
use Leonidas\Framework\Modules\AbstractModule;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class TimberEnvironmentModule extends AbstractModule
{
    public function hook(): void
    {
        add_filter('timber/context', Closure::fromCallable([$this, 'context']), null, PHP_INT_MAX);
        add_filter('timber/loader/loader', Closure::fromCallable([$this, 'loader']), null, PHP_INT_MAX);
        add_filter('timber/loader/paths', Closure::fromCallable([$this, 'paths']), null, PHP_INT_MAX);
        add_filter('timber/twig', Closure::fromCallable([$this, 'configure']), null, PHP_INT_MAX);
    }

    protected function paths(array $paths): array
    {
        return $paths;
    }

    protected function loader(FilesystemLoader $loader): FilesystemLoader
    {
        return $loader;
    }

    protected function configure(Environment $twig): Environment
    {
        return $twig;
    }

    public function context(array $context): array
    {
        return require_once $this->contextScript();
    }

    abstract protected function contextScript(): string;
}
