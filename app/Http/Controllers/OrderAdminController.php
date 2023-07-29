<?php

namespace App\Http\Controllers;

use App\Models\Extra;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderAdminController extends Controller
{
    public function show($slug)
    {
        $order = Order::where('id', '=', $slug)->get()->first();
        return view('admin.show', [
            'order' => $order,
            'products' => Product::get(),
            'extras' => Extra::where('order_id', '=', $slug)->get()
        ]);
    }
    public function status($id, $slug)
    {
        switch ($slug) {
            case 0:
                $res = Order::where('id', '=', $id)->update(['status' => 'Oczekujące na płatność']);
                break;
            case 1:
                $res = Order::where('id', '=', $id)->update(['status' => 'W trakcie realizacji']);
                break;
            case 2:
                $res = Order::where('id', '=', $id)->update(['status' => 'Zrealizowane']);
                break;
            case 3:
                $res = Order::where('id', '=', $id)->update(['status' => 'Anulowano']);
                break;
            case 5:
                $res = Order::where('id', '=', $id)->update(['status' => 'Opłacone']);
                break;
        }
        if ($res) {
            return redirect()->route('admin.order.show', $id)->with('success', 'Status został pomyślnie zapisany.');
        } else {
            return redirect()->route('admin.order.show', $id)->with('fail', 'Status nie został zapisany.');
        }
    }
}
