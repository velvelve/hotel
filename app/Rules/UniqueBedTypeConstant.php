<?php

namespace App\Rules;

use App\Models\BedType;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueBedTypeConstant implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (BedType::where('constant', $value)->exists()) {
            $fail('Константа ' . $value . ' уже занята');
        }
    }
}
