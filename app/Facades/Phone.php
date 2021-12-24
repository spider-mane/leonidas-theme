<?php

namespace PseudoVendor\PseudoTheme\Facades;

use libphonenumber\NumberFormat;
use libphonenumber\PhoneNumberFormat;

class Phone extends _Facade
{
    public const PATTERN_US = "(\\d{3})(\\d{3})(\\d{4})";

    public const FORMATS_US = [
        'none' => "\$1\$2\$3",
        'dot' => "\$1.\$2.\$3",
        'dash' => "\$1-\$2-\$3",
        'space' => "\$1 \$2 \$3",
        'classic' => "(\$1) \$2-\$3",
    ];

    public static function formatUs(string $phoneNumber, string $format = 'dash', $scheme = PhoneNumberFormat::NATIONAL)
    {
        return static::formatByPattern(
            static::parse($phoneNumber, 'US'),
            $scheme,
            [static::getNumberFormatUS($format)]
        );
    }

    public static function formatNatUS(string $phoneNumber, string $format = 'dash')
    {
        return static::formatUs(
            $phoneNumber,
            $format,
            PhoneNumberFormat::NATIONAL
        );
    }

    public static function formatIntlUS(string $phoneNumber, string $format = 'dash')
    {
        return static::formatUs(
            $phoneNumber,
            $format,
            PhoneNumberFormat::INTERNATIONAL
        );
    }

    public static function getHref($phoneNumber, $region = 'US'): string
    {
        return static::format(
            static::parse($phoneNumber, $region),
            PhoneNumberFormat::RFC3966
        );
    }

    public static function getNumberFormatUS(string $format): NumberFormat
    {
        return (new NumberFormat())
            ->setPattern(static::PATTERN_US)
            ->setFormat(static::FORMATS_US[$format]);
    }

    protected static function _getFacadeAccessor()
    {
        return 'phone';
    }
}
