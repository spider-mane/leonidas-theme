<?php

namespace Theme\Models;

use Theme\Models\SocialMedia;

class Entity
{
    /**
     *
     */
    public static function all()
    {
        return [
            'short_title' => static::title('short'),
            'full_title' => static::title('full'),
            'styled_title' => static::title('styled'),
            'phone' => static::contactInfo('phone'),
            'email' => static::contactInfo('email'),
            'address' => static::address(),
            'social_media' => static::socialMedia(),
        ];
    }

    /**
     *
     */
    public static function owner()
    {
        return ThemeData::get('entity.owner');
    }

    /**
     *
     */
    public static function title(?string $format = null)
    {
        $optionFormat = ThemeData::get('entity.option_key_formats.title');

        return get_option(sprintf($optionFormat, $format));
    }

    /**
     *
     */
    public static function address(?string $component = null)
    {
        $format = ThemeData::get('entity.option_key_formats.address');

        if ($component) {
            $default =  ThemeData::get("entity.address.{$component}");

            return get_option(sprintf($format, $component, $default));
        }

        return [
            'street' => static::address('street'),
            'city' => static::address('city'),
            'state' => static::address('state'),
            'zip' => static::address('zip'),
        ];
    }

    /**
     *
     */
    public static function contactInfo(?string $thing = null)
    {
        $format = ThemeData::get('entity.option_key_formats.contact');

        if ($thing) {

            $default = ThemeData::get("entity.contact.{$thing}", null);

            return get_option(sprintf($format, $thing), $default);
        }
    }

    /**
     *
     */
    public static function socialMedia()
    {
        return SocialMedia::getAccounts();
    }
}
