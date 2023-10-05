<?php

namespace App\Enums\Booking;

enum Status: string
{
    case BOOKED = 'забронировано';
    case CONFIRMED = 'подтверждено';
    case CANCELLED = 'отменено';

    public static function getEnums(): array
    {
        return [
            self::BOOKED->value,
            self::CONFIRMED->value,
            self::CANCELLED->value,
        ];
    }
}
