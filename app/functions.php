<?php

namespace PseudoVendor\PseudoTheme;

function theme_header(string $header)
{
    return Theme::instance()->header($header);
}

function path(?string $file = null): string
{
    return Theme::instance()->path($file);
}

function abspath(?string $file = null): string
{
    return Theme::instance()->absPath($file);
}

function url(?string $file = null): string
{
    return Theme::instance()->url($file);
}
