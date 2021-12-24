<?php

namespace PseudoVendor\PseudoTheme\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use WebTheory\Leonidas\PostType\Factory;

class PostTypeServiceProvider extends AbstractServiceProvider
{
    protected $provides = [Factory::class];

    public function register()
    {
        $container = $this->getLeagueContainer();

        $container->share(Factory::class, function () use ($container) {
            return new Factory($container->get('config')->get('wp.option_handlers.post_type'));
        })->addTag('post_type');
    }
}
