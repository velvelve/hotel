<?php

namespace App\Enums\Rooms;

enum RoomTypes: string
{
    case STANDARD = 'Standard';
    case SUPERIOR = 'Superior';
    case PREMIUM = 'Premium';
    case LUX = 'Lux';
    case FAMILY = 'Family';
    public static function getRoomTypes(): array
    {
        return [
            self::STANDARD->value,
            self::SUPERIOR->value,
            self::PREMIUM->value,
            self::LUX->value,
            self::FAMILY->value,
        ];
    }

    public static function getRoomTypeObjects(): array
    {
        return [
            (object)['name' => self::STANDARD->value, 'description' => 'Комфортабельныe и уютные номера для вашего пребывания.'],
            (object)['name' => self::SUPERIOR->value, 'description' => 'Просторные и стильные номера с дополнительными удобствами.'],
            (object)['name' => self::PREMIUM->value, 'description' => 'Прекрасное жилье с изысканным декором и  уникальным дизайном.'],
            (object)['name' => self::LUX->value, 'description' => 'Роскошные номера с прекрасным видом и сервисом высшего класса.'],
            (object)['name' => self::FAMILY->value, 'description' => 'Просторное жилье, идеальное для семейного отдыха.']

        ];
    }
}
