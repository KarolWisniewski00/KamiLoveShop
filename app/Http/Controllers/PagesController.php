<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Exception;

class PagesController extends Controller
{
    //INDEX PAGES
    public function pages(Request $request,$url)
    {
        $max = 0;
        $category = Category::where('url', '=', $url)->get();

        try {
            $products = Product::where('category_id', '=', $category[0]->id)->get();
        } catch (Exception $e) {
            return redirect('/')->with('fail','Nie ma takiej strony!');
            exit;
        }

        $categories = Category::get();
        foreach ($categories as $cat) {
            $prod = Product::where('category_id', '=', $cat->id)->get();
            $cat->count = count($prod);
        }
        foreach ($products as $product) {
            if ($product->sale_price != 0) {
                if ($max < $product->sale_price) {
                    $max = $product->sale_price;
                }
            } else {
                if ($max < $product->normal_price) {
                    $max = $product->normal_price;
                }
            }
        }

        return view('dynamic.pages', [
            'url' => $url,
            'products' => $products,
            'categories_count' => $categories,
            'max' => $max
        ]);
    }
}
