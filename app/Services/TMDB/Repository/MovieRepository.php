<?php

declare(strict_types=1);

namespace App\Services\TMDB\Repository;

/**
 * @see https://developers.themoviedb.org/3/movies
 */
final class MovieRepository extends AbstractRepository
{
    /**
     * @see https://developers.themoviedb.org/3/movies/get-movie-details
     */
    public function details($movieId): array
    {
        return $this->request("movie/" . $movieId);
    }

    /**
     * @see https://developers.themoviedb.org/3/movies/get-movie-alternative-titles
     */
    public function alternativeTitles($movieId): array
    {
        return $this->request("movie/" . $movieId . "/alternative_titles");
    }

    /**
     * @see https://developers.themoviedb.org/3/movies/get-movie-changes
     */
    public function changes($movieId): array
    {
        return $this->request("movie/" . $movieId . "/changes");
    }

    /**
     * @see https://developers.themoviedb.org/3/movies/get-movie-credits
     */
    public function credits($movieId): array
    {
        return $this->request("movie/" . $movieId . "/credits");
    }

    /**
     * @see https://developers.themoviedb.org/3/movies/get-movie-external-ids
     */
    public function externalIds($movieId): array
    {
        return $this->request("movie/" . $movieId . "/external_ids");
    }

    /**
     * @see https://developers.themoviedb.org/3/movies/get-movie-images
     */
    public function images($movieId): array
    {
        return $this->request("movie/" . $movieId . "/images");
    }

    /**
     * @see https://developers.themoviedb.org/3/movies/get-movie-keywords
     */
    public function keywords($movieId): array
    {
        return $this->request("movie/" . $movieId . "/keywords");
    }

    /**
     * @see https://developers.themoviedb.org/3/movies/get-movie-lists
     */
    public function lists($movieId): array
    {
        return $this->request("movie/" . $movieId . "/lists");
    }

    /**
     * @see https://developers.themoviedb.org/3/movies/get-movie-recommendations
     */
    public function recommendations($movieId): array
    {
        return $this->request("movie/" . $movieId . "/recommendations");
    }

    /**
     * @see https://developers.themoviedb.org/3/movies/get-movie-release-dates
     */
    public function releaseDates($movieId): array
    {
        return $this->request("movie/" . $movieId . "/release_dates");
    }

    /**
     * @see https://developers.themoviedb.org/3/movies/get-movie-reviews
     */
    public function reviews($movieId): array
    {
        return $this->request("movie/" . $movieId . "/reviews");
    }

    /**
     * @see https://developers.themoviedb.org/3/movies/get-similar-movies
     */
    public function similar($movieId): array
    {
        return $this->request("movie/" . $movieId . "/similar");
    }

    /**
     * @see https://developers.themoviedb.org/3/movies/get-movie-translations
     */
    public function translations($movieId): array
    {
        return $this->request("movie/" . $movieId . "/translations");
    }

    /**
     * @see https://developers.themoviedb.org/3/movies/get-movie-videos
     */
    public function videos($movieId): array
    {
        return $this->request("movie/" . $movieId . "/videos");
    }

    /**
     * @see https://developers.themoviedb.org/3/movies/get-movie-watch-providers
     */
    public function watchProviders($movieId): array
    {
        return $this->request("movie/" . $movieId . "/watch/providers");
    }

    /**
     * @see https://developers.themoviedb.org/3/movies/get-latest-movie
     */
    public function latest(): array
    {
        return $this->request("movie/latest");
    }

    /**
     * @see https://developers.themoviedb.org/3/movies/get-now-playing
     */
    public function nowPlaying(): array
    {
        return $this->request("movie/now_playing");
    }

    /**
     * @see https://developers.themoviedb.org/3/movies/get-popular-movies
     */
    public function popular(): array
    {
        return $this->request("movie/popular");
    }

    /**
     * @see https://developers.themoviedb.org/3/movies/get-top-rated-movies
     */
    public function topRated(): array
    {
        return $this->request("movie/top_rated");
    }

    /**
     * @see https://developers.themoviedb.org/3/movies/get-upcoming
     */
    public function upcoming(): array
    {
        return $this->request("movie/upcoming");
    }
}
