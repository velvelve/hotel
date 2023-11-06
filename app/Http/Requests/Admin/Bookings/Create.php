<?php

namespace App\Http\Requests\Admin\Bookings;

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
            'room_id' => ['required', 'integer', 'exists:rooms,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'check_in_date' => ['required', 'date'],
            'check_out_date' => ['required', 'date'],
            'client_first_name' => ['required', 'string', 'min:1', 'max:100'],
            'client_last_name' => ['required', 'string', 'min:1', 'max:100'],
            'client_middle_name' => ['nullable', 'string', 'min:1', 'max:100'],
            'client_phone' => ['required', 'string', 'regex:/^\+[0-9]*$/', 'min:5', 'max:15'],
            'client_email' => ['required', 'email'],
            'promo_code' => ['nullable', 'string'],
            'client_wishes' => ['nullable', 'string'],
            'guests_count' => ['required', 'numeric', 'integer', 'min:1'],
            'status' => ['required', 'string', 'in:забронировано,подтверждено,отменено'],
            'total_price' => ['required', 'numeric', 'regex:/^\d{1,6}(\.\d{1,2})?$/'],
        ];
    }
}
