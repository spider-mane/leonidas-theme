<?php

use PseudoVendor\PseudoTheme\PseudoTheme;

################################################################################
# Container based helpers
################################################################################

function theme($get = null)
{
    $container = PseudoTheme::getInstance();

    return isset($get) ? $container->get($get) : $container;
}


function theme_config($key = null, $default = null)
{
    if (is_null($key)) {
        return theme('config');
    }

    if (is_array($key)) {
        return theme('config')->set($key);
    }

    return theme('config')->get($key, $default);
}


################################################################################
# Other
################################################################################

function get_view_slug()
{
    $view = get_queried_object();

    if ($view) {
        $slug = $view->post_name ?? $view->rewrite['slug'];
    } else {
        $slug = '404';
    }

    return $slug;
}
