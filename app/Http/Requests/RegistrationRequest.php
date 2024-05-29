<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'login' => 'required|unique:users|regex:/^[a-zA-Z0-9_\-]{3,20}$/',
            'password' => 'required|min:6',
            'number' => 'required|unique:users|regex:/^\+7(\d{3})\d{7}$/',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Это поле обязательно для заполнения',
            'unique' => 'Значение уже занято',
            'number.regex' => 'Введите корректный номер телефона',
            'login.regex' => 'Мин: 3 символа,разрешены только латиница, нижние подчеркивание и тире',
            'min' => 'Пароль должен содержать не меньше 6 символов',
        ];
    }
}
