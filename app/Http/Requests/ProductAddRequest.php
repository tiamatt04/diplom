<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
    public function rules()
    {
        return [
            'product_name' => 'required',
            'product_photo' => 'required|file|mimes:png,jpeg,bmp|max:10240|image',
            'product_country' => 'required',
            'product_price' => 'required|numeric|min:0',
            'category_id' => 'required|numeric',
            'product_count' => 'required|numeric',
            'product_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Это поле обязательно для заполнения',
            'category_id.numeric' => 'Вы не выбрали категорию',
            'product_price.numeric' => 'Цена указывается цифрами',
            'product_count.numeric' => 'Количество указывается цифрами',
            'mimes' => 'Файл должен быть картинкой png, jpeg, bmp',
            'min' => 'Цена не должна быть ниже нуля',
        ];
    }
}
