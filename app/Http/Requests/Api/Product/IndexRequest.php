<?php

namespace App\Http\Requests\Api\Product;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
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
            'properties' => ['nullable'],
            'properties.name' => ['array'],
            'properties.price' => ['array'],
            'properties.count' => ['array'],
        ];
    }
}
