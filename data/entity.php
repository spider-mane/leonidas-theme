<?php

$prefix = '';

return [

    'owner' => null,

    'title' => [
        'full' => null,
        'short' => null,
        'styled' => null
    ],

    'address' => [
        'street' => null,
        'city' => null,
        'state' => null,
        'zip' => null,
    ],

    'contact' => [
        'phone' => '123-456-7890',
        'email' => 'name@email.com',
    ],

    'reviews' => [
        'google' => [
            'business_name' => ''
        ],

        'yelp' => [
            'business_name' => ''
        ]
    ],

    'fonts' => [
        'primary' => null
    ],

    'option_keys' => [
        null => null
    ],

    'option_key_formats' => [
        'title' => "{$prefix}-company-%s-name",
        'contact' => "{$prefix}-company-contact--%s",
        'social_media' => "{$prefix}-company-info--%s"
    ]
];
