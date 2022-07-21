<?php

use WebTheory\Config\Deferred\Reflection as ConfigReflection;

use function PseudoVendor\PseudoTheme\abspath;

return [

    /**
     *==========================================================================
     * Root
     *==========================================================================
     *
     *
     *
     */
    'root' => abspath(),

    /**
     *==========================================================================
     * Paths
     *==========================================================================
     *
     *
     *
     */
    'paths' => [

        'views/theme',

    ],

    /**
     *==========================================================================
     * Options
     *==========================================================================
     *
     *
     *
     */
    'options' => [

        'autoescape' => false,
        'cache' => abspath('/storage/cache/views/twig'),
        'debug' => ConfigReflection::get('app.dev'),

    ],

    /**
     *==========================================================================
     * Extensions
     *==========================================================================
     *
     *
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

    ],

    /**
     *==========================================================================
     * Globals
     *==========================================================================
     *
     *
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
     *
     *
     */
    'runtime_loaders' => [

        //
    ],

];
