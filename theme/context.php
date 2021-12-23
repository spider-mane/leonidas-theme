<?php

use Theme\Asset;
use Theme\Models\Entity;
use Theme\Models\SocialMedia;
use Theme\Models\ThemeData;
use WebTheory\Html\Attributes\Classlist;

/*
|------------------------------------------------------------------------------
| Context
|------------------------------------------------------------------------------
|
| Use this fle to define global template values
|
| When this file is loaded, the default context defined by Timber will be
| passed to it, allowing modification of those values.
|
| It's best not to directly resolve any of the required values in this file,
| but within a model class and reference it here
|
| Care should be taken when adding values in bulk not to overwrite any
| predefined values by accident
*/

$default = $context;

/**
 * add things
 */
$context = [

    'base' => get_view_slug(),

    'favicons' => [
        'default' => Asset::icon(ThemeData::favicon()),
    ],

    'body' => [
        'class' => new Classlist($context['body_class']),
    ],

    'header' => [
        'class' => new Classlist
    ],

    'main' => [
        'class' => new Classlist
    ],

    'navbar' => [
        'class' => new Classlist,
        'menu' => ThemeData::menu('site'),
        'social_media' => SocialMedia::for('navbar'),
    ],

    'footer' => [
        'class' => new Classlist,
        'social_media' => SocialMedia::for('footer'),
        'logo' => Asset::logo(ThemeData::logo('footer')),
        'links' => ThemeData::menu('footer'),
    ],

    'entity' => Entity::all(),

    'developer' => [
        'name' => ThemeData::developer('agency'),
        'link' => ThemeData::developer('url'),
    ],

    'fonts' => ThemeData::get('assets.fonts'),

    'meta' => [
        'post' => ThemeData::get('map.post_meta'),
        'term' => ThemeData::get('map.term_meta'),
    ],
];

/**
 * remove things
 */
unset($default['body_class']);

/**
 * return things
 */
return $context + $default;
