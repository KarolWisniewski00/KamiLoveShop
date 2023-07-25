<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class OrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|max:255',
            'post' => 'required|max:255|regex:/^[0-9]{2}\-[0-9]{3}$/',
            'street' => 'required|max:255',
            'street_extra' => 'nullable|max:255',
            'city' => 'required|max:255',
            'phone' => 'required|max:255|regex:/^[0-9]{9}$/',
            'extra' => 'nullable|max:255',
        ];
    }
}
