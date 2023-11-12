<?php

namespace App\Http\Requests\Admin\Images;

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
            'hotel_id' => ['nullable', 'exists:hotels,id'],
            'room_id' => ['nullable', 'exists:rooms,id'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
            'filename' => ['required', 'string', 'min:1', 'max:100'],
            'destination_folder' => 'nullable',
        ];
    }
}
