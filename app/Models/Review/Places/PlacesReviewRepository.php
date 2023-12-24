<?php

namespace PseudoVendor\PseudoTheme\Models\Review\Places;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;

class PlacesReviewRepository
{
    public function __construct(
        protected string $url,
        protected string $apiKey,
        protected string $placeId,
        protected ClientInterface $client,
        protected RequestFactoryInterface $requestFactory,
    ) {
    }

    /**
     * @return list<PlacesReview>
     */
    public function getReviews(): array
    {
        $uri = $this->getUri($this->url, $this->apiKey, $this->placeId);
        $request = $this->requestFactory->createRequest('GET', $uri);
        $response = $this->client->sendRequest($request);

        $data = json_decode($response->getBody(), true);

        if ('OK' == $data['status']) {
            $data = $data['result']['reviews'];
            $reviews = [];

            foreach ($data as $data) {
                $reviews[] = new PlacesReview(
                    $data['author_name'],
                    $data['profile_photo_url'],
                    $data['rating'],
                    $data['text'],
                );
            }
        }

        return $reviews;
    }

    protected function getUri(string $url, string $key, string $placeId): string
    {
        return "{$url}?key={$key}&placeid={$placeId}&fields=reviews";
    }
}
