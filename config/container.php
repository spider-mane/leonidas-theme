<?php

use WebTheory\Config\Deferred\Reflection;

return [

    /**
     *==========================================================================
     * Selection
     *==========================================================================
     *
     * Leonidas Theme is a di-container agnostic framework.
     *
     */
    'selection' => 'league',

    /**
     *==========================================================================
     * Services
     *==========================================================================
     *
     * Services are pre-configured objects made available throughout your
     * application via a dependency injection container. You can define
     * individual services here in a manner that allows you to populate your
     * container by iterating over them. Doing this cleanly from this context
     * requires use of a container with introspection capabilities or a
     * StaticProviderInterface, which is a simple static, library-independent
     * service provider which contains the actual instantiation logic as well as
     * a ConfigReflectorInterface instance which allows for providing the a set
     * of options from the same configuration repository. Besides "id",
     * "provider", and "args", the exact key=>value structure will depend on
     * your container library of choice.
     *
     */
    'services' => [
        [
            'id' => Leonidas\Library\Admin\Loaders\AdminNoticeCollectionLoaderInterface::class,
            'provider' => Leonidas\Framework\Providers\AdminNoticeCollectionLoaderProvider::class,
            'args' => Reflection::map([
                'prefix' => 'theme.prefix'
            ]),
            'shared' => true,
            'tags' => ['admin_notice_loader']
        ]
    ],

    /**
     *==========================================================================
     * Providers
     *==========================================================================
     *
     * Some DI containers support "service providers." These are typically self
     * contained classes with all the logic required for inserting an entry into
     * a container according to that container's capabilities. Because all
     * necessary logic is encapsulated within them, library-specific providers
     * are the cleanest solution to building your container.
     *
     */
    'providers' => [
        Leonidas\Framework\Providers\League\PhoneNumberUtilServiceProvider::class
    ],

    /**
     *==========================================================================
     * Configurations
     *==========================================================================
     *
     * Here you can define configurations for multiple containers, having
     * multiple defined in configuration allows you to readily swap
     * implementations.
     *
     */
    'configurations' => [

        'laminas' => [],

        'league' => [],

        'nette' => [],

        'php-di' => [],

        'pimple' => [],

        'symfony' => [],

        'yii' => [],
    ],

];
