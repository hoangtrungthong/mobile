<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'color_id.*' => [
                'required',
                'exists:colors,id',
            ],
            'memory_id.*' => [
                'required',
                'exists:memories,id',
            ],
            'quantity.*' => [
                'required',
                'min:1',
                'max:50',
            ],
            'price.*' => [
                'required',
                'min:1',
                'max:50',
            ],
        ];
    }
}