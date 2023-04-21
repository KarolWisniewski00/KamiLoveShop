<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class StartAdminController extends Controller
{
    //INDEX ADMIN
    public function admin()
    {
        return view('account.admin.start', [
            'orders' => Order::orderBy('created_at', 'desc')->get(),
        ]);
    }
}
