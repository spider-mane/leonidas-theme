<?php

namespace PseudoVendor\PseudoTheme\Asset;

use PseudoVendor\PseudoTheme\Facades\ThemeAsset;
use PseudoVendor\PseudoTheme\Facades\Phone;
use WebTheory\Html\Attributes\Classlist;
use WebTheory\Saveyour\Factories\FormFieldFactory;
use joshtronic\LoremIpsum;

return [

    /**
     *==========================================================================
     * Paths
     *==========================================================================
     *
     *
     */
    'paths' => [

        '/views/theme'
    ],


    /**
     *==========================================================================
     * Filters
     *==========================================================================
     *
     *
     */
    'filters' => [

        'url' => 'home_url',
        'us_phone' => [Phone::class, 'formatUs'],
        'phone_link' => [Phone::class, 'getHref'],
    ],


    /**
     *==========================================================================
     * Functions
     *==========================================================================
     *
     *
     */
    'functions' => [

        'format_us_phone' => 'phone_format_us',

        'image' => [ThemeAsset::class, 'image'],

        'video' => [ThemeAsset::class, 'video'],

        'audio' => [ThemeAsset::class, 'audio'],

        'logo' => [ThemeAsset::class, 'logo'],

        'icon' => [ThemeAsset::class, 'icon'],

        'lorem' => static function (int $count, string $what = 'words', bool $tags = false) {
            return (new LoremIpsum)->$what($count, $tags, false);
        },

        'spaces' => static function (int $spaces) {
            return str_repeat('&nbsp;', $spaces);
        },

        'separator' => static function (int $spaces) {
            $spaces = str_repeat('&nbsp;', $spaces);

            return $spaces . '|' . $spaces;
        },

        'class' => static function () {
            return new Classlist();
        },

        'field' => static function (string $type, array $args) {
            return (new FormFieldFactory)->create($type, $args);
        },

        'prefix' => static function ($prefix, ...$items) {
            return array_map(fn ($item) => $prefix . $item, $items);
        },

        'suffix' => static function ($suffix, ...$items) {
            return array_map(fn ($item) => $item . $suffix, $items);
        },

        'dump' => static function (...$values) {
            function_exists('dump') ? dump(...$values) : var_dump(...$values);
        },

        'dd' => static function (...$values) {
            function_exists('dd') ? dd(...$values) : exit(var_dump(...$values));
        },
    ],


    /**
     *==========================================================================
     * Globals
     *==========================================================================
     *
     *
     */
    'globals' => [

        //
    ],


    /**
     *==========================================================================
     * Tests
     *==========================================================================
     *
     *
     */
    'tests' => [

        //
    ],


    /**
     *==========================================================================
     * Components
     *==========================================================================
     *
     *
     */
    'components' => [

        //
    ],


    /**
     *==========================================================================
     * Extensions
     *==========================================================================
     *
     *
     */
    'extensions' => [

        //
    ],


    /**
     *==========================================================================
     * Default Context
     *==========================================================================
     *
     *
     */
    'context' => '/theme/context.php',


    /**
     *==========================================================================
     * Cache
     *==========================================================================
     *
     *
     */
    'cache' => [],
];
