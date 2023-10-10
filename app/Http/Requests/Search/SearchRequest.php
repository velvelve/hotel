<?php

namespace App\Http\Requests\Search;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'guest_count' => ['required', 'numeric', 'between:1,5'],
        ];

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            redirect()->route('home')->withErrors($validator)->withInput()
        );
    }

    public function messages(): array
    {
        return [
            'guest_count.required' => 'Обязательно для заполнения.',
            'guest_count.numeric' => 'Поле :attribute должно быть числовым.',
            'guest_count.between' => ':attribute должно быть от :min до :max.',
        ];
    }

    public function attributes(): array
    {
        return [
            'guest_count' => 'Кол-во гостей',
        ];
    }
}
