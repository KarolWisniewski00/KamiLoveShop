<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class CategoryRequest extends FormRequest
{
    public function rules()
    {
        $id = $this->route('id');
        return [
            'name' => 'required|max:255',
            'plural' => 'required|max:255',
            'url' => ['required', 'max:255', Rule::unique('subcategories')->ignore($id), Rule::unique('categories')],
            'photo' => 'required|max:255',
            'order' => 'required|integer',
        ];
    }
}
