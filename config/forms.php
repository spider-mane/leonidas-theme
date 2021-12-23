<?php

/**
 * global security settings
 */
$security = [

    'csrf' => [],

    'reCaptcha' => 'g-recaptcha-response',
];

return [

    /**
     *
     */
    'contact' => [

        'method' => 'post',

        'security' => [

            'nonce' => [
                'name' => 'contact-nonce',
                'action' => 'contact-form',
            ]

        ] + $security,

        'mailto' => 'contact@webtheorystudio.com',
        'subject' => 'New Contact Requested',

        'fields' => [
            'full_name' => [
                'name' => 'wts-full-name',
                'required' => true,
            ],
            'phone_number' => [
                'name' => 'wts-phone-number',
                'required' => true,
            ],
            'email_address' => [
                'name' => 'wts-email-address',
                'required' => true,
            ],
            'organization' => [
                'name' => 'wts-organization',
                'required' => false,
            ],
            'website' => [
                'name' => 'wts-current-website',
                'required' => false,
            ],
            'message' => [
                'name' => 'wts-message',
                'required' => true,
            ],
        ],
    ],
];
