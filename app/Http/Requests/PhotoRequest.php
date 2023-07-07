<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class PhotoRequest extends FormRequest
{
    public function rules()
    {
        return [
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'photo_name' => 'required|string|max:255',
        ];
    }
}
