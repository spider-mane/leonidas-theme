<?php

use PseudoVendor\PseudoTheme\Theme;

/**
 * Render template
 */
Theme::render('contact.twig', [
    'form' => [
        'method' => 'post',
        'action' => '',
        'security' => [],
        'fields' => [],
    ],
]);
