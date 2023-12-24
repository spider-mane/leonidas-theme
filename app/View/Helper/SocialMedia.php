<?php

namespace PseudoVendor\PseudoTheme\View\Helper;

use PseudoVendor\PseudoTheme\Theme;
use WebTheory\Context\Selector;

class SocialMedia
{
    public static function for(string $context = '')
    {
        if (empty($context)) {
            return static::getSelector()->getItems();
        }

        return static::getSelector()->getContextItems($context);
    }

    public static function getLink(string $account)
    {
        $format = ThemeData::get('entity.option_key_formats.social_media');

        return get_option(sprintf($format, $account), null);
    }

    public static function getAccounts()
    {
        $accounts = ThemeData::get('social_media.accounts');

        foreach ($accounts as $account => &$data) {
            $data['url'] = static::getLink($account) ?: $data['url'] ?? '';
        }

        return $accounts;
    }

    protected static function getSelector(): Selector
    {
        return Theme::base()->get('social_media');
    }
}
