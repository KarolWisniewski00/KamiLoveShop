<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController2 extends Controller
{
    public function index()
    {
        return view('client.'.env('SHOP').'.auth.login');
    }
    public function login(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('login_id', $user->id);
                if ($user->admin == true) {
                    $request->session()->put('admin', $user->admin);
                }
                return redirect()->route('index')->with('success', 'Logowanie zakończona powodzeniem.');
            } else {
                return redirect()->route('login')->with('fail', 'Złe hasło!');
            }
        } else {
            return redirect()->route('login')->with('fail', 'Nie ma takiego użytkownika!');
        }
    }
    public function create()
    {
        return view('client.'.env('SHOP').'.auth.register');
    }
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->admin = false;
        $res = $user->save();
        if ($res) {
            return redirect()->route('login')->with('success', 'Rejestracja zakończona powodzeniem.');
        } else {
            return redirect()->route('register')->with('fail', 'Rejestracja zakończona nie powodzeniem.');
        }
    }
    public function logout()
    {
        if (Session::has('login_id')) {
            $res = Session::pull('login_id');
            Session::pull('admin');
        }
        if ($res) {
            return redirect()->route('login')->with('success', 'Wylogowanie zakończone powodzeniem.');
        } else {
            return redirect()->route('index')->with('fail', 'Wylogowanie zakończone nie powodzeniem.');
        }
    }
}
