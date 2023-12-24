<?php

namespace PseudoVendor\PseudoTheme\Models\Review\Places;

use PseudoVendor\PseudoTheme\Contracts\CustomerReviewInterface;

class PlacesReview implements CustomerReviewInterface
{
    public const SOURCE = 'Google Places';

    public function __construct(
        protected string $customerName,
        protected string $customerPhoto,
        protected string $rating,
        protected string $testimonial,
    ) {
        //
    }

    public function getSource(): string
    {
        return static::SOURCE;
    }

    public function getCustomerName(): string
    {
        return $this->customerName;
    }

    public function getCustomerPhoto(): string
    {
        return $this->customerPhoto;
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function getTestimonial(): string
    {
        return $this->testimonial;
    }
}
