<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('id', '=', Session::get('login_id'))->first();
        return view('client.saco.account.user.index', [
            'user' => $user,
        ]);
    }
    public function edit($slug)
    {
        switch ($slug) {
            case 'account':
                $user = User::where('id', '=', Session::get('login_id'))->first();
                return view('client.saco.account.user.edit.account', [
                    'user' => $user,
                ]);
                break;
            case 'password':
                return view('client.saco.account.user.edit.password');
                break;
        }
    }
    public function update(Request $request, $slug)
    {
        switch ($slug) {
            case 'account':
                $res = User::where('id', '=', Session::get('login_id'))->update([
                    'name' => $request->name,
                    'surname' => $request->surname,
                    'email' => $request->email,
                ]);

                if ($res) {
                    return redirect()->route('user')->with('success', 'Konto zostało zaktualizowane.');
                } else {
                    return redirect()->route('user.edit', 'account')->with('fail', 'Konto nie zostało zaktualizowane.');
                }
                break;
            case 'password':
                $user = User::where('id', '=', Session::get('login_id'))->first();
                if (Hash::check($request->password_old, $user->password)) {
                    $res = User::where('id', '=', Session::get('login_id'))->update([
                        'password' => Hash::make($request->password),
                    ]);
                }else{
                    return redirect()->route('user.edit', 'password')->with('fail', 'Złe hasło.');
                }
                if ($res) {
                    return redirect()->route('user')->with('success', 'Hasło zostało zaktualizowane.');
                } else {
                    return redirect()->route('user.edit', 'password')->with('fail', 'Hasło nie zostało zaktualizowane.');
                }
                break;
        }
    }
    public function delete()
    {
        if (Session::has('login_id')) {
            $id = Session::get('login_id');
            Session::pull('login_id');
            Session::pull('admin');
            $res = User::where('id', '=', $id)->delete();
            if ($res) {
                return redirect()->route('index')->with('success', 'Konto zostało usunięte.');
            } else {
                return redirect()->route('index')->with('fail', 'Konto nie zostało usunięte.');
            }
        }
    }
}
