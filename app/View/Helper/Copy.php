<?php

namespace PseudoVendor\PseudoTheme\View\Helper;

class Copy
{
    public static function get(string $file)
    {
        return "copy/{$file}.twig";
    }
}
