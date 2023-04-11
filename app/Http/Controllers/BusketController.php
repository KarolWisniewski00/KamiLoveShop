<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusketController extends Controller
{
    public function busket(){
        return view('account.busket');
    }
}
