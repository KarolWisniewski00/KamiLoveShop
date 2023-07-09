<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(){
        $user = User::where('id', '=', Session::get('login_id'))->get();
        return view('client.saco.user.index', [
            'user' => $user[0],
            'edit' => 0
        ]);
    }
}
