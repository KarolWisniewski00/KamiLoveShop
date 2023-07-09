<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubcategoryRequest;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubcategoryAdminController extends Controller
{
    public function create()
    {
        return view('admin.subcategory.create', [
            'subcat' => Subcategory::orderBy('order')->get(),
            'cat' => Category::orderBy('order')->get(),
        ]);
    }
    public function store(SubcategoryRequest $request)
    {
        $subcategory = new Subcategory();
        $subcategory->name = $request->name;
        $subcategory->plural = $request->plural;
        $subcategory->url = $request->url;
        $subcategory->category_id = $request->category_id;
        $subcategory->order = $request->order;

        $res = $subcategory->save();

        if ($res) {
            return redirect()->route('admin.category')->with('success', 'Podkategoria została pomyślnie zapisana.');
        } else {
            return redirect()->route('admin.category')->with('fail', 'Podkategoria nie została zapisana.');
        }
    }
    public function edit($id)
    {
        $subcategory = Subcategory::find($id);
        if (!$subcategory) {
            return redirect()->route('admin.subcategory')->with('fail', 'Podkategoria nie istnieje.');
        }
        return view('admin.subcategory.edit', [
            'cat' => Category::orderBy('order')->get(),
            'subcat' => Subcategory::where('id', $id)->first(),
        ]);
    }
    public function update(SubcategoryRequest $request, $id)
    {
        $subcategory = Subcategory::find($id);
        if (!$subcategory) {
            return redirect()->route('admin.subcategory')->with('fail', 'Podkategoria nie istnieje.');
        }
        $res = Subcategory::where('id', '=', $id)->update([
            'name' => $request->name,
            'plural' => $request->plural,
            'url' => $request->url,
            'order' => $request->order,
            'category_id' => $request->category_id
        ]);
        if ($res) {
            return redirect()->route('admin.category')->with('success', 'Podkategoria została pomyślnie zaktualizowana.');
        } else {
            return redirect()->route('admin.category')->with('fail', 'Podkategoria nie została zaktualizowana.');
        }
    }
    public function delete($id)
    {
        $subcategory = Subcategory::find($id);
        if (!$subcategory) {
            return redirect()->route('admin.subcategory')->with('fail', 'Podkategoria nie istnieje.');
        }
        $res = Subcategory::where('id', '=', $id)->delete();
        if ($res) {
            return redirect()->route('admin.category')->with('success', 'Kategoria została pomyślnie usunięta.');
        } else {
            return redirect()->route('admin.category')->with('fail', 'Kategoria nie została usunięta.');
        }
    }
}
