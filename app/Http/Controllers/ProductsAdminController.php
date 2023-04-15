<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Exception;

class ProductsAdminController extends Controller
{
    //INDEX PRODUCTS
    public function products()
    {
        return view('account.admin.products', [
            'products' => Product::get(),
            'subcategories' => Subcategory::get()
        ]);
    }
    //NEW PRODUCTS
    public function products_new()
    {
        return view('account.admin.new', [
            'edit' => 0,
            'product' => null,
            'subcategories' => Subcategory::get()
        ]);
    }
    //NEW FORM PRODUCTS
    public function products_new_form(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'short_description' => 'nullable',
            'long_description' => 'nullable',
            'normal_price' => 'required',
            'sale_price' => 'nullable',
            'new' => 'nullable',
            'SKU' => ['required', Rule::unique('products')],
            'category_id' => 'nullable',
            'subcategory_id' => 'nullable',
            'photo' => 'required|image|mimes:jpg,png,jpeg|max:12288',
        ]);

        $photo = request()->file('photo');
        $photo_name = $photo->getClientOriginalName();
        $photo->move(public_path('/photos'), $photo_name);

        $product = new Product();
        $product->name = $request->name;
        if ($request->short_description != null) {
            $product->short_description = $request->short_description;
        } else {
            $product->short_description = '';
        }
        if ($request->long_description != null) {
            $product->long_description = $request->long_description;
        } else {
            $product->long_description = '';
        }
        $product->normal_price = $request->normal_price;
        if ($request->sale_price != null) {
            $product->sale_price = $request->sale_price;
        } else {
            $product->sale_price = 0;
        }
        $product->SKU = $request->SKU;
        if ($request->new != null) {
            $product->new = $request->new;
        } else {
            $product->new = 0;
        }
        $product->photos = '';
        if ($request->category_id != 'Wybierz') {
            $product->category_id = $request->category_id;
        } else {
            $product->category_id = null;
        }
        if ($request->subcategory_id != 'Wybierz') {
            $product->subcategory_id = $request->subcategory_id;
        } else {
            $product->subcategory_id = null;
        }
        $product->photo = $photo_name;

        $product->save();

        return view('account.admin.products',[
            'products' => Product::get(),
            'subcategories' => Subcategory::get()
        ]);
    }
    //EDIT PRODUCTS
    public function products_edit($id)
    {
        return view('account.admin.new', [
            'edit' => 1,
            'product' => Product::where('id', '=', $id)->get()->first(),
            'subcategories' => Subcategory::get()
        ]);
    }
    //EDIT FORM PRODUCTS
    public function products_edit_form(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'short_description' => 'nullable',
            'long_description' => 'nullable',
            'normal_price' => 'required',
            'sale_price' => 'nullable',
            'new' => 'nullable',
            'SKU' => ['required', Rule::unique('products')->ignore($id)],
            'category_id' => 'nullable',
            'subcategory_id' => 'nullable',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:12288',
        ]);

        $photo = request()->file('photo');

        if ($photo != null) {
            $product = Product::where('id', '=', $id)->first();
            unlink(public_path() . '\photos\\' . $product->photo);
            $photo_name = $photo->getClientOriginalName();
            $photo->move(public_path('/photos'), $photo_name);
            Product::where('id', '=', $id)->update([
                'photo' => $photo_name,
            ]);
        }

        if ($request->sale_price != null) {
            $sale_price = $request->sale_price;
        } else {
            $sale_price = 0;
        }
        if ($request->short_description != null) {
            $short_description = $request->short_description;
        } else {
            $short_description = '';
        }
        if ($request->long_description != null) {
            $long_description = $request->long_description;
        } else {
            $long_description = '';
        }
        if ($request->category_id != 'Wybierz') {
            $category_id = $request->category_id;
        } else {
            $category_id = null;
        }
        if ($request->subcategory_id != 'Wybierz') {
            $subcategory_id = $request->subcategory_id;
        } else {
            $subcategory_id = null;
        }
        if ($request->new != null) {
            $new = $request->new;
        } else {
            $new = 0;
        }

        Product::where('id', '=', $id)->update([
            'name' => $request->name,
            'short_description' => $short_description,
            'long_description' => $long_description,
            'normal_price' => $request->normal_price,
            'sale_price' => $sale_price,
            'new' => $new,
            'SKU' => $request->SKU,
            'category_id' => $category_id,
            'subcategory_id' => $subcategory_id,
        ]);

        return view('account.admin.products', [
            'products' => Product::get(),
            'subcategories' => Subcategory::get()
        ]);
    }
    //DELETE PRODUCTS
    public function products_delete($id)
    {
        $category = Product::where('id', '=', $id)->first();
        try {
            unlink(public_path() . '\photos\\' . $category->photo);
        } catch (Exception $e) {
        }
        Product::where('id', '=', $id)->delete();

        return view('account.admin.products', [
            'products' => Product::get(),
            'subcategories' => Subcategory::get()
        ]);
    }
}
