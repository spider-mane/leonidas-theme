<?php

namespace Theme;

/**
 * @method static string audio(string $file)
 * @method static string font(string $font)
 * @method static string icon(string $icon)
 * @method static string image(string $image)
 * @method static string logo(string $logo)
 * @method static string script(string $script)
 * @method static string stylesheet(string $stylesheet)
 * @method static string video(string $video)
 */
class Asset
{
    /**
     *
     */
    protected const ROOT = 'assets/dist/';

    /**
     *
     */
    protected const DIRECTORIES = [
        'audio' => 'audio',
        'font' => 'fonts',
        'icon' => 'icons',
        'image' => 'images',
        'logo' => 'logos',
        'script' => 'scripts',
        'stylesheet' => 'styles',
        'video' => 'videos',
    ];

    /**
     *
     */
    protected const EXTENSIONS = [
        'script' => '.js',
        'stylesheet' => '.css',
    ];

    /**
     *
     */
    public static function __callStatic($type, $file)
    {
        return static::get($type, $file[0]);
    }

    /**
     *
     */
    public static function get($type, $file)
    {
        $dir = static::DIRECTORIES[$type] ?? null;
        $ext = static::EXTENSIONS[$type] ?? '';

        return get_theme_file_uri(static::ROOT . "{$dir}/{$file}" . $ext);
    }
}
