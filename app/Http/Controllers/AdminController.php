<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function admin()
    {
        return view('account.admin', [
            'panel' => 0,
            'edit' => 0,
            'id' => null
        ]);
    }
    public function categories()
    {
        return view('account.admin', [
            'panel' => 1,
            'edit' => 0,
            'id' => null
        ]);
    }
    public function categories_new()
    {
        return view('account.admin', [
            'panel' => 1,
            'edit' => 1,
            'id' => null
        ]);
    }
    public function categories_new_form(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'plural' => 'required',
            'url' => 'required|unique:categories',
            'photo' => 'required|image|mimes:jpg,png,jpeg|max:12288',
        ]);

        $photo = request()->file('photo');
        $photo_name = $photo->getClientOriginalName();
        $photo->move(public_path('/photos'), $photo_name);

        $category = new Category();
        $category->name = $request->name;
        $category->plural = $request->plural;
        $category->url = $request->url;
        $category->photo = $photo_name;

        $category->save();

        return view('account.admin', [
            'panel' => 1,
            'edit' => 0,
            'id' => null
        ]);
    }
    public function categories_delete($id)
    {
        $category = Category::where('id', '=', $id)->first();
        unlink(public_path() . '\photos\\' . $category->photo);
        Category::where('id', '=', $id)->delete();

        return view('account.admin', [
            'panel' => 1,
            'edit' => 0,
            'id' => null
        ]);
    }
    public function categories_edit($id)
    {
        return view('account.admin', [
            'panel' => 1,
            'edit' => 0,
            'id' => $id
        ]);
    }
    public function categories_edit_form(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'plural' => 'required',
            'url' =>  ['required',Rule::unique('categories')->ignore($id)],
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:12288',
        ]);

        $photo = request()->file('photo');

        if ($photo != null) {
            $category = Category::where('id', '=', $id)->first();
            unlink(public_path() . '\photos\\' . $category->photo);
            $photo_name = $photo->getClientOriginalName();
            $photo->move(public_path('/photos'), $photo_name);
            Category::where('id', '=', $id)->update([
                'photo' => $photo_name,
            ]);
        }

        Category::where('id', '=', $id)->update([
            'name' => $request->name,
            'plural' => $request->plural,
            'url' => $request->url,
        ]);

        return view('account.admin', [
            'panel' => 1,
            'edit' => 0,
            'id' => null
        ]);
    }
    public function products()
    {
        return view('account.admin', [
            'panel' => 2,
            'edit' => 0,
            'id' => null
        ]);
    }
}
