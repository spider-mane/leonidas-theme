<?php

namespace Theme\Models;

class ThemeData
{
    /**
     *
     */
    public static function get($key = null, $default = null)
    {
        $data = theme('data');

        if (is_null($key)) {
            return $data;
        }

        if (is_array($key)) {
            return $data->set($key);
        }

        return $data->get($key, $default);
    }

    /**
     *
     */
    public static function developer(string $info)
    {
        return static::get("theme.developer.{$info}");
    }

    /**
     *
     */
    public static function favicon(string $context = 'default')
    {
        return static::get("assets.favicons.{$context}");
    }

    /**
     *
     */
    public static function logo(string $context)
    {
        return static::get("assets.logos.{$context}");
    }

    /**
     *
     */
    public static function menu(string $context)
    {
        return static::get("menus.{$context}");
    }

    /**
     *
     */
    public static function postType(string $postType)
    {
        return static::get("map.post_types.{$postType}");
    }

    /**
     *
     */
    public static function taxonomy(string $taxonomy)
    {
        return static::get("map.taxonomies.{$taxonomy}");
    }
}
