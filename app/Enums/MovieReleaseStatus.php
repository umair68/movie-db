<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\HasEnumMethods;
use App\Contracts\EnumInterface;

enum MovieReleaseStatus: int implements EnumInterface
{
    use HasEnumMethods;

    case Released = 0;
    case Upcoming = 1;
    case Postponed = 2;
    case Delayed = 3;
    case Canceled = 4;
    case InProduction = 5;
    case Premiere = 6;
    case OnHold = 7;
    case ComingSoon = 8;
    case LimitedRelease = 9;
    case DelayedIndefinitely = 10;
    case DigitalRelease = 11;
    case InternationalRelease = 12;
    case ReReleased = 13;

    // Return the label for each status
    public function label(): string
    {
        return match ($this) {
            self::Upcoming => 'Upcoming Release',
            self::Released => 'Released',
            self::Delayed => 'Delayed',
            self::Canceled => 'Canceled',
            self::Postponed => 'Postponed',
            self::InProduction => 'In Production',
            self::Premiere => 'Premiere',
            self::OnHold => 'On Hold',
            self::ComingSoon => 'Coming Soon',
            self::LimitedRelease => 'Limited Release',
            self::DelayedIndefinitely => 'Delayed Indefinitely',
            self::DigitalRelease => 'Digital Release',
            self::InternationalRelease => 'International Release',
            self::ReReleased => 'Re-released',
        };
    }
}
