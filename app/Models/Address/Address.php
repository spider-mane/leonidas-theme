<?php

namespace PseudoVendor\PseudoTheme\Models\Address;

class Address
{
    public function __construct(
        protected string $street,
        protected string $city,
        protected string $state,
        protected string $zip,
    ) {
        //
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getZip(): string
    {
        return $this->zip;
    }
}
