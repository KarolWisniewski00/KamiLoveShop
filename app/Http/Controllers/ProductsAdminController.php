<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsAdminController extends Controller
{
    //INDEX PRODUCTS
    public function products()
    {
        return view('account.admin.products');
    }
}
