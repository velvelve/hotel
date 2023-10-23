<?php

namespace App\Http\Requests\Contacts;

use Illuminate\Foundation\Http\FormRequest;

class ContactsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:15'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'hotel' => ['required', 'min:3'],
            'message' => ['required', 'min:8'],
        ];
    }

    public function attributes(): array
    {
        return [
            'hotel' => 'отель',
        ];
    }
}
