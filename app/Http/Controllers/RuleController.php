<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function index()
    {
        return view('client.'.env('SHOP').'.rules.index', [
            'rules' => Rule::orderBy('order')->get()
        ]);
    }
}
