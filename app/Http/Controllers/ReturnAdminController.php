<?php

namespace App\Http\Controllers;

use App\Models\Ret;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReturnAdminController extends Controller
{
    //INDEX RETURN
    public function return()
    {
        return view('account.admin.return', [
            'new' => 0,
            'id' => null,
            'return' => Ret::get(),
        ]);
    }
    //NEW RETURN
    public function return_new()
    {
        return view('account.admin.return', [
            'new' => 1,
            'id' => null,
            'return' => Ret::get(),
        ]);
    }
    //NEW FORM RETURN
    public function return_new_form(Request $request)
    {
        $request->validate([
            'type' => ['required', Rule::notIn(['Wybierz'])],
            'content' => 'required|max:255',
            'order' => 'nullable|integer|max:255',
        ]);

        $return = new Ret();
        $return->type = $request->type;
        $return->content = $request->content;
        $return->order = $request->order;

        $return->save();

        return view('account.admin.return', [
            'new' => 0,
            'id' => null,
            'return' => Ret::get(),
        ]);
    }
    //EDIT RETURN
    public function return_edit($id)
    {
        return view('account.admin.return', [
            'new' => 0,
            'id' => $id,
            'return' => Ret::get(),
        ]);
    }
    //EDIT FORM RETURN
    public function return_edit_form(Request $request, $id)
    {
        $request->validate([
            'type' => ['required', Rule::notIn(['Wybierz'])],
            'content' => 'required|max:255',
            'order' => 'nullable|integer|max:255',
        ]);

        Ret::where('id', '=', $id)->update([
            'type' => $request->type,
            'content' => $request->content,
            'order' => $request->order,
        ]);

        return view('account.admin.return', [
            'new' => 0,
            'id' => null,
            'return' => Ret::get(),
        ]);
    }
    //DELETE RETURN
    public function return_delete($id)
    {
        Ret::where('id', '=', $id)->delete();

        return view('account.admin.return', [
            'new' => 0,
            'id' => null,
            'return' => Ret::get(),
        ]);
    }
}
