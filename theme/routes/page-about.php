<?php

use Leonidas\Library\Access\Pages;
use PseudoVendor\PseudoTheme\Theme;

Theme::display('about.index', [
    'page' => Pages::fromQuery()->first(),
]);
