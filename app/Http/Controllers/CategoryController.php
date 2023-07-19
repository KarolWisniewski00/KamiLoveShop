<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Broker;
use App\Models\Size;
use Exception;
use Livewire\WithPagination;

class CategoryController extends Controller
{
    private function filter_query($sizes)
    {
        $uniqueSizes = [];
        $uniqueSizeIds = [];

        foreach ($sizes as $size) {
            $sizeId = $size['size_id'];

            if (!in_array($sizeId, $uniqueSizeIds)) {
                $uniqueSizeIds[] = $sizeId;
                $uniqueSizes[] = $size;
            }
        }
        return $uniqueSizes;
    }

    private function get_sizes_to_show($cat)
    {
        $sizes = Broker::whereHas('product', function ($query) use ($cat) {
            $query->where('category_id', $cat->id);
        })->get();
        return $this->filter_query($sizes);
    }
    private function filter_by_price($query, $request)
    {
        if ($request->has('price_min') || $request->has('price_max')) {
            $query->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('sale_price', '=', 0)
                        ->where('normal_price', '>=', $request->price_min)
                        ->where('normal_price', '<=', $request->price_max);
                })->orWhere(function ($query) use ($request) {
                    $query->where('sale_price', '!=', 0)
                        ->where('sale_price', '>=', $request->price_min)
                        ->where('sale_price', '<=', $request->price_max);
                });
            });
        }
        return $query;
    }
    private function get_sizes_to_broker($request)
    {
        $request_size = $request->input('sizes', []);
        $request_size = array_map(function ($value) {
            return intval($value);
        }, $request_size);
        return $request_size;
    }
    private function get_products_ids($size)
    {
        $products_ids = [];
        foreach ($size as $s) {
            array_push($products_ids, intval($s->product_id));
        }
        return $products_ids;
    }
    private function get_sizes_from_broker($cat, $request_size)
    {
        return Broker::whereHas('product', function ($query) use ($cat) {
            $query->where('category_id', $cat->id);
        })->whereHas('size', function ($query) use ($request_size) {
            $query->whereIn('id', $request_size);
        })->get();
    }
    private function filter_by_size($query, $cat, $request)
    {
        $request_size = $this->get_sizes_to_broker($request);//convert inputs to int array
        $size = $this->get_sizes_from_broker($cat, $request_size);//get brokers where category and size
        $products_ids = $this->get_products_ids($size);
        if($products_ids){
            return $query->whereIn('id', $products_ids);
        }else{
            return $query;
        }
    }
    public function show(Request $request, $slug)
    {
        $cat = Category::where('url', $slug)->first();

        //SAFETY ROUTE
        //Default 
        if ($slug == 'default') {
            $prod = Product::orderBy('order');
            $max = $prod->max('normal_price');
            $prod = $this->filter_by_price($prod, $request);
            $prod = $prod->paginate(15);
            return view('client.saco.category.show', [
                'slug' => $slug,
                'prod' => $prod,
                'request' => $request,
                'max' => $max,
                'sizes' => null
            ]);
        }
        //No exist
        if (!$cat) {
            return redirect()->route('index')->with('fail', 'Strona nie istnieje.');
        }

        $sizes = $this->get_sizes_to_show($cat);

        $query = Product::where('category_id', $cat->id);
        $max = $query->max('normal_price');
        $query = $this->filter_by_price($query, $request);
        $query = $this->filter_by_size($query, $cat, $request);
        $prod = $query->orderBy('order')->paginate(15);

        return view('client.saco.category.show', [
            'slug' => $slug,
            'prod' => $prod,
            'request' => $request,
            'max' => $max,
            'sizes' => $sizes
        ]);
    }
}
