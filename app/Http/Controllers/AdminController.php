<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'orders' => Order::orderBy('created_at', 'desc')->paginate(20),
        ]);
    }
}
