<?php

namespace PseudoVendor\PseudoTheme\Config;

use PseudoVendor\PseudoTheme\Theme;
use WebTheory\Config\Deferred\Callback;

use function WebTheory\Config\call;

function info(string $header): Callback
{
    return call(Theme::instance()->header(...), $header);
}
