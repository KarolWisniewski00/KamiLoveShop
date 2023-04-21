<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function policy()
    {
        return view('static.policy', [
            'policy' => Policy::get()
        ]);
    }
}
