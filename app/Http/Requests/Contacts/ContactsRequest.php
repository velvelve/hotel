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
            'name' => ['required', 'string', 'min:3'],
            'phone' => ['required', 'string', 'max:20', 'regex:/^\+?[0-9\s-]+$/'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'hotel' => ['required'],
            'category' => ['required'],
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
