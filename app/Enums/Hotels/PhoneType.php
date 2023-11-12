<?php

namespace App\Enums\Hotels;

enum PhoneType: string
{
    case MAIN = 'Главный';
    case BOOKING = 'Отдел бронирования';
    case SALES  = 'Отдел продаж';
    case RECEPTION  = 'Ресепшен';
    public static function getPhoneTypes(): array
    {
        return [
            self::MAIN->value,
            self::BOOKING->value,
            self::SALES->value,
            self::RECEPTION->value,
        ];
    }
}
