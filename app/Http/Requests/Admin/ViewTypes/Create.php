<?php

namespace App\Http\Requests\Admin\ViewTypes;

use App\Rules\EnglishLettersOnly;
use App\Rules\UniqueViewTypeConstant;
use App\Rules\UppercaseLettersOnly;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'description' => ['required', 'string', 'min:2', 'max:300'],
            'constant' => ['required', 'string', new UniqueViewTypeConstant, new UppercaseLettersOnly, new EnglishLettersOnly],
        ];
    }
}
