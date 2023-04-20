<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Broker;
use App\Models\Size;
use Exception;

class PagesController extends Controller
{
    //INDEX PAGES
    public function pages(Request $request, $url)
    {
        $max = 0;
        $last_min = null;
        $last_max = null;
        $category_string = 'category_id';
        $category = Category::where('url', '=', $url)->get();
        $size_show = false;

        try {
            $check = $category[0]->id;
        } catch (Exception $e) {
            $category = Subcategory::where('url', '=', $url)->get();
            $category_string = 'subcategory_id';
        }

        try {
            if ($request->has('price_min') || $request->has('price_max')) {
                $products = Product::where(function ($query) use ($request, $category, $category_string) {
                    $query->where($category_string, '=', $category[0]->id)
                        ->where('sale_price', '=', 0)
                        ->where('normal_price', '>=', $request->price_min)
                        ->where('normal_price', '<=', $request->price_max);
                })->orWhere(function ($query) use ($request, $category, $category_string) {
                    $query->where($category_string, '=', $category[0]->id)
                        ->where('sale_price', '!=', 0)
                        ->where('sale_price', '>=', $request->price_min)
                        ->where('sale_price', '<=', $request->price_max);
                });
                $last_min = $request->price_min;
                $last_max = $request->price_max;
            } else {
                $products = Product::where($category_string, '=', $category[0]->id);
            }
            $products = $products->get();
        } catch (Exception $e) {
            return redirect('/')->with('fail', 'Nie ma takiej strony!');
            exit;
        }

        $categories = Category::get();
        foreach ($categories as $cat) {
            $prod = Product::where('category_id', '=', $cat->id)->get();
            $cat->count = count($prod);
        }

        $subcategories = Subcategory::get();
        foreach ($subcategories as $cat) {
            $prod = Product::where('subcategory_id', '=', $cat->id)->get();
            $cat->count = count($prod);
        }
        $brokers = Broker::get();
        $products_all = Product::where($category_string, '=', $category[0]->id)->get();
        foreach ($products_all as $product) {
            if ($product->sale_price != 0) {
                if ($max < $product->sale_price) {
                    $max = $product->sale_price;
                }
            } else {
                if ($max < $product->normal_price) {
                    $max = $product->normal_price;
                }
            }
            foreach ($brokers as $broker) {
                if ($broker->product_id == $product->id) {
                    $size_show = true;
                }
            }
        }

        $brokers_good = $this->prepare_brokers($brokers);
        $sizes_id = $this->prepare_sizes_id($brokers);

        $count = intval(count($request->all()));
        $sizes_filter = [];
        $sizes_filter_id = [];
        $products_id = [];
        $sizes = Size::get();

        for ($x = 0; $x <= $count; $x++) {
            $bufor = 'broker_' . $x;
            if (($request->$bufor != null) && (!in_array($request->$bufor, $sizes_filter))) {
                array_push($sizes_filter, $request->$bufor);
            }
        }
        foreach ($sizes as $size) {
            foreach ($sizes_filter as $size_filter) {
                if ($size->value == $size_filter) {
                    array_push($sizes_filter_id, $size->id);
                }
            }
        }
        foreach ($brokers as $broker) {
            foreach ($sizes_filter_id as $size_filter_id) {
                if ($broker->size_id == $size_filter_id) {
                    array_push($products_id, $broker->product_id);
                }
            }
        }
        $products_good = [];
        foreach ($products as $prod) {
            if (in_array($prod->id, $products_id)) {
                array_push($products_good, $prod);
            }
        }
        if (count($request->all()) > 2) {
            $products = $products_good;
        }
        return view('dynamic.pages', [
            'url' => $url,
            'products' => $products,
            'categories_count' => $categories,
            'subcategories_count' => $subcategories,
            'max' => $max,
            'last_min' => $last_min,
            'last_max' => $last_max,
            'plural' => $category[0]->plural,
            'brokers' => $brokers_good,
            'brokers_all' => $brokers,
            'sizes_id' => $sizes_id,
            'sizes' => $sizes,
            'sizes_filter' => $sizes_filter,
            'size_show' => $size_show
        ]);
    }
}
