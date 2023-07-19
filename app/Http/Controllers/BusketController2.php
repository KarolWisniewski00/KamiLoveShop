<?php

namespace App\Http\Controllers;

use App\Models\Busket;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BusketController2 extends Controller
{
    //INDEX BUSKET
    public function index()
    {
        $buskets = Busket::where('user_id', '=', Session::get('login_id'))->get();
        $products = Product::get();
        $sum = $this->prepare_sum($buskets, $products);
        return view('client.saco.account.busket.index', [
            'buskets' => $buskets,
            'sum' => $sum
        ]);
    }
}
