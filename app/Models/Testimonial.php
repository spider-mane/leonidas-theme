<?php

namespace Theme\Models;

class Testimonial
{
    /**
     *
     */
    protected static $minRating = 4;

    /**
     *
     */
    public const PLACES_MAP = [
        'name' => 'author_name',
        'photo' => 'profile_photo_url',
        'rating' => 'rating',
        'text' => 'text',
    ];

    /**
     *
     */
    public const YELP_MAP = [
        'name' => '',
        'photo' => '',
        'rating' => '',
        'text' => '',
    ];

    /**
     * extract data to be anticipated by template
     */
    protected static function getReviewData(string $source, array $sourceMap, array $reviewData)
    {
        $reviews = [];

        foreach ($reviewData as $review) {

            $rating = (int) $review[$sourceMap['rating']];

            // sorry not sorry? ¯\_(ツ)_/¯
            if ($rating < static::$minRating) {
                continue;
            }

            $reviews[] = [
                'name' => $review[$sourceMap['name']],
                'photo' => $review[$sourceMap['photo']],
                'rating' => $rating,
                'source' => $source,
                'text' => $review[$sourceMap['text']],
            ];
        }

        return $reviews;
    }

    /**
     *
     */
    public static function googlePlaces(): array
    {
        $google = theme_config('api.google.places');

        # query string values
        $url = $google['url'];
        $key = $google['key'];
        $placeId = $google['placeid'];

        # uri
        $uri = "{$url}?key={$key}&placeid={$placeId}&fields=reviews";

        $google = json_decode(file_get_contents($uri), true);

        if ('OK' == $google['status']) {
            $reviews = static::getReviewData(
                'Google Places',
                static::PLACES_MAP,
                $google['result']['reviews']
            );
        }

        return $reviews ?? [];
    }

    /**
     *
     */
    public function yelp()
    {
        //
    }
}
