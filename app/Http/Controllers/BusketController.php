<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Busket;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class BusketController extends Controller
{
    //INDEX BUSKET
    public function busket()
    {
        $buskets = Busket::where('user_id', '=', Session::get('login_id'))->get();
        $products = Product::get();
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
        return view('account.busket', [
            'buskets' => $buskets,
            'products' => $products,
            'sum' => $sum
        ]);
    }
    //NEW BUSKET FORM
    public function busket_new_form(Request $request)
    {
        $request->validate([
            'product_id' => 'required|max:255|integer',
            'quantity' => 'required|max:255|integer',
            'size_value' => 'nullable|max:255',
        ]);

        $buskets = Busket::where('user_id', '=', Session::get('login_id'))->get();
        foreach ($buskets as $busket) {
            if ($request->product_id == $busket->product_id && $request->size_value == $busket->size_value) {
                Busket::where('user_id', '=', Session::get('login_id'))->where('product_id','=',$request->product_id)->where('size_value','=',$request->size_value)->update([
                    'quantity' => $busket->quantity+1,
                ]);
                return back()->with('success', 'Dodano kolejną sztukę!');
            }
        }
        $busket = new Busket();
        $busket->product_id = $request->product_id;
        $busket->quantity = $request->quantity;
        $busket->size_value = $request->size_value;
        $busket->user_id = Session::get('login_id');

        $res = $busket->save();

        if ($res) {
            return back()->with('success', 'Dodano do koszyka!');
        } else {
            return back()->with('fail', 'Error!');
        }
    }
    //MINUS BUSKET FORM
    public function busket_minus_form(Request $request)
    {
        $request->validate([
            'product_id' => 'required|max:255|integer',
            'quantity' => 'required|max:255|integer',
            'size_value' => 'nullable|max:255',
        ]);

        $buskets = Busket::where('user_id', '=', Session::get('login_id'))->get();
        foreach ($buskets as $busket) {
            if ($request->product_id == $busket->product_id && $request->size_value == $busket->size_value) {
                if ($busket->quantity-1<=0){
                    Busket::where('user_id', '=', Session::get('login_id'))->where('product_id','=',$request->product_id)->where('size_value','=',$request->size_value)->delete();
                    return back()->with('success', 'Odjęto kolejną sztukę!');
                }
                Busket::where('user_id', '=', Session::get('login_id'))->where('product_id','=',$request->product_id)->where('size_value','=',$request->size_value)->update([
                    'quantity' => $busket->quantity-1,
                ]);
                return back()->with('success', 'Odjęto kolejną sztukę!');
            }
        }
        return back()->with('fail', 'Error!');
    }
    //DELETE BUSKET
    public function busket_delete($id)
    {
        Busket::where('id', '=', $id)->delete();
        return back()->with('success', 'Usunięto z koszyka!');
    }
}
