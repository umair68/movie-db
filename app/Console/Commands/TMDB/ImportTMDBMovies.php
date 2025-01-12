<?php

namespace App\Console\Commands\TMDB;

use App\Enums\MovieReleaseStatus;
use App\Models\Movie;
use App\Services\TMDB\TMDB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ImportTMDBMovies extends Command
{
    private const array STATUS_MAP = [
        'Rumored' => MovieReleaseStatus::ComingSoon,
        'Planned' => MovieReleaseStatus::InProduction,
        'In Production' => MovieReleaseStatus::InProduction,
        'Post Production' => MovieReleaseStatus::InProduction,
        'Released' => MovieReleaseStatus::Released,
        'Canceled' => MovieReleaseStatus::Canceled,
        'Returning Series' => MovieReleaseStatus::ReReleased,
        'Pilot' => MovieReleaseStatus::LimitedRelease,
        'Ended' => MovieReleaseStatus::Released,
    ];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tmdb:import-movies
                            {--start=1 : Starting movie ID}
                            {--end=1000 : Ending movie ID}
                            {--chunk=100 : How many movies to process at once}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import movies from TMDB and store them in database';
    private TMDB $tmdbService;

    public function __construct()
    {
        parent::__construct();
        $this->tmdbService = new TMDB();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $start = (int)$this->option('start');
        $end = (int)$this->option('end');
        $chunk = (int)$this->option('chunk');

        $this->info("Starting TMDB movie import from ID {$start} to {$end}");
        $bar = $this->output->createProgressBar(($end - $start) + 1);

        for ($i = $start; $i <= $end; $i += $chunk) {
            $this->processMovieChunk($i, min($i + $chunk - 1, $end), $bar);
        }

        $bar->finish();
        $this->newLine();
        $this->info('Import completed!');
    }

    private function processMovieChunk(int $start, int $end, $bar): void
    {
        for ($movieId = $start; $movieId <= $end; $movieId++) {
            try {
                $movieData = $this->tmdbService->getMovie($movieId);

                DB::transaction(function () use ($movieData) {

                    $year = date('Y', strtotime($movieData->release_date));

                    $status = $this->mapStatus($movieData->status);

                    $movie = Movie::query()->updateOrCreate(
                        ['tmdb_id' => $movieData->id],
                        [
                            'title' => $movieData->title,
                            'slug' => $this->generateUniqueSlug($movieData->title),
                            'imdb_id' => $movieData->imdb_id,
                            'overview' => $movieData->overview,
                            'release_date' => $movieData->release_date,
                            'year' => $year,
                            'poster_path' => $movieData->poster_path,
                            'backdrop_path' => $movieData->backdrop_path,
                            'runtime' => $movieData->runtime,
                            'original_language' => $movieData->original_language,
                            'is_adult' => $movieData->adult,
                            'budget' => $movieData->budget,
                            'revenue' => $movieData->revenue,
                            'status' => $status->value,
                        ]
                    );
                });

            } catch (\Exception $e) {
                Log::error("Failed to import movie ID {$movieId}: " . $e->getMessage());
                $this->error("Failed to import movie ID {$movieId}");
            }

            $bar->advance();
        }
    }

    private function mapStatus(string $tmdbStatus): MovieReleaseStatus
    {
        if (isset(self::STATUS_MAP[$tmdbStatus])) {
            return self::STATUS_MAP[$tmdbStatus];
        }
        return MovieReleaseStatus::Released;
    }

    private function generateUniqueSlug(string $title): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 2;

        while (Movie::query()->where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
