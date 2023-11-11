<?php

namespace App\Rules;

use App\Models\RoomType;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueRoomTypeConstant implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (RoomType::where('constant', $value)->exists()) {
            $fail('Константа ' . $value . ' уже занята');
        }
    }
}
