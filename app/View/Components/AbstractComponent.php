<?php

namespace PseudoVendor\PseudoTheme\View\Components;

class AbstractComponent
{
    public function component(string $component): string
    {
        return 'components/' . str_replace('.', '/', $component) . '.twig';
    }
}
