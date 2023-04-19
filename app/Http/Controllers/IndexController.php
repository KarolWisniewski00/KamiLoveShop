<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Hero;
use App\Models\Category;
use App\Models\Size;
use App\Models\Broker;
class IndexController extends Controller
{
    //INDEX INDEX
    public function index(){
        $products = Product::inRandomOrder()->take(8)->where('new', '=', 1)->get();
        $categories = Category::get();

        $products_in_categories = [];

        foreach ($categories as $category){
            $products_in = Product::inRandomOrder()->take(2)->where('category_id', '=', $category->id)->get();
            array_push($products_in_categories, ['id' => $category->id, 'products'=>$products_in]);
        }

        $heros = Hero::get();

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

        return view('index',[
            'products'=>$products,
            'products_in_categories'=>$products_in_categories,
            'heros'=>$heros,
            'brokers' => $brokers_good,
            'brokers_all' => $brokers,
            'sizes_id' => $sizes_id,
            'sizes'=>Size::get()
        ]);
    }
}
