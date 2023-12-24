<?php

namespace PseudoVendor\PseudoTheme\Contracts\Model;

interface SocialMediaAccountInterface
{
    public function getPlatform(): string;

    public function getId(): string;

    public function getUrl(): string;

    public function getIcon(): string;
}
