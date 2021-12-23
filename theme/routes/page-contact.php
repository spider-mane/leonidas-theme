<?php

use Timber\Timber;

/**
 * Get context
 */
$global = Timber::context();

/**
 * Do things maybe
 */

/**
 * Build context
 */
$context = [
    'form' => [
        'method' => 'post',
        'action' => '',
        'security' => [],
        'fields' => [],
    ]
];

/**
 * Render template
 */
Timber::render('contact.twig', $context + $global);
