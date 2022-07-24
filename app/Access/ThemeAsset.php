<?php

namespace PseudoVendor\PseudoTheme\Access;

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
class ThemeAsset extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return 'theme_assets';
    }
}
