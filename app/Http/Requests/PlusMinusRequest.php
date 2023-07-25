<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class PlusMinusRequest extends FormRequest
{
    public function rules()
    {
        return [
            'product_id' => 'required|max:255|integer',
            'quantity' => 'required|max:255|integer',
            'size_value' => 'nullable|max:255',
        ];
    }
}
