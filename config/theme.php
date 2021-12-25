<?php

return [

    /**
     *==========================================================================
     * Theme Name
     *==========================================================================
     *
     * The name of your theme, stylized to your liking.
     */
    'name' => ':theme_name',

    /**
     *==========================================================================
     * Version
     *==========================================================================
     *
     * Current version of your theme.
     */
    'version' => ':theme_version',

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
     * @link https://developer.wordpress.org/themes/internationalization/how-to-internationalize-your-theme/#text-domains
     */
    'slug' => ':theme_slug',

    /**
     *==========================================================================
     * Prefix
     *==========================================================================
     *
     * An abbreviated tag that you can use to prefix entries into the system
     * where naming collisions are a highly probable, such as database entries,
     * element ids, input names, etc.
     */
    'prefix' => ':theme_prefix',

    /**
     *==========================================================================
     * Description
     *==========================================================================
     *
     * Description of your theme that an about page can display. Can be
     * different from (and more descriptive than) the one in the theme header.
     */
    'description' => ':theme_description',

    /**
     *==========================================================================
     * Dependencies
     *==========================================================================
     *
     * A list of themes that your own theme depends on to properly function.
     * Use the textdomain/slug of any such theme.
     */
    'dependencies' => [

        'leonidas',
    ],

    /**
     *==========================================================================
     * Templates
     *==========================================================================
     *
     * Directory where templates are located.
     */
    'templates' => '/theme/routes',

    /**
     *==========================================================================
     * Assets
     *==========================================================================
     *
     * The directory, relative to the root directory where theme assets are
     * located.
     */
    'assets' => '/theme/assets/dist',

    /**
     *==========================================================================
     * Development
     *==========================================================================
     *
     * A simple expression such as a single function call or ternary statement
     * that should return true if the theme is in a development environment.
     */
    'dev' => defined('PSEUDO_CONSTANT_DEVELOPMENT'),

];
