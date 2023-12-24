<?php

use Leonidas\Plugin\Access\Posts;
use PseudoVendor\PseudoTheme\Theme;

Theme::display('post.index', [
    'posts' => Posts::fromQuery(),
]);
