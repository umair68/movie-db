<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\HasEnumMethods;
use App\Contracts\EnumInterface;

enum Language: int implements EnumInterface
{
    use HasEnumMethods;

    case Unknown = 0;
    case English = 1;
    case French = 2;
    case Spanish = 3;
    case German = 4;
    case Italian = 5;
    case Portuguese = 6;
    case Dutch = 7;
    case Russian = 8;
    case Chinese = 9;
    case Japanese = 10;
    case Arabic = 11;
    case Hindi = 12;
    case Korean = 13;
    case Turkish = 14;
    case Vietnamese = 15;
    case Bengali = 16;
    case Urdu = 17;
    case Punjabi = 18;
    case Marathi = 19;
    case Telugu = 20;
    case Tamil = 21;
    case Gujarati = 22;
    case Malayalam = 23;
    case Kannada = 24;
    case Oriya = 25;
    case Filipino = 26;
    case Polish = 27;
    case Romanian = 28;
    case Ukrainian = 29;
    case Greek = 30;
    case Hebrew = 31;
    case Swedish = 32;
    case Norwegian = 33;
    case Danish = 34;
    case Finnish = 35;
    case Hungarian = 36;
    case Czech = 37;
    case Slovak = 38;
    case Bulgarian = 39;
    case Serbian = 40;
    case Croatian = 41;
    case Bosnian = 42;
    case Albanian = 43;
    case Icelandic = 44;
    case Estonian = 45;
    case Latvian = 46;
    case Lithuanian = 47;
    case Slovenian = 48;

    public function label(): string
    {
        return match ($this) {
            self::English => 'English',
            self::French => 'French',
            self::Spanish => 'Spanish',
            self::German => 'German',
            self::Italian => 'Italian',
            self::Portuguese => 'Portuguese',
            self::Dutch => 'Dutch',
            self::Russian => 'Russian',
            self::Chinese => 'Chinese',
            self::Japanese => 'Japanese',
            self::Arabic => 'Arabic',
            self::Hindi => 'Hindi',
            self::Korean => 'Korean',
            self::Turkish => 'Turkish',
            self::Vietnamese => 'Vietnamese',
            self::Bengali => 'Bengali',
            self::Urdu => 'Urdu',
            self::Punjabi => 'Punjabi',
            self::Marathi => 'Marathi',
            self::Telugu => 'Telugu',
            self::Tamil => 'Tamil',
            self::Gujarati => 'Gujarati',
            self::Malayalam => 'Malayalam',
            self::Kannada => 'Kannada',
            self::Oriya => 'Oriya',
            self::Filipino => 'Filipino',
            self::Polish => 'Polish',
            self::Romanian => 'Romanian',
            self::Ukrainian => 'Ukrainian',
            self::Greek => 'Greek',
            self::Hebrew => 'Hebrew',
            self::Swedish => 'Swedish',
            self::Norwegian => 'Norwegian',
            self::Danish => 'Danish',
            self::Finnish => 'Finnish',
            self::Hungarian => 'Hungarian',
            self::Czech => 'Czech',
            self::Slovak => 'Slovak',
            self::Bulgarian => 'Bulgarian',
            self::Serbian => 'Serbian',
            self::Croatian => 'Croatian',
            self::Bosnian => 'Bosnian',
            self::Albanian => 'Albanian',
            self::Icelandic => 'Icelandic',
            self::Estonian => 'Estonian',
            self::Latvian => 'Latvian',
            self::Lithuanian => 'Lithuanian',
            self::Slovenian => 'Slovenian',
            default => 'Unknown',
        };
    }

    public function shortLabel(): string
    {
        return match ($this) {
            self::Unknown => 'Unknown',
            self::English => 'EN',
            self::French => 'FR',
            self::Spanish => 'ES',
            self::German => 'DE',
            self::Italian => 'IT',
            self::Portuguese => 'PT',
            self::Dutch => 'NL',
            self::Russian => 'RU',
            self::Chinese => 'ZH',
            self::Japanese => 'JA',
            self::Arabic => 'AR',
            self::Hindi => 'HI',
            self::Korean => 'KO',
            self::Turkish => 'TR',
            self::Vietnamese => 'VI',
            self::Bengali => 'BN',
            self::Urdu => 'UR',
            self::Punjabi => 'PA',
            self::Marathi => 'MR',
            self::Telugu => 'TE',
            self::Tamil => 'TA',
            self::Gujarati => 'GU',
            self::Malayalam => 'ML',
            self::Kannada => 'KN',
            self::Oriya => 'OR',
            self::Filipino => 'TL',
            self::Polish => 'PL',
            self::Romanian => 'RO',
            self::Ukrainian => 'UK',
            self::Greek => 'EL',
            self::Hebrew => 'HE',
            self::Swedish => 'SV',
            self::Norwegian => 'NO',
            self::Danish => 'DA',
            self::Finnish => 'FI',
            self::Hungarian => 'HU',
            self::Czech => 'CS',
            self::Slovak => 'SK',
            self::Bulgarian => 'BG',
            self::Serbian => 'SR',
            self::Croatian => 'HR',
            self::Bosnian => 'BS',
            self::Albanian => 'SQ',
            self::Icelandic => 'IS',
            self::Estonian => 'ET',
            self::Latvian => 'LV',
            self::Lithuanian => 'LT',
            self::Slovenian => 'SL',
        };
    }
}
