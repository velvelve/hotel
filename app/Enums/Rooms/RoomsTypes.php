<?php

namespace App\Enums\Rooms;

enum RoomsTypes:string
{
    case STANDARD = 'Standard';
    case SUPERIOR = 'Superior';
    case PREMIUM = 'Premium';
    case LUX = 'Lux';
    case FAMILY = 'Family';
    public static function getRoomsEnums(): array
    {
        return [
            self::STANDARD->value,
            self::SUPERIOR->value,
            self::PREMIUM->value,
            self::LUX->value,
            self::FAMILY->value,
        ];
    }
}
