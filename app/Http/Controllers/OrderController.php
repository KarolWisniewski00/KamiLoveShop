<?php

namespace App\Http\Controllers;

use App\Models\Busket;
use App\Models\Extra;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    //INDEX ORDER
    public function order()
    {
        $buskets = Busket::where('user_id', '=', Session::get('login_id'))->get();
        $products = Product::get();
        $sum = $this->prepare_sum($buskets, $products);

        return view('account.order', [
            'buskets' => $buskets,
            'products' => $products,
            'sum' => $sum,
            'user' => User::where('id', '=', Session::get('login_id'))->get()->first()
        ]);
    }
    //INDEX HISTORY
    public function history()
    {
        return view('account.history', [
            'orders' => Order::where('user_id', '=', Session::get('login_id'))->get()
        ]);
    }
    public function order_id($id)
    {
        $order = Order::where('id', '=', $id)->get()->first();
        return view('account.resume', [
            'order' => $order,
            'products' => Product::get(),
            'extras' => Extra::where('order_id', '=', $id)->get()
        ]);
    }
    public function status($id, $status)
    {
        switch ($status) {
            case 0:
                Order::where('id', '=', $id)->update(['status' => 'Oczekujące na płatność']);
                break;
            case 1:
                Order::where('id', '=', $id)->update(['status' => 'W trakcie realizacji']);
                break;
            case 2:
                Order::where('id', '=', $id)->update(['status' => 'Zrealizowane']);
                break;
            case 3:
                Order::where('id', '=', $id)->update(['status' => 'Anulowano']);
                break;
            case 5:
                Order::where('id', '=', $id)->update(['status' => 'Opłacone']);
                break;
        }
        return back()->with('success', 'Zmieniono status');
    }
    public function order_new_form(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|max:255',
            'post' => 'required|max:255|regex:/^[0-9]{2}\-[0-9]{3}$/',
            'street' => 'required|max:255',
            'street_extra' => 'nullable|max:255',
            'city' => 'required|max:255',
            'phone' => 'required|max:255|regex:/^[0-9]{9}$/',
            'extra' => 'nullable|max:255',
        ]);

        $buskets = Busket::where('user_id', '=', Session::get('login_id'))->get();
        $products = Product::get();
        $products_id = [];
        foreach ($buskets as $busket) {
            foreach ($products as $product) {
                if ($product->id == $busket->product_id) {
                    array_push($products_id, $product->id);
                }
            }
        }

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
        $order->save();

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
        Busket::where('user_id', '=', Session::get('login_id'))->delete();

        return view('account.resume', [
            'order' => $order,
            'products' => Product::get(),
            'extras' => Extra::where('order_id', '=', $order->id)->get()
        ]);
    }
}
