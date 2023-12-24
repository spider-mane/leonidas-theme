<?php

namespace PseudoVendor\PseudoTheme\Models\Client;

use Leonidas\Library\System\Model\Abstracts\GetAccessGrantedTrait;
use PseudoVendor\PseudoTheme\Models\Address\Address;

class Client
{
    use GetAccessGrantedTrait;

    public function __construct(
        protected string $fullTitle,
        protected string $shortTitle,
        protected string $stylizedTitle,
        protected string $phoneNumber,
        protected string $emailAddress,
        protected Address $address,
    ) {
        //
    }

    public function getFullTitle(): string
    {
        return $this->fullTitle;
    }

    public function getShortTitle(): string
    {
        return $this->shortTitle;
    }

    public function getStylizedTitle(): string
    {
        return $this->stylizedTitle;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }
}
