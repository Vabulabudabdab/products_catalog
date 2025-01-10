<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'title' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'avaible' => 'required',
            'desc' => 'required',
            'tag_ids' => 'required|array',
            'image' => 'file|required',
            'shop_id' => 'required',
            'colors' => 'required|array',
            'old_price' => 'required'
        ];
    }
}
