<?php

declare(strict_types=1);

namespace App\Contracts;

interface EnumInterface
{
    /**
     * Return an array of values for the enum.
     *
     * @return array<int|string> Array of enum values
     */
    public static function values(): array;

    /**
     * Return an array of enum case names.
     *
     * @return array<string> Array of enum names
     */
    public static function names(): array;

    /**
     * Return a list of options in a key-value pair.
     *
     * @return array<string|int, string> Key-value pair of enum values and labels
     */
    public static function options(): array;
    public function label(): string;
}
