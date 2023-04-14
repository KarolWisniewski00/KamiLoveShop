<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartAdminController extends Controller
{
    //INDEX ADMIN
    public function admin()
    {
        return view('account.admin.start');
    }
}
