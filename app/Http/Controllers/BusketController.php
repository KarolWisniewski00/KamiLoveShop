<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusketController extends Controller
{
    //INDEX BUSKET
    public function busket(){
        return view('account.busket');
    }
}
