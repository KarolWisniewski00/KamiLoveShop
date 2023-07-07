<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageRuleAdminController extends Controller
{
    public function index(){
        return view('admin.page-rule.index');
    }
}
