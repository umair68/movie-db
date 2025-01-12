<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\MovieReleaseStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Movie extends Model
{
    /** @use HasFactory<\Database\Factories\MovieFactory> */
    use HasFactory;

    protected $table = 'movies';
    protected $fillable = [
        'title',
        'tmdb_id',
        'imdb_id',
        'slug',
        'overview',
        'release_date',
        'year',
        'poster_path',
        'backdrop_path',
        'trailer_url',
        'runtime',
        'original_language',
        'is_adult',
        'budget',
        'revenue',
        'status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'release_date' => 'date',
            'is_adult' => 'boolean',
            'tmdb_id' => 'integer',
            'runtime' => 'integer',
            'budget' => 'integer',
            'revenue' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'status' => MovieReleaseStatus::class,

        ];
    }

    public function addedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }

}
