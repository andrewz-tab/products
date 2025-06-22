<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\BaseRequest;

class OrderRequest extends BaseRequest
{
    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'comment' => 'nullable|string|max:1000',
            'amount' => 'required|numeric|min:1',
        ];
    }
}
