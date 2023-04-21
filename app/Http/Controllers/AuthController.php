<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //INDEX LOGIN
    public function login_page()
    {
        return view('auth.login');
    }
    //FORM LOGIN
    public function login_form(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:255'
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('login_id', $user->id);
                if ($user->admin == true) {
                    $request->session()->put('admin', $user->admin);
                }
                return redirect('/')->with('success', 'Logowanie zakończone powodzeniem!');
            } else {
                return redirect('/login')->with('fail', "Złe hasło!");
            }
        } else {
            return redirect('/login')->with('fail', 'Nie ma takiego użytkownika!');
        }
    }
    //INDEX REGISTER
    public function register_page()
    {
        return view('auth.register');
    }
    //FORM REGISTER
    public function register_form(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|max:255',
            'password_confirm' => 'required|min:8|same:password|max:255'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->admin = false;
        $res = $user->save();

        if ($res) {
            return redirect('/login')->with('success', 'Rejestracja zakończona powodzeniem!');
        } else {
            return redirect('/')->with('fail', 'Error!');
        }
    }
    //LOGOUT
    public function logout()
    {
        if (Session::has('login_id')) {
            Session::pull('login_id');
            Session::pull('admin');
            return redirect('/');
        }
    }
}
