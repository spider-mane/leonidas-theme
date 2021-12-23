<?php

$prefix = '';

return [

    'post_types' => [
        'blog' => 'post',
        'services' => "{$prefix}_service",
        'testimonials' => "{$prefix}_testimonial",
    ],

    'post_meta' => [

        'testimonial' => [
            'author' => "",
            'rating' => "",
            'content' => "",
        ],
    ],

    'taxonomies' => [],

    'term_meta' => [],
];
