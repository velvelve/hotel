<?php

namespace App\Http\Requests\Admin\Phones;

use App\Enums\Hotels\PhoneType;
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
            'hotel_id' => ['required', 'integer', 'exists:hotels,id'],
            'number' => ['required', 'numeric', 'digits_between:10,12'],
            'type' => ['required', 'string', 'in:' . implode(',', PhoneType::getPhoneTypes())],
        ];
    }
}
