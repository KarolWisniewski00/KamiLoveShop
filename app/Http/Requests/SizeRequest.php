<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class SizeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'value' => 'required|max:255',
        ];
    }
}
