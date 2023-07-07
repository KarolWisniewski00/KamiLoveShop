<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagePolicyAdminController extends Controller
{
    public function index(){
        return view('admin.page-policy.index');
    }
}
