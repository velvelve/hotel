<?php

namespace App\Enums\Rooms;

use Illuminate\Support\Facades\Lang;

enum BedTypes: string
{
    case SINGLE = 'SINGLE'; // 1
    case TWO_SINGLE = 'TWO_SINGLE'; // 2
    case DOUBLE = 'DOUBLE'; // 3
    case TWO_SINGLE_ONE_ADDITIONAL = 'TWO_SINGLE_ONE_ADDITIONAL'; // 4
    case ONE_DOUBLE_ONE_ADDITIONAL = 'ONE_DOUBLE_ONE_ADDITIONAL'; // 5
    case TWO_SINGLE_TWO_ADDITIONAL = 'TWO_SINGLE_TWO_ADDITIONAL'; // 6
    case ONE_DOUBLE_TWO_ADDITIONAL = 'ONE_DOUBLE_TWO_ADDITIONAL'; // 7
    case TWO_DOUBLE_ONE_ADDITIONAL = 'TWO_DOUBLE_ONE_ADDITIONAL'; // 8
    case ONE_DOUBLE_THREE_ADDITIONAL = 'ONE_DOUBLE_THREE_ADDITIONAL'; // 9

    public static function getBedTypes(): array
    {
        return [
            self::SINGLE->value,
            self::TWO_SINGLE->value,
            self::DOUBLE->value,
            self::TWO_SINGLE_ONE_ADDITIONAL->value,
            self::ONE_DOUBLE_ONE_ADDITIONAL->value,
            self::TWO_SINGLE_TWO_ADDITIONAL->value,
            self::ONE_DOUBLE_TWO_ADDITIONAL->value,
            self::TWO_DOUBLE_ONE_ADDITIONAL->value,
            self::ONE_DOUBLE_THREE_ADDITIONAL->value,
        ];
    }

    public static function getBedTypeObjects(): array
    {
        return [
            (object)['constant' => self::SINGLE->value, 'description' => 'односпальная кровать'],
            (object)['constant' => self::TWO_SINGLE->value, 'description' => '2 односпальных кровати'],
            (object)['constant' => self::DOUBLE->value, 'description' => 'двуспальная кровать'],
            (object)['constant' => self::TWO_SINGLE_ONE_ADDITIONAL->value, 'description' => '2 односпальных кровати с дополнительной'],
            (object)['constant' => self::ONE_DOUBLE_ONE_ADDITIONAL->value, 'description' => 'двуспальная кровать с дополнительной'],
            (object)['constant' => self::TWO_SINGLE_TWO_ADDITIONAL->value, 'description' => '2 односпальных кровати с 2 дополнительными'],
            (object)['constant' => self::ONE_DOUBLE_TWO_ADDITIONAL->value, 'description' => 'двуспальная кровать с 2 дополнительными'],
            (object)['constant' => self::TWO_DOUBLE_ONE_ADDITIONAL->value, 'description' => '2 двуспальных кровати с дополнительной'],
            (object)['constant' => self::ONE_DOUBLE_THREE_ADDITIONAL->value, 'description' => 'двуспальная кровать с 3 дополнительными']

        ];
    }
}
