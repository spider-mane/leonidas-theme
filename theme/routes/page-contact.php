<?php

use PseudoVendor\PseudoTheme\Theme;

/**
 * Render page
 */
Theme::render('contact.twig', [

    'form' => [
        'method' => 'post',
        'action' => '',
        'process' => [],
        'fields' => [],
    ],

]);
