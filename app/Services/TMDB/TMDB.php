<?php

declare(strict_types=1);

namespace App\Services\TMDB;

use App\DTO\TMDBMovieResponseDTO;
use App\Services\TMDB\Repository\AbstractRepository;
use App\Services\TMDB\Repository\MovieRepository;

final class TMDB extends AbstractRepository
{
    /**
     * Get the MovieRepository.
     *
     *
     * @return MovieRepository
     */
    public function movie(): MovieRepository
    {
        return new MovieRepository();

    }

    public function getMovie(int $movieId): TMDBMovieResponseDTO
    {
        return TMDBMovieResponseDTO::fromArray(
            $this->movie()->details($movieId)
        );

    }

}
