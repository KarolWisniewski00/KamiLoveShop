<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class SectionRequest extends FormRequest
{
    public function rules()
    {
        $id = $this->route('id');
        return [
            'type' => ['required', Rule::notIn(['Wybierz'])],
            'content' => 'required|max:255',
            'order' => 'required|integer',
        ];
    }
}
