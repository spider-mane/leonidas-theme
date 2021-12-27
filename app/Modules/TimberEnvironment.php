<?php

namespace PseudoVendor\PseudoTheme\Modules;

use Twig\Environment;
use Twig\TwigFilter;
use Twig\TwigFunction;

class TimberEnvironment extends Abstracts\TimberEnvironmentModule
{
    public const TWIG_PATHS_CONFIG_KEYS = [
        'twig.paths', 'timber.twig.paths', 'view.twig.paths'
    ];

    public const TWIG_ENVIRONMENT_CONFIG_KEYS = [
        'view.timber.twig', 'view.twig', 'twig'
    ];

    public const TIMBER_CONTEXT_CONFIG_KEYS = [
        'view.timber.context', 'view.twig.context', 'twig.context'
    ];

    protected function paths(array $paths): array
    {
        return array_map(
            fn ($path) => $this->absPath($path),
            $this->configCascade(static::TWIG_PATHS_CONFIG_KEYS)
        );
    }

    protected function configure(Environment $twig): Environment
    {
        $extra = $this->configCascade(static::TWIG_ENVIRONMENT_CONFIG_KEYS);

        foreach ($extra['functions'] as $alias => $original) {
            $alias = is_string($alias) ? $alias : $original;

            if (is_array($original) && !is_callable($original)) {
                $original = $original['@function'];
                $options = $original;
                unset($options['@function']);
            }

            $twig->addFunction(
                new TwigFunction($alias, $original, $options ?? [])
            );
        }

        foreach ($extra['filters'] as $filter => $function) {
            $filter = is_string($filter) ? $filter : $function;

            if (is_array($function) && !is_callable($function)) {
                $function = $function['@function'];
                $options = $function;
                unset($options['@function']);
            }

            $twig->addFilter(
                new TwigFilter($filter, $function, $options ?? [])
            );
        }

        return $twig;
    }

    protected function contextScript(): string
    {
        return $this->absPath(
            $this->configCascade(static::TIMBER_CONTEXT_CONFIG_KEYS)
        );
    }
}
