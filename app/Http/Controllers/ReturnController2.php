<?php

namespace App\Http\Controllers;

use App\Models\Ret;
use Illuminate\Http\Request;

class ReturnController2 extends Controller
{
    public function index()
    {
        return view('client.'.env('SHOP').'.return.index', [
            'return' => Ret::orderBy('order')->get()
        ]);
    }
}
