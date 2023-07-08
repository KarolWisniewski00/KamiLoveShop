<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class HeroRequest extends FormRequest
{
    public function rules()
    {
        $id = $this->route('id');
        return [
            'h1' => 'required|max:255',
            'p' => 'required|max:255',
            'button' => 'required|max:255',
            'href' => ['required', 'max:255', Rule::notIn(['Wybierz'])],
            'photo' => 'required',
            'order' => 'required|integer',
        ];
    }
}
