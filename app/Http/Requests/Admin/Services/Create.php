<?php

namespace App\Http\Requests\Admin\Services;

use App\Rules\EnglishLettersOnly;
use App\Rules\UniqueServiceConstant;
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
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'full_description' => ['required', 'string', 'min:2', 'max:300'],
            'price' => ['required', 'numeric', 'regex:/^\d{1,6}(\.\d{1,2})?$/'],
            'constant' => ['required', 'string', new UniqueServiceConstant, new UppercaseLettersOnly, new EnglishLettersOnly],
            'icon' => ['required', 'integer', 'exists:images,id'],
            'selected_image_ids' => ['nullable', 'array']
        ];
    }
}
