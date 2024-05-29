<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'booking_name' => 'required|regex:/^[А-Яа-яЁё\s-]+$/u',
            'booking_number' => 'required',
            'booking_time' => 'required',
            'count_people' => 'required',
            'booking_date' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Форма на бронирования заполнена не корректно. Все поля должны быть заполнены!',
            'booking_name.regex' => 'Разрешены только кириллица, пробел и тире',

        ];
    }
}
