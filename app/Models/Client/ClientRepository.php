<?php

namespace PseudoVendor\PseudoTheme\Models\Client;

use Leonidas\Contracts\Option\OptionRepositoryInterface;
use PseudoVendor\PseudoTheme\Models\Address\Address;

class ClientRepository
{
    protected const OPTION_KEYS = [
        'full_title' => '',
        'short_title' => '',
        'stylized_title' => '',
        'phone_number' => '',
        'email_address' => '',
        'street' => '',
        'city' => '',
        'state' => '',
        'zip' => '',
    ];

    protected const DEFAULTS = [
        'full_title' => '',
        'short_title' => '',
        'stylized_title' => '',
        'phone_number' => '',
        'email_address' => '',
        'street' => '',
        'city' => '',
        'state' => '',
        'zip' => '',
    ];

    public function __construct(protected OptionRepositoryInterface $repository)
    {
        //
    }

    public function getPrimaryClient(): Client
    {
        return new Client(
            $this->getEntry('full_title'),
            $this->getEntry('short_title'),
            $this->getEntry('stylized_title'),
            $this->getEntry('phone_number'),
            $this->getEntry('email_address'),
            new Address(
                $this->getEntry('street'),
                $this->getEntry('city'),
                $this->getEntry('state'),
                $this->getEntry('zip'),
            )
        );
    }

    protected function getEntry(string $entry): string
    {
        return $this->repository->get(
            static::OPTION_KEYS[$entry],
            static::DEFAULTS[$entry]
        );
    }
}
