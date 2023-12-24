<?php

use Leonidas\Plugin\Access\Pages;
use Leonidas\Plugin\Access\Posts;
use PseudoVendor\PseudoTheme\Theme;

Theme::display('home.index', [
    // 'page' => Pages::fromQuery()->first(),
    // 'posts' => Posts::fromQuery(),
]);
