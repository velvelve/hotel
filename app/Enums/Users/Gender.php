<?php

namespace App\Enums\Users;

enum Gender: string
{
    case MAN = 'M';
    case WOMAN = 'W';
    public static function getGenderTypes(): array
    {
        return [
            self::MAN->value,
            self::WOMAN->value,
        ];
    }
}
