<?php

use PseudoVendor\PseudoTheme\PseudoTheme;

PseudoTheme::render('contact.twig', [

    'form' => [
        'method' => 'post',
        'action' => '',
        'security' => [],
        'fields' => [],
    ]

]);
