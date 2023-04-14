<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Hero;
use Illuminate\Validation\Rule;
use Exception;

class AdminController extends Controller
{
    //INDEX ADMIN
    public function admin()
    {
        return view('account.admin', [
            'panel' => 0,
            'new' => 0,
            'id' => null,
            'heros' => null,
            'subcategories'=>null,
            'new_sub'=>0,
            'id_sub'=>null
        ]);
    }
    //INDEX CATEGORIES
    public function categories()
    {
        return view('account.admin', [
            'panel' => 1,
            'new' => 0,
            'id' => null,
            'heros' => null,
            'subcategories'=>Subcategory::get(),
            'new_sub'=>0,
            'id_sub'=>null
        ]);
    }
    //NEW CATEGORIES
    public function categories_new()
    {
        return view('account.admin', [
            'panel' => 1,
            'new' => 1,
            'id' => null,
            'heros' => null,
            'subcategories'=>Subcategory::get(),
            'new_sub'=>0,
            'id_sub'=>null

        ]);
    }
    //NEW FORM CATEGORIES
    public function categories_new_form(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'plural' => 'required',
            'url' => ['required', Rule::unique('subcategories'),Rule::unique('categories')],
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
            'new' => 0,
            'id' => null,
            'heros' => null,
            'subcategories'=>Subcategory::get(),
            'new_sub'=>0,
            'id_sub'=>null

        ]);
    }
    //EDIT CATEGORIES
    public function categories_edit($id)
    {
        return view('account.admin', [
            'panel' => 1,
            'new' => 0,
            'id' => $id,
            'heros' => null,
            'subcategories'=>Subcategory::get(),
            'new_sub'=>0,
            'id_sub'=>null

        ]);
    }
    //EDIT FORM CATEGORIES
    public function categories_edit_form(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'plural' => 'required',
            'url' =>  ['required', Rule::unique('categories')->ignore($id),Rule::unique('subcategories')],
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
            'new' => 0,
            'id' => null,
            'heros' => null,
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

        return view('account.admin', [
            'panel' => 1,
            'new' => 0,
            'id' => null,
            'heros' => null,
            'subcategories'=>Subcategory::get(),
            'new_sub'=>0,
            'id_sub'=>null

        ]);
    }
    //NEW CATEGORIES
    public function subcategories_new()
    {
        return view('account.admin', [
            'panel' => 1,
            'new' => 0,
            'id' => null,
            'heros' => null,
            'subcategories'=>Subcategory::get(),
            'new_sub'=>1,
            'id_sub'=>null

        ]);
    }
    //NEW FORM CATEGORIES
    public function subcategories_new_form(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'plural' => 'required',
            'url' => ['required', Rule::unique('subcategories'),Rule::unique('categories')],
            'category_id'=>['required', Rule::notIn(['Wybierz'])],
        ]);


        $subcategory = new Subcategory();
        $subcategory->name = $request->name;
        $subcategory->plural = $request->plural;
        $subcategory->url = $request->url;
        $subcategory->photo = '';
        $subcategory->category_id = $request->category_id;

        $subcategory->save();

        return view('account.admin', [
            'panel' => 1,
            'new' => 0,
            'id' => null,
            'heros' => null,
            'subcategories'=>Subcategory::get(),
            'new_sub'=>0,
            'id_sub'=>null

        ]);
    }
    //EDIT CATEGORIES
    public function subcategories_edit($id)
    {
        return view('account.admin', [
            'panel' => 1,
            'new' => 0,
            'id' => null,
            'heros' => null,
            'subcategories'=>Subcategory::get(),
            'new_sub'=>0,
            'id_sub'=>$id

        ]);
    }
    //EDIT FORM CATEGORIES
    public function subcategories_edit_form(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'plural' => 'required',
            'url' =>  ['required', Rule::unique('subcategories')->ignore($id),Rule::unique('categories')],
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
        return view('account.admin', [
            'panel' => 1,
            'new' => 0,
            'id' => null,
            'heros' => null,
            'subcategories'=>Subcategory::get(),
            'new_sub'=>0,
            'id_sub'=>null

        ]);
    }
    //DELETE CATEGORIES
    public function subcategories_delete($id)
    {
        Subcategory::where('id', '=', $id)->delete();

        return view('account.admin', [
            'panel' => 1,
            'new' => 0,
            'id' => null,
            'heros' => null,
            'subcategories'=>Subcategory::get(),
            'new_sub'=>0,
            'id_sub'=>null

        ]);
    }
    //INDEX PRODUCTS
    public function products()
    {
        return view('account.admin', [
            'panel' => 2,
            'new' => 0,
            'id' => null,
            'heros' => null,
            'subcategories'=>null,
            'new_sub'=>0,
            'id_sub'=>null

        ]);
    }
    //INDEX HERO
    public function hero()
    {
        return view('account.admin', [
            'panel' => 3,
            'new' => 0,
            'id' => null,
            'heros' => Hero::get(),
            'subcategories'=>null,
            'new_sub'=>0,
            'id_sub'=>null

        ]);
    }
    //NEW HERO
    public function hero_new()
    {
        return view('account.admin', [
            'panel' => 3,
            'new' => 1,
            'id' => null,
            'heros' => Hero::get(),
            'subcategories'=>null,
            'new_sub'=>0,
            'id_sub'=>null

        ]);
    }
    //NEW FORM HERO
    public function hero_new_form(Request $request)
    {
        $request->validate([
            'h1' => 'required',
            'p' => 'required',
            'button' => 'required',
            'href' => ['required', Rule::notIn(['Wybierz'])],
            'photo' => 'required|image|mimes:jpg,png,jpeg|max:12288',
        ]);

        $photo = request()->file('photo');
        $photo_name = $photo->getClientOriginalName();
        $photo->move(public_path('/photos'), $photo_name);

        $hero = new Hero();
        $hero->h1 = $request->h1;
        $hero->p = $request->p;
        $hero->button = $request->button;
        $hero->href = $request->href;
        $hero->photo = $photo_name;

        $hero->save();

        return view('account.admin', [
            'panel' => 3,
            'new' => 0,
            'id' => null,
            'heros' => Hero::get(),
            'subcategories'=>null,
            'new_sub'=>0,
            'id_sub'=>null

        ]);
    }
    //EDIT HERO
    public function hero_edit($id)
    {
        return view('account.admin', [
            'panel' => 3,
            'new' => 0,
            'id' => $id,
            'heros' => Hero::get(),
            'subcategories'=>null,
            'new_sub'=>0,
            'id_sub'=>null

        ]);
    }
    //EDIT FORM HERO
    public function hero_edit_form(Request $request, $id)
    {
        $request->validate([
            'h1' => 'required',
            'p' => 'required',
            'button' => 'required',
            'href' => ['required', Rule::notIn(['Wybierz'])],
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:12288',
        ]);

        $photo = request()->file('photo');

        if ($photo != null) {
            $hero = Hero::where('id', '=', $id)->first();
            unlink(public_path() . '\photos\\' . $hero->photo);
            $photo_name = $photo->getClientOriginalName();
            $photo->move(public_path('/photos'), $photo_name);
            Hero::where('id', '=', $id)->update([
                'photo' => $photo_name,
            ]);
        }

        Hero::where('id', '=', $id)->update([
            'h1' => $request->h1,
            'p' => $request->p,
            'button' => $request->button,
            'href' => $request->href,
        ]);

        return view('account.admin', [
            'panel' => 3,
            'new' => 0,
            'id' => null,
            'heros' => Hero::get(),
            'subcategories'=>null,
            'new_sub'=>0,
            'id_sub'=>null

        ]);
    }
    //DELETE HERO
    public function hero_delete($id)
    {
        $hero = Hero::where('id', '=', $id)->first();

        try {
            unlink(public_path() . '\photos\\' . $hero->photo);
        } catch (Exception $e) {
        }

        Hero::where('id', '=', $id)->delete();

        return view('account.admin', [
            'panel' => 3,
            'new' => 0,
            'id' => null,
            'heros' => Hero::get(),
            'subcategories'=>null,
            'new_sub'=>0,
            'id_sub'=>null

        ]);
    }
}
