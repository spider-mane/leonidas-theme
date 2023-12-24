<?php

return [

    /**
     *==========================================================================
     * Scripts
     *==========================================================================
     *
     * You can define extra scripts to run as part of the bootstrapping process.
     * Defined scripts will be provided the WpExtension instance.
     *
     */

    'scripts' => [

        'constants',

    ],

    /**
     *==========================================================================
     * Classes
     *==========================================================================
     *
     * Bootstrap processes are classes you can use to encapsulate your
     * bootstrap requirements. Useful for keeping your Launcher class
     * simple and being able to reuse bootstrap processes between extensions.
     *
     */

    'classes' => [

        Leonidas\Framework\Bootstrap\BindContainerToFacades::class,

    ],

    /**
     *==========================================================================
     * Options
     *==========================================================================
     *
     * Bootstrap process options can be defined here.
     *
     */

    'options' => [

        'facade' => \PseudoVendor\PseudoTheme\Access\_Facade::class,

    ],

];
