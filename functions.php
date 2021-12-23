<?php

use Leonidas\Framework\Helpers\Theme;
use PseudoVendor\PseudoPlugin\Launcher;

defined('ABSPATH') || exit;

call_user_func(function () {
    $init = static function () {
        require __DIR__ . '/boot/init.php';

        Launcher::init(
            Theme::path(__FILE__),
            Theme::url(__FILE__)
        );
    };

    did_action('leonidas_loaded')
        ? $init()
        : add_action('leonidas_loaded', $init);
});
