<?php

use Leonidas\Library\Access\Pages;
use PseudoVendor\PseudoTheme\Access\Forms;
use PseudoVendor\PseudoTheme\Theme;

Theme::display('contact.index', [
    'page' => Pages::fromQuery()->first(),
    'form' => Forms::build('contact'),
]);
