<?php

namespace PseudoVendor\PseudoTheme\Providers;

use Leonidas\Contracts\Container\StaticProviderInterface;
use Psr\Container\ContainerInterface;
use WebTheory\Context\Selector;

class SocialMediaProvider implements StaticProviderInterface
{
    public static function provide(array $args, ContainerInterface $container)
    {
        $data = [$container->get('data'), 'get'];

        return new Selector(
            $data('social_media.accounts'),
            $data('social_media.contexts')
        );
    }
}
