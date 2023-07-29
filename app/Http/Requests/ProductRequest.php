<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ProductRequest extends FormRequest
{
    public function rules()
    {
        $id = $this->route('id');
        return [
            'name' => 'required|max:255',
            'short_description' => 'required|max:255',
            'long_description' => 'required|max:255',
            'normal_price' => 'required|numeric|gt:0',
            'sale_price' => 'required|numeric',
            'SKU' => ['required', 'max:255', Rule::unique('products')->ignore($id)],
            'category' => 'required',
            'subcategory' => 'nullable',
            'photo' => 'required',
            'photos' => 'nullable',
            'order' => 'required|integer',
            'size' => 'nullable'
        ];
    }
}
