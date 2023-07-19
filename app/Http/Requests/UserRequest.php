<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class UserRequest extends FormRequest
{
    public function rules()
    {
        $slug = $this->route('slug');
        switch ($slug) {
            case 'account':
                return [
                    'name' => 'required|max:255',
                    'surname' => 'required|max:255',
                    'email' => 'required|max:255|email|unique:users,email,' . Session::get('login_id'),
                ];
                break;
            case 'password':
                return [
                    'password_old' => 'required|min:8|max:255',
                    'password' => 'required|min:8|max:255',
                    'password_confirm' => 'required|min:8|max:255|same:password'
                ];
                break;
        }
    }
}
