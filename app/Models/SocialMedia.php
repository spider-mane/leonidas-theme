<?php

namespace Theme\Models;

use WebTheory\GuctilityBelt\ContextView;

class SocialMedia
{
    /**
     * Instance of context view object populated with socialmedia data
     */
    protected static $contextView;

    /**
     * Retrieves the social media data
     *
     * Pass null to retrieve the ContextView instance
     *
     * @return mixed|ContextView
     */
    public static function for(string $context = '')
    {
        if (!isset(static::$contextView)) {
            static::setContextView();
        }

        /** @var ContextView $socialMedia */
        $socialMedia = static::$contextView;

        if (empty($context)) {
            return $socialMedia->getItems();
        }

        return $socialMedia->getContextItems($context);
    }

    /**
     *
     */
    protected static function setContextView()
    {
        $accounts = static::getAccounts();
        $contexts = ThemeData::get('social_media.contexts');

        static::$contextView = new ContextView($accounts, $contexts);
    }

    /**
     *
     */
    public static function getLink(string $account)
    {
        $format = ThemeData::get('entity.option_key_formats.social_media');

        return get_option(sprintf($format, $account), null);
    }

    /**
     *
     */
    public static function getAccounts()
    {
        $accounts = ThemeData::get('social_media.accounts');

        foreach ($accounts as $account => &$data) {

            $data['url'] = static::getLink($account) ?: $data['url'] ?? '';
        }

        return $accounts;
    }
}
