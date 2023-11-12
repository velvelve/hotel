<?php

namespace App\Http\Requests\Admin\Rooms;

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
            'room_number' => ['required', 'string', 'min:1', 'max:10'],
            'description' => ['required', 'string', 'min:1', 'max:200'],
            'area' => ['required', 'numeric', 'integer', 'min:10'],
            'apartment_count' => ['required', 'numeric', 'integer', 'min:1', 'max:6'],
            'adults_max_guests' => ['required', 'numeric', 'integer', 'min:1', 'max:5'],
            'children_max_guests' => ['required', 'numeric', 'integer', 'min:0', 'max:5'],
            'price' => ['required', 'numeric', 'regex:/^\d{1,6}(\.\d{1,2})?$/'],
            'availability' => ['boolean'],
            'room_type_id' => ['required', 'integer', 'exists:room_types,id'],
            'view_type_id' => ['required', 'integer', 'exists:view_types,id'],
            'bed_type_id' => ['required', 'integer', 'exists:bed_types,id'],
            'selected_image_paths' => ['required', 'array', 'min:1'],
        ];
    }
}
