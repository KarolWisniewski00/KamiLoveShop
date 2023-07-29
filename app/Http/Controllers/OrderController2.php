<?php

namespace App\Http\Controllers;

use App\Models\Busket;
use App\Models\Extra;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class OrderController2 extends Controller
{
    private function products_serialize($buskets, $products)
    {
        $products_id = [];
        foreach ($buskets as $busket) {
            foreach ($products as $product) {
                if ($product->id == $busket->product_id) {
                    array_push($products_id, $product->id);
                }
            }
        }
        return $products_id;
    }
    private function save_extra_data($buskets,$products,$order)
    {
        foreach ($buskets as $busket) {
            foreach ($products as $product) {
                if ($product->id == $busket->product_id) {
                    $extra = new Extra();
                    $extra->product_id = $product->id;
                    $extra->name = $product->name;
                    $extra->SKU = $product->SKU;
                    $extra->quantity = $busket->quantity;
                    if ($product->sale_price != 0) {
                        $extra->total_price = $product->sale_price * $busket->quantity;
                    } else {
                        $extra->total_price = $product->normal_price * $busket->quantity;
                    }
                    $extra->size_value = $busket->size_value;
                    $extra->normal_price = $product->normal_price;
                    $extra->sale_price = $product->sale_price;
                    $extra->order_id = $order->id;
                    $extra->save();
                    Product::where('id', '=', $product->id)->update([
                        'sells' => $product->sells + 1
                    ]);
                }
            }
        }
    }
    public function index()
    {
        return view('client.saco.account.order.index', [
            'orders' => Order::where('user_id', '=', Session::get('login_id'))->orderBy('created_at', 'desc')->get(),
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
    public function create()
    {
        $buskets = Busket::where('user_id', '=', Session::get('login_id'))->get();
        $products = Product::get();
        $sum = $this->prepare_sum($buskets, $products);

        return view('client.saco.account.order.create', [
            'buskets' => $buskets,
            'products' => $products,
            'sum' => $sum,
            'user' => User::where('id', '=', Session::get('login_id'))->get()->first()
        ]);
    }
    public function store(Request $request)
    {

        $buskets = Busket::where('user_id', '=', Session::get('login_id'))->get();
        $products = Product::get();
        $products_id = $this->products_serialize($buskets, $products);

        $order = new Order();
        $order->number = 'ORDER-' . Str::random(6);
        $order->name = $request->name;
        $order->surname = $request->surname;
        $order->email = $request->email;
        $order->company = $request->company;
        $order->post = $request->post;
        $order->street = $request->street;
        $order->street_extra = $request->street_extra;
        $order->city = $request->city;
        $order->phone = $request->phone;
        $order->extra = $request->extra;
        $order->products = serialize($products_id);
        $order->value = $request->value;
        $order->type = 'Przelew bankowy';
        $order->status = 'Oczekujące na płatność';
        $order->user_id = Session::get('login_id');
        $res = $order->save();

        $this->save_extra_data($buskets,$products,$order);
        Busket::where('user_id', '=', Session::get('login_id'))->delete();

        if ($res) {
            return redirect()->route('user.order.show',$order->id)->with('success', 'Dziękujemy otrzymaliśmy twoje zamówienie.');
        } else {
            return redirect()->route('user.order.create')->with('fail', 'Niestety coś poszło nie tak.');
        }
    }
}
