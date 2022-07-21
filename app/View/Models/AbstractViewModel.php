<?php

namespace PseudoVendor\PseudoTheme\View\Models;

abstract class AbstractViewModel
{
    final public function __construct()
    {
        //
    }

    public static function getData(): array
    {
        return (new static())->data();
    }

    abstract protected function data(): array;
}
