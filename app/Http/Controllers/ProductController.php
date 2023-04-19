<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use App\Models\Broker;

class ProductController extends Controller
{
    //INDEX PRODUCT
    public function product($id)
    {
        $product = Product::where('id', '=', $id)->get()->first();
        $views = $product->views;
        Product::where('id', '=', $id)->update([
            'views'=> $views+1
        ]);
        $products = Product::inRandomOrder()->where('category_id', '=', $product->category_id)->whereNotIn('id', [$id])->take(4)->get();

        $brokers = Broker::get();
        $brokers_good = [];
        foreach ($brokers as $broker) {
            $size = Size::where('id', '=', $broker->size_id)->get()->first();
            if (!in_array($size->value, $brokers_good)) {
                array_push($brokers_good, $size->value);
            }
        }

        $sizes = Broker::get();
        $sizes_id = [];
        foreach ($sizes as $size) {
            if (!in_array($size->product_id, $sizes_id)) {
                array_push($sizes_id, $size->product_id);
            }
        }
        
        return view('dynamic.product', [
            'category_id' => $product->category_id,
            'product' => $product,
            'products' => $products,
            'brokers' => $brokers_good,
            'brokers_all' => $brokers,
            'sizes_id' => $sizes_id,
            'sizes'=>Size::get()
        ]);
    }
}
