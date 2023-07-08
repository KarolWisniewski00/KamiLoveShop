<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryAdminController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [
            'subcat' => Subcategory::orderBy('order')->get(),
            'cat' => Category::orderBy('order')->get(),
        ]);
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->plural = $request->plural;
        $category->url = $request->url;
        $category->photo = $request->photo;
        $category->order = $request->order;

        $res = $category->save();

        if ($res) {
            return redirect()->route('admin.category')->with('success', 'Kategoria została pomyślnie zapisana.');
        } else {
            return redirect()->route('admin.category')->with('fail', 'Kategoria nie została zapisana.');
        }
    }
    public function edit($id)
    {
        return view('admin.category.edit', [
            'cat' => Category::where('id', $id)->first(),
        ]);
    }
    public function update(CategoryRequest $request, $id)
    {
        $res = Category::where('id', '=', $id)->update([
            'name' => $request->name,
            'plural' => $request->plural,
            'url' => $request->url,
            'order' => $request->order,
            'photo' => $request->photo,
        ]);

        if ($res) {
            return redirect()->route('admin.category')->with('success', 'Kategoria została pomyślnie zaktualizowana.');
        } else {
            return redirect()->route('admin.category')->with('fail', 'Kategoria nie została zaktualizowana.');
        }
    }
    public function delete($id){
        $res = Category::where('id', '=', $id)->delete();
        if ($res) {
            return redirect()->route('admin.category')->with('success', 'Kategoria została pomyślnie usunięta.');
        } else {
            return redirect()->route('admin.category')->with('fail', 'Kategoria nie została usunięta.');
        }
    }
}
