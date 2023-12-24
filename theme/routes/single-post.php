<?php

use Leonidas\Plugin\Access\Posts;
use PseudoVendor\PseudoTheme\Theme;

Theme::display('post.single', [
    'post' => Posts::fromQuery()->first(),
]);
