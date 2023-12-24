<?php

use Leonidas\Plugin\Access\Pages;
use PseudoVendor\PseudoTheme\Access\Forms;
use PseudoVendor\PseudoTheme\Theme;

Theme::display('contact.index', [
    'page' => Pages::fromQuery()->first(),
    'form' => Forms::build('contact'),
]);
