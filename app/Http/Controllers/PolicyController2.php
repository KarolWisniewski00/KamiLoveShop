<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController2 extends Controller
{
    public function index()
    {
        return view('client.'.env('SHOP').'.policy.index', [
            'policy' => Policy::orderBy('order')->get()
        ]);
    }
}
