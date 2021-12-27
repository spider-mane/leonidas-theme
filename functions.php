<?php

/**
 * This file is part of the :theme_name WordPress theme.
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 *
 * @package :vendor_name/:theme_slug
 * @version :theme_version
 * @license MIT
 * @copyright Copyright (C) :system_year, :theme_author, All rights reserved.
 * @link :theme_website
 * @author :theme_author <:author_email>
 */

use Leonidas\Framework\Theme\Theme;
use PseudoVendor\PseudoTheme\Launcher;

defined('ABSPATH') || exit;

call_user_func(function () {
    require __DIR__ . '/boot/init.php';

    Launcher::init(
        Theme::path(),
        Theme::url()
    );
});
