<?php

declare(strict_types=1);

namespace App\Services\TMDB\Repository;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class AbstractRepository
{
    protected string $apiUrl = 'https://api.themoviedb.org/3/';
    protected string $apiKey;
    protected string $apiLanguage;

    public function __construct()
    {
        $this->apiKey = config('services.tmdb.api_key');
        $this->apiLanguage = config('app.locale', 'en-US');
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
            ->get($url,[
                'api_key' => $this->apiKey,
                'language' => $this->apiLanguage,
                'append_to_response' => 'videos,images,credits,external_ids,keywords,recommendations,alternative_titles'
            ]);

        return $response->json();
    }
}
