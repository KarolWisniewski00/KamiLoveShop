<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Broker;
use App\Models\Size;
use Exception;

class CategoryController extends Controller
{
    public function show(Request $request, $slug)
    {
        $cat = Category::where('url', $slug)->first();
        if ($slug == 'default') {
            $prod = Product::get();
            return view('client.saco.category.show', [
                'slug' => $slug,
                'prod' => $prod,
            ]);
        }
        if (!$cat) {
            return redirect()->route('index')->with('fail', 'Strona nie istnieje.');
        }
        $prod = Product::get();

        $prod = Product::where('category_id', $cat->id)->orderBy('order')->get();

        return view('client.saco.category.show', [
            'slug' => $slug,
            'prod' => $prod,
        ]);
    }
}
