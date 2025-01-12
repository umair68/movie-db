<?php

declare(strict_types=1);

namespace App\Services\TMDB\Repository;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

abstract class AbstractRepository
{
    private string $apiUrl = 'https://api.themoviedb.org/3/';
    private string $apiKey;
    private string $apiLanguage;

    /**
     * @throws ConnectionException
     */
    public function __construct()
    {


        $this->apiKey = config('services.tmdb.api_key');
        $this->apiLanguage = config('services.tmdb.api_locale');
    }

    /**
     * Send a GET request to the API.
     *
     * @param string $endpoint
     * @param array<string, int> $parameters
     * @return array<string, mixed>
     * @throws ConnectionException
     */
    public function request(string $endpoint, array $parameters = []): array
    {
        $url = $this->apiUrl . $endpoint;

        $response = Http::acceptJson()
            ->withQueryParameters($parameters)
            ->get($url, [
                'api_key' => $this->getApiKey(),
                'language' => $this->apiLanguage,
                'append_to_response' => 'videos,images,credits,external_ids,keywords,recommendations,alternative_titles'
            ]);

        return $response->json();
    }

    /**
     * @throws ConnectionException
     */
    private function getApiKey(): string
    {
        if (!$this->apiKey) {
            throw new ConnectionException('The TMDB API key is not configured correctly.');
        }

        return $this->apiKey;
    }
}
