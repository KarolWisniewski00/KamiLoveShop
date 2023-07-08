<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Broker;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function index()
    {
        return view('admin.product.index', [
            'prod' => Product::orderBy('order')->get(),
        ]);
    }
    public function create()
    {
        return view('admin.product.create', [
            'siz' => Size::get(),
            'cat' => Category::orderBy('order')->get(),
            'subcat' => Subcategory::orderBy('order')->get(),
        ]);
    }
    public function store(ProductRequest $request)
    {
        ($request->subcategory != null) ? $subcat = intval($request->subcategory) : $subcat = $request->subcategory;
        ($request->photos != null) ? $photos = $request->photos : $photos = "";

        $product = new Product();
        $product->name = $request->name;
        $product->sale_price = $request->sale_price;
        $product->new = 1;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->category_id = intval($request->category);
        $product->subcategory_id = $subcat;
        $product->normal_price = $request->normal_price;
        $product->SKU = $request->SKU;
        $product->views = 0;
        $product->sells = 0;
        $product->order = $request->order;
        $product->photo = $request->photo;
        $product->photos = serialize(explode(",", $photos));

        $res = $product->save();

        if ($request->size != null) {
            $array = explode(",", $request->size);
            foreach ($array as $key => $value) {
                $broke = new Broker();
                $broke->product_id = intval($product->id);
                $broke->size_id = intval($value);
                $res2 = $broke->save();
                if (!$res2) {
                    return redirect()->route('admin.product')->with('fail', 'Produkt został pomyślnie zapisany. Rozmiar produktu nie został zapisany.');
                }
            }
        }

        if ($res) {
            return redirect()->route('admin.product')->with('success', 'Produkt został pomyślnie zapisany.');
        } else {
            return redirect()->route('admin.product')->with('fail', 'Produkt nie został zapisany.');
        }
    }
    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.product')->with('fail', 'Produkt nie istnieje.');
        }
        return view('admin.product.edit', [
            'prod' => $product,
            'siz' => Size::get(),
            'cat' => Category::orderBy('order')->get(),
            'subcat' => Subcategory::orderBy('order')->get(),
            'broker' => Broker::where('product_id', '=', $id)->get(),
        ]);
    }
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.product')->with('fail', 'Produkt nie istnieje.');
        }

        ($request->subcategory != null) ? $subcat = intval($request->subcategory) : $subcat = $request->subcategory;
        ($request->photos != null) ? $photos = $request->photos : $photos = "";
        $week_ago = now()->subWeek();

        $res = Product::where('id', $id)->update([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'normal_price' => $request->normal_price,
            'sale_price' => $request->sale_price,
            'new' => ($product->created_at < $week_ago) ? 0 : 1,
            'SKU' => $request->SKU,
            'category_id' => intval($request->category),
            'subcategory_id' => $subcat,
            'order' => $request->order,
            'photo' => $request->photo,
            'photos' => serialize(explode(",", $photos)),
        ]);

        $res = $product->save();

        Broker::where('product_id', '=', $id)->delete();

        if ($request->size != null) {
            $array = explode(",", $request->size);
            foreach ($array as $key => $value) {
                $broke = new Broker();
                $broke->product_id = intval($product->id);
                $broke->size_id = intval($value);
                $res2 = $broke->save();
                if (!$res2) {
                    return redirect()->route('admin.product')->with('fail', 'Produkt został pomyślnie zaktualizowany. Rozmiar produktu nie został zapisany.');
                }
            }
        }

        if ($res) {
            return redirect()->route('admin.product')->with('success', 'Produkt został pomyślnie zaktualizowany.');
        } else {
            return redirect()->route('admin.product')->with('fail', 'Produkt nie został zaktualizowany.');
        }
    }
    public function delete($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.product')->with('fail', 'Produkt nie istnieje.');
        }

        $res = $product->delete();
        Broker::where('product_id', '=', $id)->delete();

        if ($res) {
            return redirect()->route('admin.product')->with('success', 'Produkt został pomyślnie usunięty.');
        } else {
            return redirect()->route('admin.product')->with('fail', 'Produkt nie został usunięty.');
        }
    }
}
