<?php

use function PseudoVendor\PseudoTheme\Config\info;

return [

    /**
     *==========================================================================
     * Theme Name
     *==========================================================================
     *
     * The name of your theme, stylized to your liking.
     *
     */
    'name' => info('name'),

    /**
     *==========================================================================
     * Version
     *==========================================================================
     *
     * Current version of your theme.
     *
     */
    'version' => info('version'),

    /**
     *==========================================================================
     * Description
     *==========================================================================
     *
     * Description of your theme that an about page can display. Can be
     * different from (and more descriptive than) the one in the theme header.
     *
     */
    'description' => info('description'),

    /**
     *==========================================================================
     * Slug (Textdomain)
     *==========================================================================
     *
     * The theme slug should ideally be identical to your theme package name.
     * A slug is essentially a human-readable identifier and it is one way that
     * your theme will be identified and referenced within WordPress including
     * but not limited to resolving the textdomain.
     *
     * @link https://developer.wordpress.org/themes/functionality/internationalization/
     *
     */
    'slug' => info('textdomain'),

    /**
     *==========================================================================
     * Namespace
     *==========================================================================
     *
     * A key to to use in contexts where it's desirable for a value to be
     * namespaced. The extension class will use this to prefix hook names.
     *
     */
    'namespace' => ':theme_namespace',

    /**
     *==========================================================================
     * Prefix
     *==========================================================================
     *
     * An abbreviated tag that you can use to prefix entries into the system
     * where naming collisions are a highly probable, such as database entries,
     * element ids, input names, etc.
     *
     */
    'prefix' => ':theme_prefix',

    /**
     *==========================================================================
     * Development
     *==========================================================================
     *
     * A simple expression such as a single function call or ternary statement
     * that should return true if the theme is in a development environment.
     *
     */
    'dev' => defined('PSEUDO_CONSTANT_DEVELOPMENT'),

    /**
     *==========================================================================
     * Providers
     *==========================================================================
     *
     * Some DI containers support service providers. These are typically self
     * contained classes with all the logic required for inserting an entry into
     * a container according to that container's capabilities. Because all
     * necessary logic is encapsulated within them, library-specific providers
     * are the cleanest solution to building your container.
     *
     */
    'providers' => [

        # Leonidas core
        Leonidas\Framework\Provider\League\FormRepositoryServiceProvider::class,
        Leonidas\Framework\Provider\League\GuzzleServerRequestServiceProvider::class,
        Leonidas\Framework\Provider\League\PhoneNumberUtilServiceProvider::class,
        Leonidas\Framework\Provider\League\TransientsChannelServiceProvider::class,
        Leonidas\Framework\Provider\League\TwigFlexViewServiceProvider::class,

        # Leonidas site
        // Leonidas\Framework\Site\Provider\League\SymfonyMailerServiceProvider::class,
        // Leonidas\Framework\Site\Provider\League\ReCaptchaServiceProvider::class,

        # Leonidas theme
        Leonidas\Framework\Theme\Provider\League\SocialMediaServiceProvider::class,
        Leonidas\Framework\Theme\Provider\League\ThemeAssetMapServiceProvider::class,
        Leonidas\Framework\Theme\Provider\League\ThemeDataServiceProvider::class,

        # Theme

        # Third-party
    ],

    /**
     *==========================================================================
     * Modules
     *==========================================================================
     *
     * Modules are classes that hook into WordPress and initiate desired
     * functionality for specific events. Because all modules are passed your
     * WpExtensionInterface instance, which in turn provides access to your DI
     * container, they can be designed in a way makes them portable and reusable
     * between projects.
     *
     */
    'modules' => [

        # Leonidas core
        Leonidas\Framework\Module\Forms::class,
        Leonidas\Framework\Module\ImageSizes::class,

        # Leonidas theme
        Leonidas\Framework\Theme\Module\TemplateRouter::class,
        Leonidas\Framework\Theme\Module\ThemeFeatures::class,

        # Theme
        PseudoVendor\PseudoTheme\Modules\PublicAssets::class,

        # Third-party
    ],

    /**
     *==========================================================================
     * Forms
     *==========================================================================
     *
     * List of form classes to add to the form repository. These are
     * self-contained classes that when added, will have their build information
     * made accessible to templates and will automatically be handled upon
     * submission by the form module.
     *
     */
    'forms' => [

        PseudoVendor\PseudoTheme\Forms\Contact::class,

    ],

];
