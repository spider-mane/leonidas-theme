<?php

namespace PseudoVendor\PseudoTheme\Support;

class Copy
{
    public static function get(string $file)
    {
        return "copy/{$file}.twig";
    }
}
