<?php

use Leonidas\Library\Access\Posts;
use PseudoVendor\PseudoTheme\Theme;

Theme::display('post.index', [
    'posts' => Posts::fromQuery(),
]);
