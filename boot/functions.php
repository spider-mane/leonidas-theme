<?php

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

$root ??= dirname(__DIR__, 1);

$patterns = [
    '{functions,helpers}**.php',
];

$paths = array_map(fn ($path) => "{$root}/{$path}", [
    'app',
]);

$finder = Finder::create()->files()->name($patterns)->in($paths);

array_map(
    fn (SplFileInfo $file) => require $file->getPathname(),
    iterator_to_array($finder)
);
