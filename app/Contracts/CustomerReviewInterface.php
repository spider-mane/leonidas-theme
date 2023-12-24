<?php

namespace PseudoVendor\PseudoTheme\Contracts;

interface CustomerReviewInterface
{
    public function getSource(): string;

    public function getCustomerName(): string;

    public function getCustomerPhoto(): string;

    public function getRating(): int;

    public function getTestimonial(): string;
}
