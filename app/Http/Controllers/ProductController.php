<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
        return view('dynamic.product', [
            'category_id' => $product->category_id,
            'product' => $product,
            'products' => $products
        ]);
    }
}
