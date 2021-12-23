<?php

namespace PseudoVendor\PseudoPlugin\Providers\League;

use League\Container\ServiceProvider\AbstractServiceProvider;
use libphonenumber\PhoneNumberUtil;

class PhoneNumberUtilServiceProvider extends AbstractServiceProvider
{
    public function provides(string $id): bool
    {
        return in_array($id, [
            'phone',
            'phoneUtil',
            PhoneNumberUtil::class,
        ]);
    }

    public function register(): void
    {
        $this->getContainer()->addShared('phone', function () {
            return PhoneNumberUtil::getInstance();
        })->addTag(PhoneNumberUtil::class);
    }
}
