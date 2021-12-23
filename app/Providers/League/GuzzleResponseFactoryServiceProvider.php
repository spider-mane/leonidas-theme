<?php

namespace PseudoVendor\PseudoPlugin\Providers;

use Http\Factory\Guzzle\ResponseFactory;
use League\Container\ServiceProvider\AbstractServiceProvider;
use Psr\Http\Message\ResponseFactoryInterface;

class GuzzleResponseFactoryServiceProvider extends AbstractServiceProvider
{
    protected $provides = [ResponseFactoryInterface::class];

    public function register()
    {
        $container = $this->getLeagueContainer();

        $container->share(ResponseFactoryInterface::class, function () {
            return new ResponseFactory();
        });
    }
}
