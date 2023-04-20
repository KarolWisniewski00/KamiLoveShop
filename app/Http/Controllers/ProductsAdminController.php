<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Broker;
use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Exception;

class ProductsAdminController extends Controller
{
    //PREPARE VARIABLES TO SAVE
    public function validate_to_database($what, $from, $to)
    {
        if ($what != $from) {
            $value = $what;
        } else {
            $value = $to;
        }
        return $value;
    }
    //INDEX PRODUCTS
    public function products()
    {
        return view('account.admin.products', [
            'products' => Product::get(),
            'subcategories' => Subcategory::get(),
            'sizes' => Size::get(),
        ]);
    }
    //NEW PRODUCTS
    public function products_new()
    {
        return view('account.admin.new', [
            'edit' => 0,
            'product' => null,
            'subcategories' => Subcategory::get(),
            'sizes' => Size::get(),
            'brokers'=>null
        ]);
    }
    //NEW FORM PRODUCTS
    public function products_new_form(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'short_description' => 'nullable|max:255',
            'long_description' => 'nullable',
            'normal_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'new' => 'nullable',
            'SKU' => ['required', Rule::unique('products')],
            'category_id' => 'nullable',
            'subcategory_id' => 'nullable',
            'photo' => 'required|image|mimes:jpg,png,jpeg|max:12288',
            'order' => 'nullable|integer',
            'count' => 'nullable|integer'
        ]);

        $photo = request()->file('photo');
        $photo_name = $photo->getClientOriginalName();
        $photo->move(public_path('/photos'), $photo_name);

        $category_id = $this->validate_to_database($request->category_id, 'Wybierz', null);
        $subcategory_id = $this->validate_to_database($request->subcategory_id, 'Wybierz', null);
        $sale = $this->validate_to_database($request->sale_price, null, 0);

        $product = new Product();
        $product->name = $request->name;

        $product->sale_price = $sale;
        $product->new = $request->new;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->category_id = $category_id;
        $product->subcategory_id = $subcategory_id;
        $product->normal_price = $request->normal_price;
        $product->SKU = $request->SKU;
        $product->photos = '';
        $product->views = 0;
        $product->sells = 0;
        $product->order = $request->order;
        $product->photo = $photo_name;

        $product->save();

        $count = intval($request->count);
        $array_added = [];
        for ($x = 1; $x <= $count; $x++) {
            $bufor = 'size_' . $x;
            if (($request->$bufor != 'Wybierz') && (!in_array($request->$bufor, $array_added))) {
                $size = Size::where('value', '=', $request->$bufor)->get()->first();
                $broke = new Broker();
                $broke->product_id = intval($product->id);
                $broke->size_id = intval($size->id);
                $broke->save();
                array_push($array_added, $request->$bufor);
            }
        }

        return view('account.admin.products', [
            'products' => Product::get(),
            'subcategories' => Subcategory::get(),
            'sizes' => Size::get()
        ]);
    }
    //EDIT PRODUCTS
    public function products_edit($id)
    {
        return view('account.admin.new', [
            'edit' => 1,
            'product' => Product::where('id', '=', $id)->get()->first(),
            'subcategories' => Subcategory::get(),
            'sizes' => Size::get(),
            'brokers'=>Broker::where('product_id','=',$id)->get()
        ]);
    }
    //EDIT FORM PRODUCTS
    public function products_edit_form(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'short_description' => 'nullable|max:255',
            'long_description' => 'nullable',
            'normal_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'new' => 'nullable',
            'SKU' => ['required', Rule::unique('products')->ignore($id)],
            'category_id' => 'nullable',
            'subcategory_id' => 'nullable',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:12288',
            'order' => 'nullable|integer',
            'count' => 'nullable|integer'
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

        $category_id = $this->validate_to_database($request->category_id, 'Wybierz', null);
        $subcategory_id = $this->validate_to_database($request->subcategory_id, 'Wybierz', null);
        $sale = $this->validate_to_database($request->sale_price, null, 0);

        Product::where('id', '=', $id)->update([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'normal_price' => $request->normal_price,
            'sale_price' => $sale,
            'new' => $request->new,
            'SKU' => $request->SKU,
            'category_id' => $category_id,
            'subcategory_id' => $subcategory_id,
            'order' => $request->order,
        ]);

        Broker::where('product_id','=',$id)->delete();

        $count = intval($request->count);
        $array_added = [];
        for ($x = 1; $x <= $count; $x++) {
            $bufor = 'size_' . $x;
            if (($request->$bufor != 'Wybierz') && (!in_array($request->$bufor, $array_added))) {
                $size = Size::where('value', '=', $request->$bufor)->get()->first();
                $broke = new Broker();
                $broke->product_id = intval($id);
                $broke->size_id = intval($size->id);
                $broke->save();
                array_push($array_added, $request->$bufor);
            }
        }

        return view('account.admin.products', [
            'products' => Product::get(),
            'subcategories' => Subcategory::get(),
            'sizes' => Size::get()
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
            'subcategories' => Subcategory::get(),
            'sizes' => Size::get()
        ]);
    }
}
