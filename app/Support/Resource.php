<?php

namespace PseudoVendor\PseudoTheme\Support;

class Resource
{
    public static function unsplash(string $image)
    {
        return "//source.unsplash.com/{$image}";
    }

    public static function pixabay(string $image)
    {
        return "//pixabay.com/photos/{$image}";
    }
}
