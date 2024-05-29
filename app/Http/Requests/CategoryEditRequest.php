<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryEditRequest extends FormRequest
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
            'category_name' => 'required|max:20'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Это поле обязательно для заполнения',
            'max'=> 'Максимально 20 символов'
        ];
    }
}
