<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Hero;
use App\Models\Category;
use App\Models\Size;
use App\Models\Broker;

class IndexController extends Controller
{
    public function index()
    {
        return view('client.saco.index', [
            'her' => Hero::orderBy('order')->get(),
            'prod' => Product::orderBy('order')->get()
        ]);
    }
}
