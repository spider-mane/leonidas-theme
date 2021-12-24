<?php

namespace PseudoVendor\PseudoTheme\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigServiceProvider extends AbstractServiceProvider
{
    protected $provides = [Environment::class];

    /**
     * {@inheritDoc}
     */
    public function register()
    {
        $container = $this->getLeagueContainer();

        $container->share(Environment::class, function () use ($container) {
            $config = $container->get('config')->get('twig', []);

            $loader = new FilesystemLoader(
                $config['templates'] ?? null,
                $config['root'] ?? null
            );

            return new Environment($loader, $config['options'] ?? null);
        })->addTag('twig')->addTag('view');
    }
}
