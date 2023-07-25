<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusketRequest;
use App\Http\Requests\PlusMinusRequest;
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

    public function minus(PlusMinusRequest $request)
    {
        $buskets = Busket::where('user_id', '=', Session::get('login_id'))->get();
        foreach ($buskets as $busket) {
            if ($request->product_id == $busket->product_id && $request->size_value == $busket->size_value) {
                if ($busket->quantity - 1 <= 0) {
                    Busket::where('user_id', '=', Session::get('login_id'))->where('product_id', '=', $request->product_id)->where('size_value', '=', $request->size_value)->delete();
                    return redirect()->route('user.busket')->with('success', 'Przedmiot został pomyślnie usunięty.');
                }
                Busket::where('user_id', '=', Session::get('login_id'))->where('product_id', '=', $request->product_id)->where('size_value', '=', $request->size_value)->update([
                    'quantity' => $busket->quantity - 1,
                ]);
                return redirect()->route('user.busket')->with('success', 'Przedmiot został pomyślnie usunięty.');
            }
        }
        return redirect()->route('user.busket')->with('fail', 'Przedmiot nie został pomyślnie usunięty.');
    }
    public function plus(PlusMinusRequest $request)
    {
        $buskets = Busket::where('user_id', '=', Session::get('login_id'))->get();
        foreach ($buskets as $busket) {
            if ($request->product_id == $busket->product_id && $request->size_value == $busket->size_value) {
                Busket::where('user_id', '=', Session::get('login_id'))->where('product_id', '=', $request->product_id)->where('size_value', '=', $request->size_value)->update([
                    'quantity' => $busket->quantity + 1,
                ]);
                return redirect()->route('user.busket')->with('success', 'Przedmiot został pomyślnie dodany.');
            }
        }
        return redirect()->route('user.busket')->with('fail', 'Przedmiot nie został pomyślnie dodany.');
    }
    public function delete($id)
    {
        $res = Busket::where('id', '=', $id)->delete();
        if ($res) {
            return redirect()->route('user.busket')->with('success', 'Przedmiot został pomyślnie usunięty.');
        } else {
            return redirect()->route('user.busket')->with('fail', 'Przedmiot nie został pomyślnie usuniety.');
        }
    }
    public function store(BusketRequest $request)
    {
        $buskets = Busket::where('user_id', '=', Session::get('login_id'))->get();
        foreach ($buskets as $busket) {
            if ($request->product_id == $busket->product_id && $request->size_value == $busket->size_value) {
                Busket::where('user_id', '=', Session::get('login_id'))->where('product_id', '=', $request->product_id)->where('size_value', '=', $request->size_value)->update([
                    'quantity' => $busket->quantity + 1,
                ]);
                return redirect()->route('user.busket')->with('success', 'Przedmiot został pomyślnie dodany.');
            }
        }
        
        $busket = new Busket();
        $busket->product_id = $request->product_id;
        $busket->quantity = $request->quantity;
        $busket->size_value = $request->size == 0 ? null : $request->size;
        $busket->user_id = Session::get('login_id');

        $res = $busket->save();

        if ($res) {
            return redirect()->route('user.busket')->with('success', 'Przedmiot został pomyślnie dodany.');
        } else {
            return back()->with('fail', 'Przedmiot nie został pomyślnie dodany.');
        }
    }
}
