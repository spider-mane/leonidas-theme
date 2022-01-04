<?php

namespace PseudoVendor\PseudoTheme\Providers;

use Leonidas\Contracts\Container\StaticProviderInterface;
use PseudoVendor\PseudoTheme\Theme;
use Psr\Container\ContainerInterface;
use WebTheory\Context\Resources;

class ThemeAssetMapProvider implements StaticProviderInterface
{
    public static function provide(array $args, ContainerInterface $container)
    {
        return new Resources(
            Theme::getInstance()->getUrl() . $args['base'],
            $args['types']
        );
    }
}
