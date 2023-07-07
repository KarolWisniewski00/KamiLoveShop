<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageHeroAdminController extends Controller
{
    public function index(){
        return view('admin.page-hero.index');
    }
}
