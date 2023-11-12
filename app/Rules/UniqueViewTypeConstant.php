<?php

namespace App\Rules;

use App\Models\ViewType;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueViewTypeConstant implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (ViewType::where('constant', $value)->exists()) {
            $fail('Константа ' . $value . ' уже занята');
        }
    }
}
