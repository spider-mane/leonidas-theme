<?php

namespace PseudoVendor\PseudoTheme\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Psr\Http\Message\ResponseFactoryInterface;
use Slim\CallableResolver;
use Slim\Interfaces\RouteCollectorProxyInterface;
use Slim\Routing\RouteCollectorProxy;

class SlimRouterServiceProvider extends AbstractServiceProvider
{
    protected $provides = [
        RouteCollectorProxyInterface::class,
    ];

    public function register()
    {
        $container = $this->getLeagueContainer();

        $container->share(RouteCollectorProxyInterface::class, function () use ($container) {
            return new RouteCollectorProxy(
                $container->get(ResponseFactoryInterface::class),
                new CallableResolver($container),
                $container
            );
        });
    }
}
