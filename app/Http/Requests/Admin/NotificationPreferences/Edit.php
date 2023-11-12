<?php

namespace App\Http\Requests\Admin\NotificationPreferences;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Edit extends FormRequest
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
            'discounts' => ['boolean'],
            'special_offers' => ['boolean'],
            'bonus_earnings' => ['boolean'],
            'feedback_responses' => ['boolean'],
        ];
    }
}
