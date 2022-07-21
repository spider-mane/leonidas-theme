<?php

use Leonidas\Library\Access\Pages;
use Leonidas\Library\Access\Posts;
use PseudoVendor\PseudoTheme\Theme;

Theme::display('front.index', [
    // 'page' => Pages::fromQuery()->first(),
    // 'posts' => Posts::fromQuery(),
]);
