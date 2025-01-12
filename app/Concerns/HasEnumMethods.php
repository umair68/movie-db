<?php

declare(strict_types=1);

namespace App\Concerns;

trait HasEnumMethods
{
    public static function values(): array
    {
        return array_map(fn ($enum) => $enum->value, self::cases());
    }

    public static function names(): array
    {
        return array_map(fn ($enum) => $enum->name, self::cases());
    }

    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(fn ($enum) => [
            $enum->value => $enum->label()
        ])->all();
    }
}
