<?php

namespace PseudoVendor\PseudoTheme\Models;

use WebTheory\Context\Selector;

class SocialMedia
{
    /**
     * @var Selector
     */
    protected static $selector;

    public static function for(string $context = '')
    {
        if (!isset(static::$selector)) {
            static::setSelector();
        }

        if (empty($context)) {
            return static::$selector->getItems();
        }

        return static::$selector->getContextItems($context);
    }

    protected static function setSelector()
    {
        $accounts = static::getAccounts();
        $contexts = ThemeData::get('social_media.contexts');

        static::$selector = new Selector($accounts, $contexts);
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
}
