<?php

use Leonidas\Plugin\Access\Pages;
use PseudoVendor\PseudoTheme\Theme;

Theme::display('about.index', [
    'page' => Pages::fromQuery()->first(),
]);
