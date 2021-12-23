<?php

use WebTheory\Voltaire\Config;
use WebTheory\Voltaire\Theme;

################################################################################
# Container based helpers
################################################################################

/**
 * Get the container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param Theme $container
 * @return Theme|mixed
 */
function theme($get = null)
{
    $container = Theme::getInstance();

    return isset($get) ? $container->get($get) : $container;
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|Config
 */
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

/**
 *
 */
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

function deversion($version)
{
    return $version;
}
