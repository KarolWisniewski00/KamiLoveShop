<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Size;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function prepare_brokers($brokers)
    {
        $brokers_good = [];
        foreach ($brokers as $broker) {
            $size = Size::where('id', '=', $broker->size_id)->get()->first();
            if (!in_array($size->value, $brokers_good)) {
                array_push($brokers_good, $size->value);
            }
        }
        return $brokers_good;
    }
    public function prepare_sizes_id($sizes)
    {
        $sizes_id = [];
        foreach ($sizes as $size) {
            if (!in_array($size->product_id, $sizes_id)) {
                array_push($sizes_id, $size->product_id);
            }
        }
        return $sizes_id;
    }
    public function prepare_sum($buskets, $products)
    {
        $sum = 0;
        foreach ($buskets as $busket) {
            foreach ($products as $product) {
                if ($product->id == $busket->product_id) {
                    if ($product->sale_price != 0) {
                        $sum += $product->sale_price * $busket->quantity;
                    } else {
                        $sum += $product->normal_price * $busket->quantity;
                    }
                }
            }
        }
        return $sum;
    }
}
