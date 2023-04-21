<?php

namespace App\Http\Controllers;

use App\Models\Ret;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function return()
    {
        return view('static.return', [
            'return' => Ret::get()
        ]);
    }
}
