<?php

use PseudoVendor\PseudoTheme\PseudoTheme;

/**
 * Render template
 */
PseudoTheme::render('contact.twig', [
    'form' => [
        'method' => 'post',
        'action' => '',
        'security' => [],
        'fields' => [],
    ],
]);
