<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class CategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'plural' => 'required|max:255',
            'url' => ['required', 'max:255', Rule::unique('subcategories'), Rule::unique('categories')],
            'photo' => 'required|max:255',
            'order' => 'required|integer',
        ];
    }
}
