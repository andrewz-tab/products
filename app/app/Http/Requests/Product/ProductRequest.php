<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\BaseRequest;

class ProductRequest extends BaseRequest
{
    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255|string',
            'description' => 'required|max:1000|string',
            'category_id' => 'required|int|exists:categories,id',
            'price' => 'required|decimal:0,2|min:0|max:9999999999.99',
        ];
    }
}
