<?php

namespace App\Http\Controllers;

use App\Models\Extra;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController2 extends Controller
{
    public function index()
    {
        return view('client.saco.account.order.index', [
            'orders' => Order::where('user_id', '=', Session::get('login_id'))->get()
        ]);
    }
    public function show($slug)
    {
        $order = Order::where('id', '=', $slug)->get()->first();
        return view('client.saco.account.order.show', [
            'order' => $order,
            'products' => Product::get(),
            'extras' => Extra::where('order_id', '=', $slug)->get()
        ]);
    }
}
