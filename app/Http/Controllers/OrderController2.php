<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController2 extends Controller
{
    public function index()
    {
        return view('client.saco.user.order.index', [
            'orders' => Order::where('user_id', '=', Session::get('login_id'))->get()
        ]);
    }
}
