<?php

namespace App\Http\Controllers;

use App\Models\Broker;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController2 extends Controller
{
    //INDEX PRODUCT
    public function show($id)
    {
        $product = Product::where('id', '=', $id)->get()->first();
        $views = $product->views;
        Product::where('id', '=', $id)->update([
            'views' => $views + 1
        ]);
        $products = Product::inRandomOrder()->where('category_id', '=', $product->category_id)->whereNotIn('id', [$id])->take(4)->get();

        $brokers = Broker::get();
        $brokers_good = $this->prepare_brokers($brokers);
        $sizes_id = $this->prepare_sizes_id($brokers);

        return view('client.saco.product.show', [
            'category_id' => $product->category_id,
            'prod' => $product,
            'products' => $products,
            'brokers' => $brokers_good,
            'brokers_all' => $brokers,
            'sizes_id' => $sizes_id,
            'sizes' => Size::get()
        ]);
    }
}
