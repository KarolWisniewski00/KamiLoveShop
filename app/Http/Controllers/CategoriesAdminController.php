<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Validation\Rule;
use Exception;

class CategoriesAdminController extends Controller
{
    //INDEX CATEGORIES
    public function categories()
    {
        return view('account.admin.categories', [
            'new' => 0,
            'id' => null,
            'subcategories'=>Subcategory::get(),
            'new_sub'=>0,
            'id_sub'=>null
        ]);
    }
    //NEW CATEGORIES
    public function categories_new()
    {
        return view('account.admin.categories', [
            'new' => 1,
            'id' => null,
            'subcategories'=>Subcategory::get(),
            'new_sub'=>0,
            'id_sub'=>null
        ]);
    }
    //NEW FORM CATEGORIES
    public function categories_new_form(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'plural' => 'required|max:255',
            'url' => ['required','max:255', Rule::unique('subcategories'),Rule::unique('categories')],
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

        return view('account.admin.categories', [
            'new' => 0,
            'id' => null,
            'subcategories'=>Subcategory::get(),
            'new_sub'=>0,
            'id_sub'=>null
        ]);
    }
    //EDIT CATEGORIES
    public function categories_edit($id)
    {
        return view('account.admin.categories', [
            'new' => 0,
            'id' => $id,
            'subcategories'=>Subcategory::get(),
            'new_sub'=>0,
            'id_sub'=>null

        ]);
    }
    //EDIT FORM CATEGORIES
    public function categories_edit_form(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'plural' => 'required|max:255',
            'url' =>  ['required','max:255', Rule::unique('categories')->ignore($id),Rule::unique('subcategories')],
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

        return view('account.admin.categories', [
            'new' => 0,
            'id' => null,
            'subcategories'=>Subcategory::get(),
            'new_sub'=>0,
            'id_sub'=>null
        ]);
    }
    //DELETE CATEGORIES
    public function categories_delete($id)
    {
        $category = Category::where('id', '=', $id)->first();
        try {
            unlink(public_path() . '\photos\\' . $category->photo);
        } catch (Exception $e) {
        }
        Category::where('id', '=', $id)->delete();

        return view('account.admin.categories', [
            'new' => 0,
            'id' => null,
            'subcategories'=>Subcategory::get(),
            'new_sub'=>0,
            'id_sub'=>null
        ]);
    }
    //NEW SUBCATEGORIES
    public function subcategories_new()
    {
        return view('account.admin.categories', [
            'new' => 0,
            'id' => null,
            'subcategories'=>Subcategory::get(),
            'new_sub'=>1,
            'id_sub'=>null
        ]);
    }
    //NEW FORM SUBCATEGORIES
    public function subcategories_new_form(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'plural' => 'required|max:255',
            'url' => ['required','max:255', Rule::unique('subcategories'),Rule::unique('categories')],
            'category_id'=>['required', Rule::notIn(['Wybierz'])],
        ]);


        $subcategory = new Subcategory();
        $subcategory->name = $request->name;
        $subcategory->plural = $request->plural;
        $subcategory->url = $request->url;
        $subcategory->photo = '';
        $subcategory->category_id = $request->category_id;

        $subcategory->save();

        return view('account.admin.categories', [
            'new' => 0,
            'id' => null,
            'subcategories'=>Subcategory::get(),
            'new_sub'=>0,
            'id_sub'=>null

        ]);
    }
    //EDIT SUBCATEGORIES
    public function subcategories_edit($id)
    {
        return view('account.admin.categories', [
            'new' => 0,
            'id' => null,
            'subcategories'=>Subcategory::get(),
            'new_sub'=>0,
            'id_sub'=>$id

        ]);
    }
    //EDIT FORM SUBCATEGORIES
    public function subcategories_edit_form(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'plural' => 'required|max:255',
            'url' =>  ['required','max:255', Rule::unique('subcategories')->ignore($id),Rule::unique('categories')],
            'category_id'=>'nullable',
        ]);
        Subcategory::where('id', '=', $id)->update([
            'name' => $request->name,
            'plural' => $request->plural,
            'url' => $request->url,
        ]);
        if ($request->category_id != "Wybierz"){
            Subcategory::where('id', '=', $id)->update([
                'category_id'=>$request->category_id
            ]);
        }
        return view('account.admin.categories', [
            'new' => 0,
            'id' => null,
            'subcategories'=>Subcategory::get(),
            'new_sub'=>0,
            'id_sub'=>null

        ]);
    }
    //DELETE SUBCATEGORIES
    public function subcategories_delete($id)
    {
        Subcategory::where('id', '=', $id)->delete();

        return view('account.admin.categories', [
            'new' => 0,
            'id' => null,
            'subcategories'=>Subcategory::get(),
            'new_sub'=>0,
            'id_sub'=>null
        ]);
    }
}
