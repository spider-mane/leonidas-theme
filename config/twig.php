<?php

use function PseudoVendor\PseudoTheme\abspath;
use function WebTheory\Config\reflect;

return [

    /**
     *==========================================================================
     * Root
     *==========================================================================
     *
     * @link
     *
     */
    'root' => abspath(),

    /**
     *==========================================================================
     * Paths
     *==========================================================================
     *
     * @link
     *
     */
    'paths' => [

        'views/theme',

    ],

    /**
     *==========================================================================
     * Views
     *==========================================================================
     *
     * Relative path where view templates for routes can be found.
     *
     */
    'views' => 'routes/',

    /**
     *==========================================================================
     * Options
     *==========================================================================
     *
     * @link https://twig.symfony.com/doc/3.x/api.html#environment-options
     *
     */
    'options' => [

        'autoescape' => false,
        'cache' => abspath('/var/cache/views/twig'),
        'debug' => reflect('app.dev'),

    ],

    /**
     *==========================================================================
     * Extensions
     *==========================================================================
     *
     * @link https://twig.symfony.com/doc/3.x/api.html#using-extensions
     *
     */
    'extensions' => [

        # Leonidas
        Leonidas\Library\Core\View\Twig\LoremExtension::class,
        Leonidas\Library\Core\View\Twig\PrettyDebugExtension::class,
        Leonidas\Library\Core\View\Twig\SkyHooksExtension::class,
        Leonidas\Library\Core\View\Twig\StringHelperExtension::class,
        Leonidas\Library\Core\View\Twig\TemplateTagsExtension::class,

        # Twig Extra
        Twig\Extra\Inky\InkyExtension::class,
        Twig\Extra\Intl\IntlExtension::class,
        Twig\Extra\Markdown\MarkdownExtension::class,

        # Theme
        PseudoVendor\PseudoTheme\View\TwigExtension::class,

        # Third-Party

    ],

    /**
     *==========================================================================
     * Globals
     *==========================================================================
     *
     * @link https://twig.symfony.com/doc/3.x/advanced.html#globals
     *
     */
    'globals' => [

        //

    ],

    /**
     *==========================================================================
     * Runtime Loaders
     *==========================================================================
     *
     * @link https://twig.symfony.com/doc/3.x/api.html#loaders
     *
     */
    'runtime_loaders' => [

        // Twig\RuntimeLoader\ContainerRuntimeLoader::class,
        // Twig\RuntimeLoader\FactoryRuntimeLoader::class,

    ],

];
