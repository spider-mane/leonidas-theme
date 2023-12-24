<?php

namespace PseudoVendor\PseudoTheme\View\Helper;

use Leonidas\Contracts\Option\OptionRepositoryInterface;
use Leonidas\Plugin\Leonidas;
use PseudoVendor\PseudoTheme\Models\Client\Client as ClientModel;
use PseudoVendor\PseudoTheme\Models\Client\ClientRepository;
use PseudoVendor\PseudoTheme\View\Helper\Abstracts\AbstractViewHelper;

class Client extends AbstractViewHelper
{
    public static function data(): ClientModel
    {
        static $client;

        return $client ??= (new ClientRepository(
            Leonidas::getService(OptionRepositoryInterface::class)
        ))->getPrimaryClient();
    }

    public static function title(?string $format = null)
    {
        $methods = [
            'full' => 'getFullTitle',
            'short' => 'getShortTitle',
            'styled' => 'getStylizedTitle',
        ];

        return static::data()->{$methods[$format]}();
    }

    public static function address(?string $component = null)
    {
        $address = static::data()->getAddress();

        if ($component) {
            $methods = [
                'street' => 'getStreet',
                'city' => 'getCity',
                'state' => 'getState',
                'zip' => 'getZip',
            ];

            $address = $address->{$methods[$component]}();
        }

        return $address;
    }

    public static function contactInfo(?string $info = null)
    {
        $methods = [
            'phone' => 'getPhoneNumber',
            'email' => 'getEmailAddress',
        ];

        return static::data()->{$methods[$info]}();
    }

    public static function socialMedia()
    {
        return SocialMedia::getAccounts();
    }
}
