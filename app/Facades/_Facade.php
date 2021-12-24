<?php

namespace PseudoVendor\PseudoTheme\Facades;

use League\Container\Container;
use WebTheory\Facade\MockeryMockableFacadeBaseTrait;

abstract class _Facade
{
    use MockeryMockableFacadeBaseTrait;

    /**
     * @var Container
     */
    protected static $container;

    final protected function _updateContainer(string $name, object $instance): void
    {
        static::$container->addShared($name, $instance);
    }
}
