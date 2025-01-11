<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_name' => 'required',
            'category' => 'required',
            'tag_ids' => 'array|required',
            'min' => 'required',
            'max' => 'required',
            'shop_id' => 'required'
        ];
    }

    public function messages() {
        return [
            'product_name.required' => "Данное поле необходимо для заполнения",
            'category.required' => "Данное поле необходимо для заполнения",
            'tag_ids.required' => "Данное поле необходимо для заполнения",
            'min.required' => "Данное поле необходимо для заполнения",
            'max.required' => "Данное поле необходимо для заполнения",
            'shop_id.required' => "Данное поле необходимо для заполнения",
        ];
    }

}
