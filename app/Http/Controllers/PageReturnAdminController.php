<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageReturnAdminController extends Controller
{
    public function index(){
        return view('admin.page-return.index');
    }
}
