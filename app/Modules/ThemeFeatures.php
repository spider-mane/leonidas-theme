<?php

namespace PseudoVendor\PseudoTheme\Modules;

use PseudoVendor\PseudoTheme\Modules\Abstracts\ThemeFeaturesModule;

class ThemeFeatures extends ThemeFeaturesModule
{
    protected function features(): array
    {
        return $this->getConfig('features');
    }
}
