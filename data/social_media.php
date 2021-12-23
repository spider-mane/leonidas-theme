<?php

return [

    /**
     * Simple slug as key with value as array of values anticipated by
     * templates. Likely universals are a stylized name, url (if not stored in
     * the database) and icon. The nature of icon configuration will mostly
     * depend on the api's of icon libraries used.
     */
    'accounts' => [
        'facebook' => [
            'name' => 'Facebook',
            'icon' => 'fa-facebook-square',
        ],
        'instagram' => [
            'name' => 'Instagram',
            'icon' => 'fa-instagram',
        ],
        'twitter' => [
            'name' => 'Twitter',
            'icon' => 'fa-twitter',
        ],
        'linkedin' => [
            'name' => 'LinkedIn',
            'icon' => 'fa-linkedin-in'
        ],
        'github' => [
            'name' => 'Github',
            'icon' => 'fa-github'
        ]
    ],

    /**
     * For any context that will show a limited number of social media links,
     * specify the desired platforms by slug (key) for that context here.
     *
     * Setting a context value can also be used to customize the output order.
     */
    'contexts' => [
        'navbar' => ['facebook', 'instagram', 'linkedin'],
        'footer' => ['facebook', 'instagram', 'twitter', 'linkedin', 'github'],
    ],
];
