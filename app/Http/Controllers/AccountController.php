<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    //INDEX ACCOUNT
    public function account()
    {
        $user = User::where('id', '=', Session::get('login_id'))->get();
        return view('account.account', [
            'user' => $user[0],
            'edit' => 0
        ]);
    }
    //INDEX HISTORY
    public function history()
    {
        return view('account.history');
    }
    //INDEX EDIT
    public function edit()
    {
        $user = User::where('id', '=', Session::get('login_id'))->get();
        return view('account.account', [
            'user' => $user[0],
            'edit' => 1
        ]);
    }
    //FORM EDIT
    public function edit_form(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users,email,' . Session::get('login_id'),
            'password' => 'nullable|min:8',
            'password_confirm' => 'nullable|min:8|same:password'
        ]);

        User::where('id', '=', Session::get('login_id'))->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
        ]);

        if ($request->password != null) {
            User::where('id', '=', Session::get('login_id'))->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect('account')->with('success', 'Edycja konta zakońcona powodzeniem!');
    }
}
