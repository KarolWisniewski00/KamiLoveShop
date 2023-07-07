<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function index(){
        return view('admin.product.index');
    }
    public function create(){
        return view('admin.product.create', [
            'edit' => 0,
            'product' => null,
            'subcategories' => Subcategory::get(),
            'sizes' => Size::get(),
            'brokers' => null
        ]);
    }
}
