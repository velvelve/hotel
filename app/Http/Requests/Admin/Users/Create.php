<?php

namespace App\Http\Requests\Admin\Users;

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
            'first_name' => ['required', 'string', 'min:2', 'max:40'],
            'middle_name' => ['nullable', 'string', 'min:2', 'max:40'],
            'last_name' => ['required', 'string', 'min:2', 'max:40'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric', 'min:10'],
            'country' => ['nullable', 'string', 'min:2', 'max:40'],
            'city' => ['nullable', 'string', 'min:2', 'max:40'],
            'date_of_birth' => ['nullable', 'date'],
            'password' => ['required', 'string', 'min:8'],
            'gender' => ['required', 'string'],
            'email_verified_at' => ['nullable', 'date'],
            'discounts' => ['boolean'],
            'special_offers' => ['boolean'],
            'bonus_earnings' => ['boolean'],
            'feedback_responses' => ['boolean'],
            'role_id' => ['required', 'integer', 'exists:roles,id'],
        ];
    }
}
