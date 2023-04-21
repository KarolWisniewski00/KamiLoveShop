<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Hero;
use App\Models\Category;
use App\Models\Size;
use App\Models\Broker;

class IndexController extends Controller
{
    //INDEX INDEX
    public function index()
    {
        $products = Product::inRandomOrder()->take(8)->where('new', '=', 1)->get();
        $categories = Category::get();

        $products_in_categories = [];

        foreach ($categories as $category) {
            $products_in = Product::inRandomOrder()->take(2)->where('category_id', '=', $category->id)->get();
            array_push($products_in_categories, ['id' => $category->id, 'products' => $products_in]);
        }

        $heros = Hero::get();

        $brokers = Broker::get();
        $brokers_good = $this->prepare_brokers($brokers);
        $sizes_id = $this->prepare_sizes_id($brokers);

        return view('index', [
            'products' => $products,
            'products_in_categories' => $products_in_categories,
            'heros' => $heros,
            'brokers' => $brokers_good,
            'brokers_all' => $brokers,
            'sizes_id' => $sizes_id,
            'sizes' => Size::get()
        ]);
    }
}
