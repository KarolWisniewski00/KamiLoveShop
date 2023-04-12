<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Hero;
use App\Models\Category;

class IndexController extends Controller
{
    public function index(){
        $products = Product::inRandomOrder()->take(8)->where('new', '=', 1)->get();
        $categories = Category::get();

        $products_in_categories = [];

        foreach ($categories as $category){
            $products_in = Product::inRandomOrder()->take(2)->where('category_id', '=', $category->id)->get();
            array_push($products_in_categories, ['id' => $category->id, 'products'=>$products_in]);
        }

        $heros = Hero::get();

        return view('index',[
            'products'=>$products,
            'products_in_categories'=>$products_in_categories,
            'heros'=>$heros
        ]);
    }
}
