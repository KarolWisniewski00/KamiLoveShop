<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;

class SizesAdminController extends Controller
{
    //INDEX SIZES
    public function sizes()
    {
        return view('account.admin.sizes', [
            'new' => 0,
            'id' => null,
            'sizes' => Size::get()
        ]);
    }
    //NEW SIZES
    public function sizes_new()
    {
        return view('account.admin.sizes', [
            'new' => 1,
            'id' => null,
            'sizes' => Size::get()
        ]);
    }
    //NEW FORM SIZES
    public function sizes_new_form(Request $request)
    {
        $request->validate([
            'value' => 'required|max:255',
        ]);

        $size = new Size();
        $size->value = $request->value;

        $size->save();

        return view('account.admin.sizes', [
            'new' => 0,
            'id' => null,
            'sizes' => Size::get()
        ]);
    }
    //EDIT SIZES
    public function sizes_edit($id)
    {
        return view('account.admin.sizes', [
            'new' => 0,
            'id' => $id,
            'sizes' => Size::get()
        ]);
    }
    //EDIT FORM SIZES
    public function sizes_edit_form(Request $request, $id)
    {
        $request->validate([
            'value' => 'required|max:255',
        ]);

        Size::where('id', '=', $id)->update([
            'value' => $request->value,
        ]);

        return view('account.admin.sizes', [
            'new' => 0,
            'id' => null,
            'sizes' => Size::get()
        ]);
    }
    //DELETE SIZES
    public function sizes_delete($id)
    {
        Size::where('id', '=', $id)->delete();

        return view('account.admin.sizes', [
            'new' => 0,
            'id' => null,
            'sizes' => Size::get()
        ]);
    }
}
