<?php

use Theme\Asset;
use WebTheory\GuctilityBelt\Phone;
use WebTheory\Html\Attributes\Classlist;
use WebTheory\Saveyour\Factories\FormFieldFactory;
use joshtronic\LoremIpsum;

return [

    /*
    |--------------------------------------------------------------------------
    | Filters
    |--------------------------------------------------------------------------
    |
    | Specify filters to add to twig when loaded.
    |
    */
    'filters' => [

        'url' => 'home_url',
        'us_phone' => [Phone::class, 'formatUs'],
        'phone_link' => [Phone::class, 'getPhoneLink'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Functions
    |--------------------------------------------------------------------------
    |
    | Specify functions to add to twig when loaded.
    |
    */
    'functions' => [

        'format_us_phone' => 'phone_format_us',
        'image' => [Asset::class, 'image'],
        'video' => [Asset::class, 'video'],
        'audio' => [Asset::class, 'audio'],
        'logo' => [Asset::class, 'logo'],
        'icon' => [Asset::class, 'icon'],

        'lorem' => function (int $count, string $what = 'words', bool $tags = false) {
            return (new LoremIpsum)->$what($count, $tags, false);
        },

        'spaces' => function (int $spaces) {
            return str_repeat('&nbsp;', $spaces);
        },

        'separator' => function (int $spaces) {
            $spaces = str_repeat('&nbsp;', $spaces);

            return $spaces . '|' . $spaces;
        },

        'class' => function () {
            return new Classlist();
        },

        'field' => function (string $type, array $args) {
            return (new FormFieldFactory)->create($type, $args);
        },

        'dump' => function (...$values) {
            function_exists('dump') ? dump(...$values) : var_dump(...$values);
        },

        'dd' => function (...$values) {
            function_exists('dd') ? dd(...$values) : exit(var_dump(...$values));
        },
    ],

    'globals' => [],

    'tests' => [],

    'components' => [],

    'extensions' => [],
];
