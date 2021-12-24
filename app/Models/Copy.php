<?php

namespace PseudoVendor\PseudoTheme\Models;

class Copy
{
    /**
     *
     */
    public static function get(string $file)
    {
        return "copy/{$file}.twig";
    }
}
