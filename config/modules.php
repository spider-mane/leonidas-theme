<?php

use function Env\env;

return [

    /**
     *==========================================================================
     * Module Configuration
     *==========================================================================
     *
     * Some modules may define their own configuration as a subset of the
     * 'modules' namespace and can thus be configured from this file.
     */
    'module-name' => [

        // configuration
    ],

    /**
     *==========================================================================
     * RefreshPages
     *==========================================================================
     *
     *
     */
    'refresh' => [

        'show_admin_bar' => env('SHOW_ADMIN_BAR') ?? true,
    ],

];
