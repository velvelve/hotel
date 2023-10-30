<?php

namespace App\Enums\Rooms;

use Illuminate\Support\Facades\Lang;

enum ViewTypes: string
{
    case SEA = 'SEA';
    case CITY = 'CITY';
    case GARDEN = 'GARDEN';
    case POOL = 'POOL';

    public static function getViewTypes(): array
    {
        return [
            self::SEA->value,
            self::CITY->value,
            self::GARDEN->value,
            self::POOL->value,
        ];
    }

    public static function getViewTypeObjects(): array
    {
        return [
            (object)['constant' => self::SEA->value, 'description' => 'с видом на море'],
            (object)['constant' => self::CITY->value, 'description' => 'с видом на город'],
            (object)['constant' => self::GARDEN->value, 'description' => 'с видом на сад'],
            (object)['constant' => self::POOL->value, 'description' => 'с видом на бассейн'],
        ];
    }
}
