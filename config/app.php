<?php

return [

    /**
     *==========================================================================
     * Modules
     *==========================================================================
     *
     * Modules are classes that hook into WordPress and initiate desired
     * functionality for the specific events. Because all modules are passed
     * your WpExtensionInterface instance, which in turn provides access to your
     * DI container, they can be designed in a way makes them portable and
     * reusable between projects.
     */
    'modules' => [
        PseudoVendor\PseudoPlugin\Modules\AdminAssets::class,
        PseudoVendor\PseudoPlugin\Modules\Setup::class,
    ],

    /**
     *==========================================================================
     * Bootstrap
     *==========================================================================
     *
     * Bootstrap assistants are classes you can use to encapsulate your
     * bootstrap requirements. Useful for keeping your Launcher class
     * simple and being able to reuse bootstrap processes between extensions.
     */
    'bootstrap' => [

        // assistants
    ],

];
