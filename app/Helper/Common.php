<?php

declare(strict_types=1);

namespace App\Helper;

use InvalidArgumentException;

final class Common
{
    /**
     * Generate a TMDB media URL using only size (e.g., 'w300', 'h60', 'original').
     *
     * @param string|null $path The media path from TMDB (e.g., '/path_to_image.jpg').
     * @param string $size The size of the image (e.g., 'w300', 'h60', 'original').
     * @return string The full URL to the image.
     * @todo this will be replaced when the images are hosted my us
     */
    public static function mediaSize(?string $path, string $size = 'original'): string
    {
        if ( ! $path) {
            return '/images/placeholder-poster.jpg';
        }

        $allowedSizes = [
            'w92', 'w154', 'w185', 'w300', 'w342', 'w500', 'w780', 'w1280',
            'h60', 'h90', 'original'
        ];

        if ( ! in_array($size, $allowedSizes, true)) {
            throw new InvalidArgumentException("Invalid size: {$size}. Allowed sizes are: " . implode(', ', $allowedSizes));
        }

        return "https://image.tmdb.org/t/p/{$size}{$path}";
    }
}
