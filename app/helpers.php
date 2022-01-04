<?php

use PseudoVendor\PseudoTheme\Theme;

################################################################################
# Theme
################################################################################

function theme($get = null)
{
    $container = Theme::getInstance();

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
# View
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
